<?php
	class C_pronun extends CI_Controller{
		public function disp(){
			$this->load->model('m_pronun');
			$data['querypronun']=$this->m_pronun->ambil_pronun();
			$this->load->view('pronunciation', $data);
		}
	}
?>