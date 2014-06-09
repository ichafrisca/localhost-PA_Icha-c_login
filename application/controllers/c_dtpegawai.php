<?php
	class C_dtpegawai extends CI_Controller{
		public function disp(){
			$this->load->view('headeradmin', $data);
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->ambil_data_pegawai();
		}

		// public function hapus($IDPEGAWAI){
		// 	$this->load->model('mdlpeg');
		// 	$this->mdlpeg->hapus('$IDPEGAWAI');
		// 	$this->disp();
		// }

		public function form_update_peg($IDPEG){
			$this->load->view('headeradmin');
			$this->load->model('m_dtpegawai');
			$data['query']=$this->m_dtpegawai->tampil1('$IDPEG');
			$this->load->view('edit_peg', $data);
		}

		public function edit(){
			$data=array(
				'IDPEG'=>$this->input->post('IDPEG'),
				'NAMA'=>$this->input->post('NAMA'),
				'ALAMAT'=>$this->input->post('ALAMAT'),
				'TTL'=>$this->input->post('TTL'),
				'NO_TELP'=>$this->input->post('NO_TELP'),
				'STATUS'=>$this->input->post('STATUS'),
				'USERNAME'=>$this->input->post('USERNAME'),
				'PASSWORD'=>$this->input->post('PASSWORD'),
			);
			$this->load->model('m_dtpegawai');
			$this->m_dtpegawai->edit($data,this->input->post('IDPEG'));
			$this->disp();
		}
	}
?>