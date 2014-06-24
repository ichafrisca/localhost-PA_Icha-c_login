<?php
	class C_jadwal extends CI_Controller{
		public function disp(){
			$this->load->model('m_jadwal');
			$data['queryjadwal']=$this->m_jadwal->ambil_jadwal();
			$this->load->view('jdwl_peg', $data);
		}

		public function pagination(){
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/PA_Icha/c_jadwal/disp';
			$config['total_rows'] = 10;
			$config['per_page'] = 10; 

			$this->pagination->initialize($config); 

			echo $this->pagination->create_links();
		}
	}
?>