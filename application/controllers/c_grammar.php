<?php
	class C_grammar extends CI_Controller{
		public function disp(){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->ambil_grammar();
			$this->load->view('grammar', $data);
		}

		// public function next_jadwal() {
		// 	$getID ="";
		// 	$this -> load -> model('m_grammar');
		// 	$maxMe = $this -> m_grammar -> tampil_id();
		// 	foreach ($maxMe->result_array() as $row) {
		// 		$nextId = $row['MAXID'] + 1;
		// 		$getID = "JAD" . str_pad($nextId, 2, STR_PAD_LEFT);
		// 	}
		// 	return $getID;
		// }

		// public function form_tambah(){
		// 	$this->load->model('m_grammar');
		// 	$data['dropdown_ruang'] = $this -> m_grammar -> tampil_data_ruang();
		// 	$data['dropdown_program'] = $this -> m_grammar -> tampil_data_program();
		// 	$data['dropdown_subprogram'] = $this -> m_grammar -> tampil_data_subprogram();
		// 	$data['getID'] = $this -> next_jadwal();
		// 	$data['validation_errors'] = $this -> session -> flashdata('errors');
		// 	$this -> load -> view('tmbh_grmr', $data);
		// }

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idjadwal','idjadwal','required');
			$this->form_validation->set_rules('jam','jam','required');
			$this->form_validation->set_rules('tanggal','tanggal','required');
			$this->form_validation->set_rules('namaruang','namaruang','required');
			$this->form_validation->set_rules('nmsubprog','nmsubprog','required');
			$this->form_validation->set_rules('durasi','durasi','required');
			$this->form_validation->set_rules('nmprogram','nmprogram','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
				$this->tambah();
			}else {
				$data_jadwal = array(
						'idjadwal' => $this->input->post('idjadwal'),
						'jam'	   => $this->input->post('jam'),
						'tanggal'  => $this->input->post('tanggal')
					);

				$data_absensi = array(
						'idabsen' 		=> $this->input->post('idabsen'),
						'status_absen'	=> $this->input->post('status_absen'),
						'tgl_absen'		=> $this->input->post('tgl_absen'),
						'idpengganti'	=> $this->input->post('idpengganti'),
						'idruang'		=> $this->input->post('idruang'),
						'idjadwal'		=> $this->input->post('idjadwal'),
						'idpeg'			=> $this->input->post('idpeg')
					);

				$data_subprog = array(
						'idsubprog' => $this->input->post('idsubprog'),
						'nmsubprog' => $this->input->post('nmsubprog'),
						'durasi'	=> $this->input->post('durasi'),
						'idprogram' => $this->input->post('idprogram'),
						'idruang'	=> $this->input->post('idruang')
					);

				$data_program = array(
						"idprogram" 	=> $this->input->post('idprogram'),
						"nmprogram"	=> $this->input->post('nmprogram')
					);
				

				$this -> load -> model('m_grammar');
				$this -> m_grammar -> tambah($data_jadwal, $data_absensi, $data_ruang, $data_subprog, $data_program);
				redirect('C_grammar/disp');
			}
		}

		public function form_update_grammar($IDJADWAL){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->tampil_edit($IDJADWA);

			$this->load->view('edit_grammar',$data);
		}

		public function edit(){
			$data=array(
				'idpeg'=>$this->input->post('IDJADWAL'),
				'jam'=>$this->input->post('JAM'),
				'tanggal'=>$this->input->post('TANGGAL'),
				'namaruang'=>$this->input->post('NAMARUANG'),
			);
			$this->load->model('m_grammar');
			$this->m_grammar->edit($data,$this->input->post('IDJADWAL'));
			$this->disp();
		}
	}
?>