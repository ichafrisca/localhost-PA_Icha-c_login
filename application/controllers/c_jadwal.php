<?php
	class C_jadwal extends CI_Controller{
		
		public function disp($p=0){
			$jumlah_per_page = 10;
			$this->load->library('pagination');
			$this->load->model('m_jadwal');
			$config['base_url'] = site_url().'/c_jadwal/disp/';
			$config['total_rows'] = $this->m_jadwal->total_jadwal();
			$config['per_page'] = $jumlah_per_page;
			$this->pagination->initialize($config);

			$data["pagination"] = $this->pagination->create_links();
			$data["queryjadwal"] = $this->m_jadwal->ambil_jadwal($p, $jumlah_per_page);
			$this->load->view('jdwl_peg', $data);
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_jadwal();
			// $data['dropdown_ruang'] = $this -> m_jadwal -> tampil_data_ruang();
			// $data['dropdown_jadwal'] = $this -> m_jadwal -> tampil_data_jadwal();
			// $data['dropdown_nmpegawai'] = $this -> m_jadwal -> tampil_data_nmpegawai();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_jadwal', $data);
		}

		public function next_jadwal() {
			$newID ="";
			$this -> load -> model('m_jadwal');
			$maxjdw = $this -> m_jadwal -> max_jadwal();
			foreach ($maxjdw->result_array() as $row) {
				$nextId = $row['maxID'] + 1;
				$newID = "JD" . str_pad($nextId, 2, "0", STR_PAD_LEFT);
			}
			return $newID;
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
				$this -> load -> model('m_jadwal');
				$this -> m_absen -> tambah_absen($data_absensi);
				redirect('c_jadwal/disp');
			// }
		}
	}
?>