<?php
	class C_dtpegawai extends CI_Controller{

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

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idpeg','ID','required');
			$this->form_validation->set_rules('nama','Name','required|regex_match[/^[A-Z][-a-zA-Z\s]+$/]');
			$this->form_validation->set_rules('alamat','Address','required');
			$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir','required');
			$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
			$this->form_validation->set_rules('no_telp','No Telepon','required|regex_match[/^[0-9]+$/]');
			$this->form_validation->set_rules('status','Status','required|callback_status_check');
			$this->form_validation->set_rules('stat_peg','Status Pegawai','required|callback_stat_peg_check');
			$this->form_validation->set_rules('username','Username','required|min_length[4]|max_length[12]|is_unique[pegawai.username]','callback_username_check');
			$this->form_validation->set_rules('password','Password','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors(''));

				$data = array(
							'error'			=> validation_errors(),
							'newID' 		=> $this -> next_pegawai(),
							'nama'			=> $this -> input -> post('nama'), 
							'alamat' 		=> $this -> input -> post('alamat'), 
							'tmpt_lahir' 	=> $this -> input -> post('tmpt_lahir'), 
							'tgl_lahir' 	=> $this -> input -> post('tgl_lahir'), 
							'no_telp' 		=> $this -> input -> post('no_telp'), 
							'status' 		=> $this -> input -> post('status'), 
							'stat_peg' 		=> $this -> input -> post('stat_peg'),
							'username' 		=> $this -> input -> post('username'), 
							'password' 		=> $this -> input -> post('password')
						);
				
				$this->load->view('tambah_pegawai', $data);
				//redirect('c_dtpegawai/form_tambah');
			}else {
				$data = array('idpeg' 		=> $this -> input -> post('idpeg'), 
							'nama'			=> $this -> input -> post('nama'), 
							'alamat' 		=> $this -> input -> post('alamat'), 
							'tmpt_lahir' 	=> $this -> input -> post('tmpt_lahir'), 
							'tgl_lahir' 	=> $this -> input -> post('tgl_lahir'), 
							'no_telp' 		=> $this -> input -> post('no_telp'), 
							'status' 		=> $this -> input -> post('status'), 
							'stat_peg' 		=> $this -> input -> post('stat_peg'),
							'username' 		=> $this -> input -> post('username'), 
							'password' 		=> $this -> input -> post('password'));
				$this -> load -> model('m_dtpegawai');
				$this -> m_dtpegawai -> tambah($data);
				redirect('c_dtpegawai/page');
			}
		}

		public function username_check($str){
			// $username = $this->db->query("SELECT username FROM pegawai WHERE username='$str'")->row();
			if ($str == 'test') {
				$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
				return FALSE;
			} else {
				return TRUE;
			}
		}

		public function status_check(){
            if ($this->input->post('status') == '-'){
	            $this->form_validation->set_message('status_check', 'Please choose status pegawai.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	    public function stat_peg_check(){
            if ($this->input->post('stat_peg') == '-'){
	            $this->form_validation->set_message('stat_peg_check', 'Please choose status.');
	            return FALSE;
	        }
	        else {
	            return TRUE;
	        }
	    }

	    //EDIT DATA PEGAWAI
	    
		public function form_update_pegawai($IDPEG){
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->tampil_edit($IDPEG);
			$data['list_status'] = $this -> m_dtpegawai -> tampil_status();
			$data['validation_errors'] = $this->session->flashdata('errors');
			$this->load->view('edit_pegawai',$data);
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
			$this->form_validation->set_rules('PASSWORD','Password','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors(''));
				redirect('c_dtpegawai/form_update_pegawai/'.$this->input->post('IDPEG'));
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
					'password'		=>$this->input->post('PASSWORD'));
				$this->load->model('m_dtpegawai');
				$this->m_dtpegawai->edit($data,$this->input->post('IDPEG'));
				$this->page();
			}
		}

		public function page($p=0){
			$jumlah_per_page = 5;
			$this->load->library('pagination');
			$this->load->model('m_dtpegawai');
			$config['base_url'] = site_url().'/c_dtpegawai/page/';
			$config['total_rows'] = $this->m_dtpegawai->total_pegawai();
			$config['per_page'] = $jumlah_per_page;
			$this->pagination->initialize($config);
			$data['nomor']=$p;

			$data["pagination"] = $this->pagination->create_links();
			$data["query"] = $this->m_dtpegawai->get_pegawai_page($p, $jumlah_per_page);
			$this->load->view('headeradmin', $data);
		}
	}
?>