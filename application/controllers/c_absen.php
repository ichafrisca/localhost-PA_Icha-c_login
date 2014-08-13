<?php
	class C_absen extends CI_Controller{
		
		public function disp(){
			$this->load->model('m_absen');
			$data['queryabsen']=$this->m_absen->ambil_data_absen();
			$this->load->view('absensi', $data);	
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_absensi();
			$data['dropdown_jadwal'] = $this -> m_absen -> tampil_data_jadwal()->result_array();
			$data['dropdown_nmpegawai'] = $this -> m_absen -> tampil_data_nmpegawai()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_absensi', $data);
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

		public function form_update_absen($IDABSEN){
			$this->load->model('m_absen');
			$data['queryabsen']=$this->m_absen->tampil_edit($IDABSEN);
			$data['list_status'] = $this -> m_absen -> tampil_status();
			$this->load->view('edit_absensi',$data);
		}

		public function edit(){
			$data=array(
				'status_absen'	=>$this->input->post('status_absen'),
				// 'tgl_absen'		=>$this->input->post('tgl_absen')
				);
			$this->load->model('m_absen');
			$this->m_absen->edit($data,$this->input->post('idabsen'));
			$this->disp();
		}

		public function ganti_absen(){
			$this->load->model('m_absen');
			$data['ganti_absen']=$this->m_absen->data_ganti_absen();
			$data['dropdown_jadwal'] = $this -> m_absen -> tampil_data_jadwal()->result_array();
			$data['dropdown_nmpegawai'] = $this -> m_absen -> tampil_data_nmpegawai()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this->load->view('absen_ganti', $data);	
		}

		public function func_ganti_absen(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('status_sedia','Status Sedia','required|callback_statussedia_check');
			$this->form_validation->set_rules('status_admin','Status Kesediaan Admin','required|callback_statusadmin_check');
			$this->form_validation->set_rules('idpeg','Pegawai Pengganti','required');
			$this->form_validation->set_rules('tgl_sedia','Tanggal Kesediaan ','required');
			$this->form_validation->set_rules('idjadwal','Jam Mengganti','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors(''));
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
	}
?>