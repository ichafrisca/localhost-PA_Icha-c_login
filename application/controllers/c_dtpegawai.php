<?php
	class C_dtpegawai extends CI_Controller{

		public function __construct() {
			parent::__construct();
			$this -> load -> library('cart');
		}

		public function disp(){
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->ambil_data_pegawai();
			$this->load->view('headeradmin', $data);
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_pegawai();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_pegawai', $data);
		}

		public function next_pegawai() {
			$newID ="";
			$this -> load -> model('m_dtpegawai');
			$maxMe = $this -> m_dtpegawai -> tampil_id();
			foreach ($maxMe->result_array() as $row) {
				$nextId = $row['MAXID'] + 1;
				$newID = "PEG" . str_pad($nextId, 4, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

		// public function dropdown(){
		// 	$dropdown_status_pegawai = array(
  //     			"-" => "- Status -",
  //     			"Admin" => "Admin",
		// 	    "Tutor" => "Tutor",
		// 	   	"Office" => "Office",
		// 	);
		// }

		// public function dropdown2(){
		// 	$dropdown_status = array(
  //     			"-" => "- Status -",
  //     			"Aktif" => "Aktif",
		// 	    "Nonaktif" => "Nonaktif",
		// 	);
		// }

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idpeg','idpeg','required');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('alamat','alamat','required');
			$this->form_validation->set_rules('tmpt_lahir','tmpt_lahir','required');
			$this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
			$this->form_validation->set_rules('no_telp','no_telp','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('stat_peg','stat_peg','required');
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
				$this->tambah();
			}else {
				$data = array('idpeg' => $this -> input -> post('idpeg'), 
					'nama' => $this -> input -> post('nama'), 
					'alamat' => $this -> input -> post('alamat'), 
					'tmpt_lahir' => $this -> input -> post('tmpt_lahir'), 
					'tgl_lahir' => $this -> input -> post('tgl_lahir'), 
					'no_telp' => $this -> input -> post('no_telp'), 
					'status' => $this -> input -> post('status'), 
					'stat_peg' => $this -> input -> post('stat_peg'),
					'username' => $this -> input -> post('username'), 
					'password' => $this -> input -> post('password'), );
				$this -> load -> model('m_dtpegawai');
				$this -> m_dtpegawai -> tambah($data);
				redirect('c_dtpegawai/disp');
			}
		}

		public function form_update_pegawai($IDPEG){
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->tampil_edit($IDPEG);
			$data['list_status'] = $this -> m_dtpegawai -> tampil_status();
			$this->load->view('edit_pegawai',$data);
		}

		// public function ubah_status(){
		// 	$data = array(
		// 		'status' => $this->input->post('status')
		// 	);
		// 	$this->load->model('m_dtpegawai');
		// 	$this->m_dtpegawai->edit($IDPEG,$data);
		// 	$this->disp();
		// }

		// public function ubah_stat_peg(){
		// 	$data = array(
		// 		'stat_peg' => $this->input->post('stat_peg')
		// 	);
		// 	$this->load->model('m_dtpegawai');
		// 	$this->m_dtpegawai->edit($IDPEG,$data);
		// 	$this->disp();
		// }


		public function edit(){
			$idpeg = $this->input->post('IDPEG');
			$data=array(
				'idpeg'=>$this->input->post('IDPEG'),
				'nama'=>$this->input->post('NAMA'),
				'alamat'=>$this->input->post('ALAMAT'),
				'tmpt_lahir'=>$this->input->post('TMPT_LAHIR'),
				'tgl_lahir'=>$this->input->post('TGL_LAHIR'),
				'no_telp'=>$this->input->post('NO_TELP'),
				'status'=>$this->input->post('STATUS'),
				'stat_peg'=>$this->input->post('STAT_PEG'),
				'username'=>$this->input->post('USERNAME'),
				'password'=>$this->input->post('PASSWORD'),
			);
			$this->load->model('m_dtpegawai');
			$this->m_dtpegawai->edit($data,$this->input->post('IDPEG'));
			$this->disp();
		}
	}
?>