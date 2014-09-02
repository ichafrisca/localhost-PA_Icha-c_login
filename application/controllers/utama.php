<?php
	class Utama extends CI_Controller {

		public function index() {
			$this -> load -> view('homeuser');
		}

	// PROFIL

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

	// JADWAL

		public function jadwal(){
			$this->load->model('m_user');
			$jadwal = $this->session->userdata("pengguna");
			// echo "<pre>";
			// print_r($this->m_user->ambil_jadwal($jadwal));exit;
			$data["queryjadwal"]=$this->m_user->ambil_jadwal($jadwal);
			$this->load->view('jdwl_user',$data);
		}

	// PRESENSI

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

	// GAJI PEGAWAI

		public function gajipegawai(){
			$data['id'] = $this->session->userdata("pengguna");
			$this->load->view("gajipegawai", $data);	
		}

		public function json_gaji($id, $tgl_aw, $tgl_ak) {
			$this->load->model('m_user');
			$data['data_json'] = json_encode($this->m_user->detailgaji($id, $tgl_aw, $tgl_ak));
			// $data['data_json'] = json_encode($this->m_user->bonus_pegawai($id, $tgl_aw, $tgl_ak));
			$this->load->view('json',$data);
		}

		public function detail_gaji_pegawai(){
			$this->load->model('m_user');
			$id 		= $this->session->userdata("pengguna");
			$tglawal 	= $this->input->post('from');
			$tglakhir 	= $this->input->post('to');
			$data['detailgaji'] = $this->m_user->detailgaji($id, $tglawal, $tglakhir);
			$data['data_bonus'] = $this->m_user->bonus_pegawai($id, $tglawal, $tglakhir);
			// echo("<pre>");
			// print_r($data);exit;
			$this->load->view("detail_gaji_pegawai",$data);
		}
	}
?>