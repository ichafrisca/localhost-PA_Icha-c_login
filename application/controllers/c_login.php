<?php

class C_login extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$this->output->set_header('Last-Modified: '.gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->db->select('USERNAME','PASSWORD', 'STAT_PEG');
		$this->db->where("USERNAME",$this->input->post('user'));
		$this->db->where("PASSWORD",$this->input->post('pass'));
		$this->db->where("STAT_PEG", 'Aktif');
		$data1 = $this->db->get('PEGAWAI');

		if ($data1->num_rows()==1) {
			$this->db->select('STATUS');
			$this->db->where("USERNAME",$this->input->post('user'));
			$this->db->where("PASSWORD",$this->input->post('pass'));
			$status = $this->db->get('PEGAWAI')->result();
			
			foreach ($status as $key) {
				if ($key->STATUS == 'admin') {
					$this->session->set_userdata($data1);
					$this->load->model('m_logadmin');
					$this->load->model('m_dtpegawai');
					$data['query'] = $this->m_dtpegawai->ambil_data_pegawai();
					$this->load->view('headeradmin', $data);
				} else if ($key->STATUS == 'tutor'){
					$this->session->set_userdata($data1);
					$this->load->view('homeuser');
				} else if ($key->STATUS == 'office') {
					$this->session->set_userdata($data1);
					$this->load->view('homeuser');
				}
			}

			$data = array(
				'is_login' => 'ok',
				'user' => $this->input->post('user')
			);
			
		} else {
			$this->session->set_flashdata('message', "Kombinasi username & password salah atau status pegawai tidak aktif");
			$this->load->view('login');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		$data['logout'] = 'You have been logged out.';
		$this->load->view('login', $data);
	}
}
?>