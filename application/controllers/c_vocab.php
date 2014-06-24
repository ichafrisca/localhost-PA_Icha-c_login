<?php
	class C_vocab extends CI_Controller{
		public function disp(){
			$this->load->model('m_vocab');
			$data['queryvocab']=$this->m_vocab->ambil_vocab();
			$this->load->view('vocab', $data);
		}
	}
?>