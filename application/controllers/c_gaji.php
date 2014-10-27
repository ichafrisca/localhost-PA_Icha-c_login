<?php
	class C_gaji extends CI_Controller{
		
	// DISPLAY GAJI

		public function disp(){
			$this->load->model('m_gaji');
			$data['querygaji'] = $this->m_gaji->ambil_gaji_display()->result_array();
			$data['notif'] = null;
			$this->load->view('gaji_pegawai',$data);
		}

		public function next_gaji() {
			$newID ="";
			$this -> load -> model('m_gaji');
			$maxGJ = $this -> m_gaji -> tampil_id();
			foreach ($maxGJ->result_array() as $row) {
				$nextId = $row['MAXID'] + 1;
				$newID = "GJ" . str_pad($nextId, 4, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

	// HAPUS NOMINAL

		public function hapus($idnominal){
			$this->load->model('m_gaji');
			$this->m_gaji->hapus($idnominal);
			$this->memiliki1();
		}

	// HAPUS GAJI

		public function hapusgaji($idgaji){
			$this->load->model('m_gaji');
			$this->m_gaji->hapusgaji($idgaji);
			$this->disp();
		}

	// TAMBAH GAJI

		public function form_tambah(){
			$data['newID'] = $this -> next_gaji();
			$data['dropdown_nmpegawai'] = $this->m_gaji-> tampil_data_nmpegawai()->result_array();
			$data['validation_errors'] = $this->session-> flashdata('errors');
			$this->load->view('tambah_gaji', $data);
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idgaji','idgaji','required');
			$this->form_validation->set_rules('to','Dari Tanggal','required');
			$this->form_validation->set_rules('from','Ke Tanggal','required');
			$this->form_validation->set_rules('jml_pertemuan','Jumlah Pertemuan');
			$this->form_validation->set_rules('totalhonor','Total Honor');
			$this->form_validation->set_rules('bonus','Bonus','required');
			$this->form_validation->set_rules('totalgaji','Total Gaji','required');
			$this->form_validation->set_rules('idpeg','idpeg','required');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('errors', validation_errors(''));
				redirect('c_gaji/form_tambah');
			}else {

				$gaji = array(
						'idgaji' 		  => $this->input->post('idgaji'),
						'dr_tgl'		  => $this->input->post('from'),
						'ke_tgl'		  => $this->input->post('to'),
						'idpeg'		  	  => $this->input->post('idpeg'),
						'jml_pertemuan'	  => $this->input->post('jml_pertemuan'),
						'totalhonor'  	  => $this->input->post('totalhonor'),
						'totalgaji'	  	  => $this->input->post('totalgaji'),
						'bonus'			  => $this->input->post('bonus')
					);
				$this -> load -> model('m_gaji');
				$this -> m_gaji -> tambah_gaji($gaji);
				redirect('C_gaji/disp');
			}
		}

		public function json_jml_hadir($idpeg, $tglawal, $tglakhir){
			$this->load->model('m_gaji');
			$data['data_json'] = json_encode($this->m_gaji->jml_pertemuan($idpeg, $tglawal, $tglakhir)->result_array());
			$this->load->view('json',$data);
		}

		public function json_total_gaji($id, $tgl_aw, $tgl_ak) {
			$this->load->model('m_gaji');
			$data['data_json'] = json_encode($this->m_gaji->total_gaji_karyawan($id, $tgl_aw, $tgl_ak));
			$this->load->view('json',$data);
		}


	// FORM TAMBAH NOMINAL

		public function memiliki1(){
			$this->load->model('m_gaji');
			$data['querynominal'] = $this->m_gaji->ambil_nominal()->result_array();
			$this->load->view('lihat_nominal', $data);
		}

		public function memiliki(){
			$data['newID'] = $this -> next_nominal();
			$data['dropdown_subprog'] = $this->m_gaji->tampil_nominal()->result_array();
			$data['validation_errors'] = $this->session->flashdata('errors');
			$this->load->view('masukan_nominal', $data);
		}

		public function tambah_nominal(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idlistnominal','idlistnominal','required');
			$this->form_validation->set_rules('lisnominal','list nominal','required|regex_match[/^[0-9]+$/]');
			$this->form_validation->set_rules('idsubprog','nama subprogram','required|callback_namasubprog_check');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('errors', validation_errors(''));
				redirect('c_gaji/memiliki');
			}else {

				$gaji = array(
						'idlistnominal'   => $this->input->post('idlistnominal'),
						'lisnominal'	  => $this->input->post('lisnominal'),
						'idsubprog'		  => $this->input->post('idsubprog'));
				$this->load->model('m_gaji');
				$this->m_gaji->listnominal($gaji);
				redirect('C_gaji/memiliki1');
			}
		}

		public function namasubprog_check(){
            if ($this->input->post('idsubprog') == '-'){
	            $this->form_validation->set_message('namasubprog_check', 'Please choose nama subprogram.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

		public function next_nominal() {
			$newID ="";
			$this -> load -> model('m_gaji');
			$maxNM = $this -> m_gaji -> tampil_NM();
			foreach ($maxNM->result_array() as $row) {
				$nextNM = $row['MAXID'] + 1;
				$newID = "LS" . str_pad($nextNM, 3, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

	// EDIT NOMINAL

		public function form_update_nominal($nominal){
			$this->load->model('m_gaji');
			$data['queryeditnominal']=$this->m_gaji->edit_nominal($nominal);
			$data['dropdown_subprog'] = $this->m_gaji->tampil_nominal()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this->load->view('ubah_nominal',$data);
		}

		public function edit_nominal(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idlistnominal','idlistnominal','required');
			$this->form_validation->set_rules('lisnominal','list nominal','required|regex_match[/^[0-9]+$/]');
			// $this->form_validation->set_rules('idsubprog','nama subprogram','required|callback_namasubprog_check');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('errors', validation_errors(''));
				redirect('c_gaji/form_update_nominal/'.$this->input->post('idlistnominal'));
			}else {

				$gaji = array(
						'idlistnominal'   => $this->input->post('idlistnominal'),
						'lisnominal'	  => $this->input->post('lisnominal'),
						// 'idsubprog'		  => $this->input->post('idsubprog')
						);
				$this->load->model('m_gaji');
				$this->m_gaji->edit($gaji,$this->input->post('idlistnominal'));
				redirect('C_gaji/memiliki1');
			}
		}

	// DETAIL GAJI
		public function detail_gaji($idpegawai, $tgl_Awal, $tgl_Akhir){
			$this->load->model('m_gaji');
			$data['detailgaji']=$this->m_gaji->detailgaji($idpegawai, $tgl_Awal, $tgl_Akhir);
			$this->load->view('detail_gaji',$data);
		}

	// PEMBERITAHUAN

		public function sms_gaji(){
	    	$this->load->model("m_gaji");
	    	$sms = $this->m_gaji->nomor_pegawai();
	    	$querygaji = $this -> m_gaji ->ambil_gaji()->result_array();
	    	foreach ($querygaji as $data) {
	    		$this->m_gaji->sms_pemberitahuan_gaji(
	    			$data['no_telp'],
	    			$data['nama'],
	    			$data['dr_tgl'],
	    			$data['ke_tgl'],
	    			$data['jml_pertemuan'],
	    			$data['totalgaji']
	    			);
	    	}
	    	$data['notif'] = "alert('Sms pemberitahuan telah terkirim.');";
	    	$data['querygaji'] = $querygaji;
	    	$this->load->view("gaji_pegawai", $data);
	    }
	}
?>
