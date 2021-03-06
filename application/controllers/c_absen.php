<?php
	class C_absen extends CI_Controller{

	// TAMBAH ABSEN
		
		public function disp($p=0){
			$jumlah_per_page = 5;

			$this->load->library('pagination');
			$this->load->model('m_absen');
			$config['base_url'] = site_url().'/c_absen/disp/';
			$config['total_rows'] = $this->m_absen->total_absen();
			$config['per_page'] = $jumlah_per_page;
			$this->pagination->initialize($config);

			$data["pagination"] = $this->pagination->create_links();
			$data["queryabsen"] = $this->m_absen->ambil_data_absen($p, $jumlah_per_page);
			$data['nomor']=$p;

			$data['kesediaan']=$this->m_absen->kesediaan();
			$data['inbox']=$this->m_absen->sms();
			$this->load->view('absensi', $data);	
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_absensi();
			$tgl 	= $this->input->post('idjadwal');
			$data['dropdown_jadwal'] = $this -> m_absen -> tampil_data_jadwal($tgl)->result_array();
			$data['dropdown_nmpegawai'] = $this -> m_absen -> tampil_data_nmpegawai()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_absensi', $data);
		}

		public function json_tambah_absen($tgl){
			$this->load->model('m_absen');
			$data['data_json'] = json_encode($this->m_absen->tampil_data_jadwal($tgl)->result_array());
			$this->load->view('json',$data);
		}

		public function json_edit_absen($tgl){
			$this->load->model('m_absen');
			$data['data_json'] = json_encode($this->m_absen->tampil_data_jadwal($tgl)->result_array());
			$this->load->view('json',$data);
		}

		public function tgl_subprog($idjadwal){
			$this->load->model('m_absen');
			$tanggal = $this->m_absen->view_tgl($idjadwal);
			$data['data_json'] = json_encode($tanggal);
			$this->load->view("json", $data);
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idabsen','ID Absen','required');
			$this->form_validation->set_rules('status_absen','Status Absen','required|callback_status_check');
			$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required');
			$this->form_validation->set_rules('idpeg_pengganti','Pegawai Pengganti','required');
			$this->form_validation->set_rules('idjadwal','Jam','required|callback_jadwal_check');
			$this->form_validation->set_rules('idpeg','Nama Pegawai','required|callback_pegawai_check');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors(''));
				redirect('c_absen/form_tambah');
			}else {
				$data_absensi = array(
						'idabsen' 		  => $this->input->post('idabsen'),
						'status_absen'	  => $this->input->post('status_absen'),
						'tgl_absen'		  => $this->input->post('tgl_absen'),
						'idpeg_pengganti' => $this->input->post('idpeg_pengganti'),
						'idjadwal'		  => $this->input->post('idjadwal'),
						'idpeg'			  => $this->input->post('idpeg'));
				$this -> load -> model('m_absen');
				$this -> m_absen -> tambah_absen($data_absensi);
				redirect('C_absen/disp');
			}
		}

		public function status_check(){
            if ($this->input->post('status_absen') == '-'){
	            $this->form_validation->set_message('status_check', 'Please choose status absen.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	    public function jadwal_check(){
            if ($this->input->post('idjadwal') == '-'){
	            $this->form_validation->set_message('jadwal_check', 'Please choose jadwal.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	    public function pegawai_check(){
            if ($this->input->post('idpeg') == '-'){
	            $this->form_validation->set_message('pegawai_check', 'Please choose pegawai.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

		public function next_absensi() {
			$newID ="";
			$this -> load -> model('m_absen');
			$maxMe = $this -> m_absen -> tampil_id();
			foreach ($maxMe->result_array() as $row) {
				$nextId = $row['MAXID'] + 1;
				$newID = "KH" . str_pad($nextId, 4, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

		// public function json_jam_tersedia($tgl, $jam){
		// 	$this->load->model('m_absen');
		// 	$data_jam = $this->m_absen->jam_tersedia($tgl, $jam)->result_array();

		// 	// tambah dummy element di akhir untuk looping pengecekan ruang
		// 	// array_push($data_jam, array("idruang" => "-"));

		// 	// array baru untuk menampung ruangan yang telah di filter
		// 	$data_jam_filtered = array();

		// 	// filter lagi $data_ruang agar tidak ada data yg sama
		// 	for ($i = 0; $i < count($data_jam) - 1; $i++) {

		// 	 	// cek apakah tiap elemen sama dengan elemen selanjutnya
		// 		if ($data_jam[$i]['idsubprog'] != $data_ruang[$i + 1]['idsubprog']) {

		// 			// jika tidak tambahkan ke array baru
		// 			$data_jam_filtered[$i]['idsubprog'] = $data_jam[$i]['idsubprog'];
		// 			$data_jam_filtered[$i]['nmsubprog'] = $data_jam[$i]['nmsubprog'];
		// 			$data_jam_filtered[$i]['tgl_kelas'] = $data_jam[$i]['tgl_kelas'];
		// 			$data_jam_filtered[$i]['idjadwal'] = $data_jam[$i]['idjadwal'];
		// 		}
		// 	}

		// 	// echo("<pre>");
		// 	// print_r($data_ruang_filtered);exit;
		// 	$data['data_json'] = json_encode($data_jam_filtered);
		// 	$this->load->view('json',$data);
		// }

	// EDIT ABSEN

		public function form_update_absen($IDABSEN){
			$this->load->model('m_absen');
			$data['queryabsen']=$this->m_absen->tampil_edit($IDABSEN);
			$data['list_status'] = $this -> m_absen -> tampil_status();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$data['dropdown_subprog'] = $this->m_absen->tampil_data_subprog();
			$data['dropdown_nmpegawai'] = $this -> m_absen -> tampil_data_nmpegawai()->result_array();
			$this->load->view('edit_absensi',$data);
		}


		public function edit(){
			$data=array(
				'status_absen'		=> $this->input->post('status_absen'),
				'idpeg_pengganti'	=> $this->input->post('idpeg'),
				'idjadwal'			=> $this->input->post('idjadwal'),
				// 'idsubprog'	 	  	=> $this->input->post('nmsubprog'),
				'tgl_absen'			=>$this->input->post('tgl_absen')
				);
			$this->load->model('m_absen');
			$this->m_absen->edit($data,$this->input->post('idabsen'));
			$this->disp();
		}

	// PEGAWAI PENGGANTI

		public function form_ganti_absen(){
			$this->load->view('absen_ganti');
		}

		public function json_ganti_absen($tgl, $jam_awal, $jam_akhir){
			$this->load->model('m_absen');
			$data['data_json'] = json_encode($this->m_absen->pegawai_pengganti($tgl, $jam_awal, $jam_akhir)->result_array());
			$this->load->view('json',$data);
		}

		public function func_ganti_absen(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('status_sedia','Status Sedia','required|callback_status_sedia_check');
			$this->form_validation->set_rules('status_admin','Status Kesediaan Admin','required|callback_status_admin_check');
			$this->form_validation->set_rules('idpeg','Pegawai Pengganti','required');
			$this->form_validation->set_rules('tgl_sedia','Tanggal Kesediaan ','required');
			$this->form_validation->set_rules('idjadwal','Jam Mengganti','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors());
				redirect('c_absen/ganti_absen');
			}else {
				$ganti = array(
						'status_sedia'	  => $this->input->post('idabsen'),
						'status_admin'	  => $this->input->post('status_absen'),
						'idpeg'			  => $this->input->post('nama'),
						'tgl_sedia'		  => $this->input->post('tgl_sedia'),
						'idjadwal'		  => $this->input->post('jadwal'),
					);
				$this -> load -> model('m_absen');
				$this -> m_absen -> ganti_absen($ganti);
				redirect('C_absen/disp');
			}
		}

		public function status_sedia(){
            if ($this->input->post('status_sedia') == '-'){
	            $this->form_validation->set_message('status_sedia', 'Please choose status kesediaan.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	    public function status_admin(){
            if ($this->input->post('status_admin') == '-'){
	            $this->form_validation->set_message('status_admin', 'Please choose status kesediaan admin.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	// PEMBERITAHUAN

	    public function sms_pengganti(){
	    	$this->load->model("m_absen");
	    	$jumlah_data = $this->input->post('jumlahdata');
	    	if ($jumlah_data == NULL) {
	    		echo "<script>";
	    		echo "alert('Tidak ada data untuk pengganti.');";
	    		echo "</script>";
	    		$this->load->view("absen_ganti");
	    	} else {
	    		for ($i=0; $i < $jumlah_data; $i++) { 
		    		$this->m_absen->sms_pengganti(
		    			$this->input->post("telp".$i), 
		    			$this->input->post("tanggal"), 
		    			$this->input->post("jam_pgt"), 
		    			$this->input->post("kelas_pgt"), 
		    			$this->input->post("idjadwal")
		    		);
		    	}
		    	echo "<script>";
	    		echo "alert('Sms pemberitahuan telah terkirim.');";
	    		echo "</script>";
		    	$this->load->view("absen_ganti");
	    	}
	    }

	    public function sms_pemberitahuan_jadwal($p=0){
	    	$jumlah_per_page = 5;

			$this->load->library('pagination');
			$this->load->model('m_absen');
			$config['base_url'] = site_url().'/c_absen/disp/';
			$config['total_rows'] = $this->m_absen->total_absen();
			$config['per_page'] = $jumlah_per_page;
			$this->pagination->initialize($config);

			$data["pagination"] = $this->pagination->create_links();
			$data["queryabsen"] = $this->m_absen->ambil_data_absen($p, $jumlah_per_page);
			$data['nomor']=$p;

	    	$this->load->model("m_absen");
	    	$sms = $this->m_absen->nomor_pegawai();
	    	foreach ($sms as $data) {
	    		$this->m_absen->sms_pemberitahuan_jadwal($data['no_telp']);
	    	}
	    	$data['notif'] = "alert('Sms pemberitahuan jadwal telah terkirim.');";
	    	$data['queryabsen'] = $this->m_absen->ambil_data_absen($p, $jumlah_per_page);
	    	$data["pagination"] = $this->pagination->create_links();
	    	$data['nomor']=$p;
	    	$data['kesediaan']=$this->m_absen->kesediaan();
	    	$this->load->view("absensi", $data);
	    }

	// KESEDIAAN

	 	public function update_kesediaan($idsedia, $notlp, $data, $nama, $jam, $ruang){
			$this->load->model('m_absen');
			//sms orangnya
			$sms_sedia = $this->m_absen->nomor_pegawai();
	    	$queryambilnomor = $this -> m_absen -> nomor_untuk_kesediaan();

	    	// $data['notif'] = "alert('Sms pemberitahuan telah terkirim.');";

			$this->m_absen->update_kesediaan($data, $idsedia);
			$this->disp();
	 	}
	}
?>