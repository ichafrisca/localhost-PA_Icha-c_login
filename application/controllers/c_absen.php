<?php
	class C_absen extends CI_Controller{
		
		public function disp(){
			$this->load->model('m_absen');
			$data['queryabsen']=$this->m_absen->ambil_data_absen();
			$this->load->view('absensi', $data);	
		}
	}
?>