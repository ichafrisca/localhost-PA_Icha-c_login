<?php
	class C_jadwal extends CI_Controller{
		
		public function disp($p=0){
			$jumlah_per_page = 10;
			$this->load->library('pagination');
			$this->load->model('m_jadwal');
			$config['base_url'] = site_url().'/c_jadwal/disp/';
			$config['total_rows'] = $this->m_jadwal->total_jadwal();
			$config['per_page'] = $jumlah_per_page;
			$this->pagination->initialize($config);

			$data["pagination"] = $this->pagination->create_links();
			$data["queryjadwal"] = $this->m_jadwal->ambil_jadwal($p, $jumlah_per_page);
			$this->load->view('jdwl_peg', $data);
		}

		public function hapus($idjadwal){
			$this->load->model('m_jadwal');
			$this->m_jadwal->hapus($idjadwal);
			$this->disp();
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_jadwal();
			$data['dropdown_slot'] = $this -> m_jadwal -> tampil_data_slot();
			$data['dropdown_ruang'] = $this -> m_jadwal -> tampil_data_ruang();
			$data['dropdown_subprog'] = $this -> m_jadwal -> tampil_data_subprog();

			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('tambah_jadwal', $data);
		}

		public function next_jadwal() {
			$newID ="";
			$this -> load -> model('m_jadwal');
			$maxjdw = $this -> m_jadwal -> max_jadwal();
			foreach ($maxjdw->result_array() as $row) {
				$nextId = $row['maxID'] + 1;
				$newID = "JAD" . str_pad($nextId, 2, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

		public function tambah(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idjadwal','idjadwal','required');
			$this->form_validation->set_rules('jam','jam','required');
			$this->form_validation->set_rules('periode_tgl','periode_tgl','required');
			$this->form_validation->set_rules('idslot','idslot','required');
			$this->form_validation->set_rules('idruang','idruang','required');
			$this->form_validation->set_rules('idsubprog','idsubprog','required');

			//PENGECEKAN VALIDATION MASIH ERROR
			// if ($this -> form_validation -> run() == FALSE){
			// 	$this -> session -> set_flashdata('errors', validation_errors('Ada yang salah'));
			// }else {
				$data_jadwal = array(
						'idjadwal'		  => $this->input->post('idjadwal'),
						'jam'	 		  => $this->input->post('jam'),
						'periode_tgl'	  => $this->input->post('periode_tgl'),
						'idslot' 		  => $this->input->post('slot'),
						'idruang' 		  => $this->input->post('namaruang'),
						'idsubprog'	 	  => $this->input->post('subprogram'));
				$this -> load -> model('m_jadwal');
				$this -> m_jadwal -> tambah_jadwal($data_jadwal);
				redirect('c_jadwal/disp');
			// }
		}

		public function form_tambah_program(){
			$this -> load -> view('tmbh_program');
		}

		public function tambah_program(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idprogram','idprogram','required');
			$this->form_validation->set_rules('nmprogram','nmprogram','required');

				$data = array('idprogram' => $this -> input -> post('idprogram'), 
							  'nmprogram' => $this -> input -> post('nmprogram') );
				$this -> load -> model('m_jadwal');
				$this -> m_jadwal -> tambah_program($data);
				redirect('c_jadwal/disp');
		}

		public function form_tambah_subprog(){
			$data['newID'] = $this -> next_subprog();
			$data['dropdown_program'] = $this -> m_jadwal -> tampil_data_program();
			$data['dropdown_ruang'] = $this -> m_jadwal -> tampil_data_ruang();
			$this -> load -> view('tmbh_subprog', $data);
		}

		public function next_subprog() {
			$newID ="";
			$this -> load -> model('m_jadwal');
			$maxsp = $this -> m_jadwal -> max_subprog();
			foreach ($maxsp->result_array() as $row) {
				$nextId = $row['maxID'] + 1;
				$newID = "SPR" . str_pad($nextId, 2, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

		public function tambah_subprog(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idsubprog','idsubprog','required');
			$this->form_validation->set_rules('nmsubprog','nmsubprog','required');
			$this->form_validation->set_rules('durasi','durasi','required');
			$this->form_validation->set_rules('idprogram','idprogram','required');

				$data = array('idsubprog' => $this -> input -> post('idsubprog'), 
					'nmsubprog' => $this -> input -> post('nmsubprog'),
					'durasi' => $this -> input -> post('durasi'),
					'idprogram' => $this -> input -> post('nmprogram'));
				$this -> load -> model('m_jadwal');
				$this -> m_jadwal -> tambah_subprog($data);
				redirect('c_jadwal/disp');
		}

		public function form_update_jadwal($idjadwal){
			$this->load->model('m_jadwal');
			$data['queryjadwal']=$this->m_jadwal->tampil_edit($idjadwal);
			$this->load->view('edit_jadwal',$data);
		}

		public function edit(){
			$data=array(
				'jam'	=>$this->input->post('jam')
				);
			$this->load->model('m_jadwal');
			$this->m_jadwal->edit($data,$this->input->post('idjadwal'));
			$this->disp();
		}
	}
?>