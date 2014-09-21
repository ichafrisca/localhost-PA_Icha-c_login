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
			$this->load->library('form_validation');
			$this->form_validation->set_rules('IDPEG','ID Pegawai','required');
			$this->form_validation->set_rules('NAMA','Nama','required');
			$this->form_validation->set_rules('ALAMAT','Alamat','required');
			$this->form_validation->set_rules('TMPT_LAHIR','Tempat Lahir','required');
			$this->form_validation->set_rules('TGL_LAHIR','Tanggal Lahir','required');
			$this->form_validation->set_rules('NO_TELP','No Telepon','required|regex_match[/^[0-9]+$/]');
			$this->form_validation->set_rules('STATUS','Status','required|callback_status_check');
			$this->form_validation->set_rules('STAT_PEG','Status Pegawai','required|callback_stat_peg_check');
			$this->form_validation->set_rules('USERNAME','Username','required');
			$this->form_validation->set_rules('PASSWORD','Password','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors(''));
				redirect('utama/profil');
			}else {
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
				'password'		=>$this->input->post('PASSWORD'));
			$this->load->model('m_user');
			$this->m_user->edit($data,$this->input->post('IDPEG'));
			$this->profil();
			}
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