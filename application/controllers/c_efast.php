<?php
	class C_efast extends CI_Controller{
		public function disp(){
			$this->load->model('m_efast');
			$data['queryefast']=$this->m_efast->ambil_efast();
			$this->load->view('efast', $data);
		}
	}
?>