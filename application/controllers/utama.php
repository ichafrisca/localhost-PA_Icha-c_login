<?php
class Utama extends CI_Controller {

	public function index() {
		$this -> load -> view('homeuser');
	}

	public function profil(){
		$this -> load -> view('profiluser');
		$this->load->model('m_profile');
		$data['query']=$this->m_profile->ambil_data_member($IDPEG);
		// $this->load->view('edit_member',$data);
	}
}
?>