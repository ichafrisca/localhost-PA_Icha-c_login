<?php
	class C_jadwal extends CI_Controller{

		public function __construct() {
			parent::__construct();
			$this -> load -> library('cart');
		}
		
		public function disp(){
			$this->load->model('m_jadwal');
			$data['queryjadwal']=$this->m_jadwal->ambil_jadwal();
			$this->load->view('jdwl_peg', $data);
		}

		public function form_tambah(){
			$data['newID'] = $this -> next_jadwal();
			$data['validation_errors'] = $this -> session -> flashdata('errors');
			$this -> load -> view('jdwl_peg', $data);
		}

		public function next_jadwal() {
			$newID ="";
			$this -> load -> model('m_jadwal');
			$maxjdw = $this -> m_jadwal -> tampil_id();
			foreach ($maxjdw->result_array() as $row) {
				$nextId = $row['maxID'] + 1;
				$newID = "JAD" . str_pad($nextId, 4, "0", STR_PAD_LEFT);
			}
			return $newID;
		}

		// public function edit(){
		// 	$data=array(
		// 	'ID_JADWAL'=>$this->input->post('IDJADWAL'),
		// 	'NAMA_PROGRAM'=>$this->input->post('NAMA_PROGRAM'),
		// 	'WAKTU'=>$this->input->post('WAKTU')
		// 	);
		// 	$this->load->model('mjadwal');
		// 	$this->mjadwal->edit($data,$this->input->post('IDJADWAL'));
		// 	$this->disp(0);
		// }
	}
?>