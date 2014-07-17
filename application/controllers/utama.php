<?php
	class Utama extends CI_Controller {

		public function index() {
			$this -> load -> view('homeuser');
		}

		public function profil(){
			$this->load->model('m_user');
			$current = $this->session->userdata("pengguna");
			$data['queryuser']=$this->m_user->get_pegawai($current);
			$this->load->view('profiluser',$data);
		}

		public function edit(){
			$data=array(
				'idpeg'			=>$this->input->post('IDPEG'),
				'nama'			=>$this->input->post('NAMA'),
				'alamat'		=>$this->input->post('ALAMAT'),
				'tmpt_lahir'	=>$this->input->post('TMPT_LAHIR'),
				'tgl_lahir'		=>$this->input->post('TGL_LAHIR'),
				'no_telp'		=>$this->input->post('NO_TELP'),
				'status'		=>$this->input->post('STATUS'),
				'stat_peg'		=>$this->input->post('STAT_PEG'),
				'username'		=>$this->input->post('USERNAME'),
				'password'		=>$this->input->post('PASSWORD'),
			);
			$this->load->model('m_user');
			$this->m_user->edit($data,$this->input->post('IDPEG'));
			$this->profil();
		}

		public function jadwal(){
			$this->load->model('m_user');
			$jadwal = $this->session->userdata("pengguna");
			// echo "<pre>";
			// print_r($this->m_user->ambil_jadwal($jadwal));exit;
			$data["queryjadwal"]=$this->m_user->ambil_jadwal($jadwal);
			$this->load->view('jdwl_user',$data);
		}

		public function presensi(){
			$this->load->model('m_user');
			$absen = $this->session->userdata("pengguna");

			// echo "<pre>";
			// print_r($this->m_user->ambil_jadwal($jadwal));exit;
			$data["absen"]=$this->m_user->absen($absen);
			$data["queryabsen"]=$this->m_user->absen($absen);
			$this->load->view('absenuser',$data);
		}

		public function absenjson($subprog) {
			//ambil dari session
			$absen = $this->session->userdata("pengguna");

			$this->load->model('m_user');
			$presensi = $this->m_user->ambil_absen($absen, urldecode($subprog));
			$data['data_json'] = json_encode($presensi);
			$this->load->view("json", $data);
		}
	}
?>