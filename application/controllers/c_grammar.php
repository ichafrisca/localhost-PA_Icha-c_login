<?php
	class C_grammar extends CI_Controller{
		public function disp(){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->ambil_grammar();
			$this->load->view('grammar', $data);
		}

		// public function form_tambah(){
		// 	$data['validation_errors'] = $this -> session -> flashdata('errors');
		// 	$this -> load -> view('tmbh_grmr', $data);
		// }

		// public function tambah(){
		// 	$this->load->library('form_validation');
		// 	$this->form_validation->set_rules('idjadwal','idjadwal','required');
		// 	$this->form_validation->set_rules('jam','jam','required');
		// 	$this->form_validation->set_rules('tanggal','tanggal','required');
		// 	$this->form_validation->set_rules('namaruang','namaruang','required');
		// 	$this->form_validation->set_rules('nmprogram','nmprogram','required');
		// 	$this->form_validation->set_rules('nmsubprog','nmsubprog','required');
		// 	$this->form_validation->set_rules('durasi','durasi','required');

		// 	if ($this -> form_validation -> run() == FALSE){
		// 		$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
		// 		$this->tambah();
		// 	}else {
		// 		$data = array('idjadwal' => $this -> input -> post('idjadwal'), 
		// 			'jam' => $this -> input -> post('jam'), 
		// 			'tanggal' => $this -> input -> post('tanggal'), 
		// 			'namaruang' => $this -> input -> post('namaruang'), 
		// 			'nmprogram' => $this -> input -> post('nmprogram'), 
		// 			'nmsubprog' => $this -> input -> post('nmsubprog'), 
		// 			'durasi' => $this -> input -> post('durasi'), );
		// 		$this -> load -> model('m_dtpegawai');
		// 		$this -> m_dtpegawai -> tambah($data);
		// 		redirect('c_dtpegawai/disp');
		// 	}
		// }

		public function form_update_grammar($IDJADWAL){
			$this->load->model('m_grammar');
			$data['querygrammar']=$this->m_grammar->tampil_edit($IDJADWAL);
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