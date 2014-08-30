<?php

class C_login extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function login($p = 0 ){
		//untuk melakukan sms otomatis
		// $this->load->model('m_sms');

		// //select data hari ini
		// $today_sms = $this->m_sms->check_sms_hari_ini();
		// if ($today_sms == 0) { //cek apakah hari ini sudah sms??
		// 	$hari_ini = array('tanggal_hari_ini' => date('Y-m-d'),'status_kirim'=> '1');
		// 	$this->m_sms->insert_hari_ini($hari_ini); //insert ke database tanggal hari ini

		// 	//query insert sms gateway
		// }

		$this->db->select('USERNAME','PASSWORD', 'STAT_PEG');
		$this->db->where("USERNAME",$this->input->post('user'));
		$this->db->where("PASSWORD",$this->input->post('pass'));
		$this->db->where("STAT_PEG", 'Aktif');
		$data1 = $this->db->get('PEGAWAI');

		if ($data1->num_rows()==1) {
			$this->db->select('STATUS, IDPEG');
			$this->db->where("USERNAME",$this->input->post('user'));
			$this->db->where("PASSWORD",$this->input->post('pass'));
			$status = $this->db->get('PEGAWAI')->result();
			
			foreach ($status as $key) {
				if ($key->STATUS == 'Admin') {
					$this->session->set_userdata($data1);
					$this->load->model('m_logadmin');
					$this->load->model('m_dtpegawai');
					$jumlah_per_page = 5;
					
					//pagination
					$this->load->library('pagination');
					$this->load->model('m_dtpegawai');
					$config['base_url'] = site_url().'/c_dtpegawai/page/';
					$config['total_rows'] = $this->m_dtpegawai->total_pegawai();
					$config['per_page'] = $jumlah_per_page;
					$this->pagination->initialize($config);

					$data["pagination"] = $this->pagination->create_links();
					$data["query"] = $this->m_dtpegawai->get_pegawai_page($p, $jumlah_per_page);
					$data['query'] = $this->m_dtpegawai->get_pegawai_page();
					$this->load->view('headeradmin', $data);
				} else if ($key->STATUS == 'Tutor'){
					$this->session->set_userdata("pengguna", $key->IDPEG);
					$this->load->view('homeuser');
				} else if ($key->STATUS == 'Office') {
					$this->session->set_userdata("pengguna", $key->IDPEG);
					$this->load->view('homeuser');
				}
			}

			// $data = array(
			// 	'is_login' => 'ok',
			// 	'user' => $this->input->post('user')
			// );
			
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