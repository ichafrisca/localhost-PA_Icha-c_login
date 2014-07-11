<?php
	class C_toefl extends CI_Controller{
		public function disp(){
			$this->load->model('m_toefl');
			$data['querytoefl']=$this->m_toefl->ambil_toefl();
			$this->load->view('toefl', $data);
		}
	}
?>