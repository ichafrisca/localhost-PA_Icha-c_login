<?php
	class C_jadwal extends CI_Controller{
		public function disp(){
			$this->load->model('m_jadwal');
			$data['queryjadwal']=$this->m_jadwal->ambil_jadwal();
			$this->load->view('jdwl_peg', $data);
		}
	}
?>