<?php
	class C_absen extends CI_Controller{
		
		public function disp(){
			$this->load->model('m_absen');
			$data['queryabsen']=$this->m_absen->ambil_data_absen();
			$this->load->view('absensi', $data);	
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_absensi();
			$data['dropdown_ruang'] = $this -> m_absen -> tampil_data_ruang();
			$data['dropdown_jadwal'] = $this -> m_absen -> tampil_data_jadwal();
			$data['dropdown_nmpegawai'] = $this -> m_absen -> tampil_data_nmpegawai();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_absensi', $data);
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idabsen','idabsen','required');
			$this->form_validation->set_rules('status_absen','status_absen','required');
			$this->form_validation->set_rules('tgl_absen','tgl_absen','required');
			$this->form_validation->set_rules('idpeg_pengganti','idpeg_pengganti','required');
			$this->form_validation->set_rules('idruang','idruang','required');
			$this->form_validation->set_rules('idjadwal','idjadwal','required');
			$this->form_validation->set_rules('idpeg','idpeg','required');

			//PENGECEKAN VALIDATION MASIH ERROR
			// if ($this -> form_validation -> run() == FALSE){
			// 	$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
			// }else {
				$data_absensi = array(
						'idabsen' 		  => $this->input->post('idabsen'),
						'status_absen'	  => $this->input->post('status_absen'),
						'tgl_absen'		  => $this->input->post('tgl_absen'),
						'idpeg_pengganti' => $this->input->post('idpeg_pengganti'),
						'idruang'		  => $this->input->post('namaruang'),
						'idjadwal'		  => $this->input->post('jadwal'),
						'idpeg'			  => $this->input->post('namapeg')
					);
				$this -> load -> model('m_absen');
				$this -> m_absen -> tambah_absen($data_absensi);
				redirect('C_absen/disp');
			// }
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

	}
?>