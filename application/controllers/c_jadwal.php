<?php
	class C_jadwal extends CI_Controller{
		
		public function disp($idjad){
			$this->load->view('headeradmin');
			$this->load->model('mjadwal');
			$data['queryjadwal']=$this->mjadwal->ambil_data_jadwal();
			$data['id_jadwal']=$this->next_id_jadwal();
			$data['newID']=$id;
			$this->load->view('lihat_jadwal',$data);
		}

		public function fupdate_jadwal($IDJAD){
			$this->load->view('headeradmin');
			$this->load->model('mjadwal');
			$data['query']=$this->mjadwal->tampil_satu($IDJAD);
			$this->load->view('edit_jadwal',$data);
		}

		public function hapus($IDJAD){
			$this->load->model('mjadwal');
			$this->mpaket->hapus($IDJAD);
			$this->disp(0);
		}

		public function edit(){
			$data=array(
			'ID_JADWAL'=>$this->input->post('IDJADWAL'),
			'NAMA_PROGRAM'=>$this->input->post('NAMA_PROGRAM'),
			'WAKTU'=>$this->input->post('WAKTU')
			);
			$this->load->model('mjadwal');
			$this->mjadwal->edit($data,$this->input->post('IDJADWAL'));
			$this->disp(0);
		}
	}
?>