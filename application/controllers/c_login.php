<?php

class C_login extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function login($p = 0 ){
		$this->db->select('USERNAME','PASSWORD', 'STAT_PEG');
		$this->db->where("USERNAME",$this->input->post('user'));
		$this->db->where("PASSWORD",$this->input->post('pass'));
		$this->db->where("STAT_PEG", 'Aktif');
		$data1 = $this->db->get('PEGAWAI');

		if ($data1->num_rows()==1) {
			$this->db->select('STATUS, IDPEG, NAMA');
			$this->db->where("USERNAME",$this->input->post('user'));
			$this->db->where("PASSWORD",$this->input->post('pass'));
			$status = $this->db->get('PEGAWAI')->result();
			
			foreach ($status as $key) {
				if ($key->STATUS == 'Admin') {
					$this->session->set_userdata($data1);  //ngeset session isinya 'USERNAME','PASSWORD', 'STAT_PEG'
					$this->load->model('m_logadmin');
					$this->load->model('m_dtpegawai');
					$jumlah_per_page = 5;
					
					//pagination
					$this->load->library('pagination');
					$this->load->model('m_dtpegawai');

					// pengaturan pagination
					$config['base_url'] = site_url().'/c_dtpegawai/page/'; //url pagination
					$config['total_rows'] = $this->m_dtpegawai->total_pegawai(); //total select
					$config['per_page'] = $jumlah_per_page; //total select perhalaman

					// masang pengaturan ke pagination
					$this->pagination->initialize($config);

					$data["pagination"] = $this->pagination->create_links(); // buat link pagination di view
					$data["query"] = $this->m_dtpegawai->get_pegawai_page($p, $jumlah_per_page);
					$data['query'] = $this->m_dtpegawai->get_pegawai_page();

					$this->load->view('headeradmin', $data);
				} else if ($key->STATUS == 'Tutor'){
					$this->session->set_userdata("pengguna", $key->IDPEG);
					$this->session->set_userdata("nama_pengguna", $key->NAMA);
					$this->load->view('homeuser');
				} else if ($key->STATUS == 'Office') {
					$this->session->set_userdata("pengguna", $key->IDPEG);
					$this->session->set_userdata("nama_pengguna", $key->NAMA);
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