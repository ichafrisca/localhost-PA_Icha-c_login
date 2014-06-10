<?php
	class C_dtpegawai extends CI_Controller{
		public function disp(){
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->ambil_data_pegawai();
			$this->load->view('headeradmin', $data);
		}

		public function form_tambah(){
			$this->load->view('tambah_pegawai');
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idpeg','idpeg','required');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('alamat','alamat','required');
			$this->form_validation->set_rules('ttl','ttl','required');
			$this->form_validation->set_rules('no_telp','no_telp','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('username','username','required');
			md5($this->form_validation->set_rules('password','password','required'));

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flasdata('errors', validation_errors(''));
				redirect('c_dtpegawai/tambah_pegawai');
			}else {
				$data = array('idpeg' => $this -> input -> post('idpeg'), 
					'nama' => $this -> input -> post('nama'), 
					'alamat' => $this -> input -> post('alamat'), 
					'ttl' => $this -> input -> post('ttl'), 
					'no_telp' => $this -> input -> post('no_telp'), 
					'status' => $this -> input -> post('status'), 
					'username' => $this -> input -> post('username'), 
					'password' => $this -> input -> post('password'), );
				$this -> load -> model('m_regis');
				$this -> m_regis -> tambah($data);
				redirect('c_dtpegawai/disp');
			}
		}

		public function form_update_pegawai($IDPEG){
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->tampil_edit($IDPEG);
			$this->load->view('edit_pegawai',$data);
		}

		public function edit(){
			$data=array(
				'idpeg'=>$this->input->post('IDPEG'),
				'nama'=>$this->input->post('NAMA'),
				'alamat'=>$this->input->post('ALAMAT'),
				'ttl'=>$this->input->post('TTL'),
				'no_telp'=>$this->input->post('NO_TELP'),
				'status'=>$this->input->post('STATUS'),
				'username'=>$this->input->post('USERNAME'),
				'password'=>$this->input->post('PASSWORD'),
			);
			$this->load->model('m_dtpegawai');
			$this->m_dtpegawai->edit($data,$this->input->post('IDPEG'));
			$this->disp();
		}
	}
?>