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

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idabsen','ID Absen','required');
			$this->form_validation->set_rules('status_absen','Status Absen','required|callback_status_check');
			$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required');
			$this->form_validation->set_rules('idpeg_pengganti','Pegawai Pengganti','required');
			$this->form_validation->set_rules('idjadwal','Jadwal','required|callback_jadwal_check');
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
						'idjadwal'		  => $this->input->post('jadwal'),
						'idpeg'			  => $this->input->post('namapeg')
					);
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
				'status_absen'=>$this->input->post('status_absen'),
				);
			$this->load->model('m_absen');
			$this->m_absen->edit($data,$this->input->post('idabsen'));
			$this->disp();
		}
	}
?>