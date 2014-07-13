<?php
	class C_grammar extends CI_Controller{
		public function disp(){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->ambil_grammar();
			$this->load->view('grammar', $data);
		}
	}
?>