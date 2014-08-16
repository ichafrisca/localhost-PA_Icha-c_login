<?php
	class C_gaji extends CI_Controller{
		
	// DISPLAY GAJI

		public function disp(){
			$this->load->model('m_gaji');
			$data['querygaji']=$this->m_gaji->ambil_gaji();
			$this->load->view('gaji_pegawai',$data);
		}

		public function next_gaji() {
			$newID ="";
			$this -> load -> model('m_gaji');
			$maxGJ = $this -> m_gaji -> tampil_id();
			foreach ($maxGJ->result_array() as $row) {
				$nextId = $row['MAXID'] + 1;
				$newID = "GJ" . str_pad($nextId, 4, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

	// TAMBAH GAJI

		public function form_tambah(){
			$data['newID'] = $this -> next_gaji();
			$data['dropdown_nmpegawai'] = $this -> m_gaji -> tampil_data_nmpegawai()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_gaji', $data);
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idgaji','idgaji','required');
			$this->form_validation->set_rules('tanggal','tanggal','required');
			$this->form_validation->set_rules('idpeg','idpeg','required');
			$this->form_validation->set_rules('jml_pertemuan','jml_pertemuan','required');
			$this->form_validation->set_rules('honor','honor','required');
			$this->form_validation->set_rules('bonus','bonus','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
			}else {

				$gaji = array(
						'idgaji' 		  => $this->input->post('idgaji'),
						'tanggal'		  => $this->input->post('from'),
						'tanggal'		  => $this->input->post('to'),
						'idpeg'		  	  => $this->input->post('namapeg'),
						'jml_pertemuan'	  => $this->input->post('jml_pertemuan'),
						'honor'		  	  => $this->input->post('honor'),
						'bonus'			  => $this->input->post('bonus')
					);
				$this -> load -> model('m_gaji');
				$this -> m_gaji -> tambah_gaji($gaji);
				redirect('C_gaji/disp');
			}
		}

		public function jml_hadir($id){
			$this->load->model('m_gaji');
			$data['data_json'] = json_encode($this->m_gaji->jmlh_pertemuan($id, $tgl)->result_array());
			$this->load->view('json',$data);
		}

	// FORM TAMBAH NOMINAL

		public function memiliki(){
			$data['newID'] = $this -> next_nominal();
			$data['dropdown_subprog'] = $this -> m_gaji -> tampil_nominal()->result_array();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('masukan_nominal', $data);
		}

		public function tambah_nominal(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idlistnominal','idlistnominal','required');
			$this->form_validation->set_rules('lisnominal','list nominal','required');
			$this->form_validation->set_rules('idsubprog','nama subprogram','required');

			if ($this -> form_validation -> run() == FALSE){
				$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
			}else {

				$gaji = array(
						'idlistnominal'   => $this->input->post('idlistnominal'),
						'lisnominal'	  => $this->input->post('lisnominal'),
						'idsubprog'		  => $this->input->post('idsubprog'));
				$this -> load -> model('m_gaji');
				$this -> m_gaji -> listnominal($gaji);
				redirect('C_gaji/disp');
			}
		}

		public function next_nominal() {
			$newID ="";
			$this -> load -> model('m_gaji');
			$maxNM = $this -> m_gaji -> tampil_NM();
			foreach ($maxNM->result_array() as $row) {
				$nextNM = $row['MAXID'] + 1;
				$newID = "LS" . str_pad($nextNM, 3, "0", STR_PAD_LEFT);
			}
			return $newID;
		}
	}
?>
