<?php
	class C_grammar extends CI_Controller{
		public function disp(){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->ambil_grammar();
			$this->load->view('grammar', $data);
		}

		public function form_tambah(){
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tmbh_grmr', $data);
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idjadwal','idjadwal','required');
			$this->form_validation->set_rules('jam','jam','required');
			$this->form_validation->set_rules('tanggal','tanggal','required');
			$this->form_validation->set_rules('namaruang','namaruang','required');
			$this->form_validation->set_rules('nmprogram','nmprogram','required');
			$this->form_validation->set_rules('nmsubprog','nmsubprog','required');
			$this->form_validation->set_rules('durasi','durasi','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
				$this->tambah();
			}else {
				$data = array('idjadwal' => $this -> input -> post('idjadwal'), 
					'jam' => $this -> input -> post('jam'), 
					'tanggal' => $this -> input -> post('tanggal'), 
					'namaruang' => $this -> input -> post('namaruang'), 
					'nmprogram' => $this -> input -> post('nmprogram'), 
					'nmsubprog' => $this -> input -> post('nmsubprog'), 
					'durasi' => $this -> input -> post('durasi'), 
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
			$this->load->view('edit_pegawai',$data);
		}

		public function edit(){
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
			$this->m_grammar->edit($data,$this->input->post('IDJADWAL'));
			$this->disp();
		}
	}
?>