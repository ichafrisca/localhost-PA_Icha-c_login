<?php
	class C_speaking extends CI_Controller{
		public function disp(){
			$this->load->model('m_speaking');
			$data['queryspeaking']=$this->m_speaking->ambil_speaking();
			$this->load->view('speaking', $data);
		}
	}
?>