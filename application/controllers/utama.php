<?php
	class Utama extends CI_Controller {

		public function index() {
			$this -> load -> view('homeuser');
		}

		public function profil(){
			$this->load->model('m_profuser');
			$current = $this->session->userdata("pengguna");
			$data['queryuser']=$this->m_profuser->get_pegawai($current);
			$this->load->view('profiluser',$data);
		}
	}
?>