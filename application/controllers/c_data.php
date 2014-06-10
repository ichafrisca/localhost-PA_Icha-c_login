<?php
	class C_data extends CI_Controller{
		public function disp(){
			$this->load->view('headeradmin');
			$this->load->model('mdlpeg');
			$this->load->view('tambahpegawai',$data);
		}

		public function hapus($IDPEGAWAI){
			$this->load->model('mdlpeg');
			$this->mdlpeg->hapus('$IDPEGAWAI');
			$this->disp();
		}

		public function update_peg($IDPEGAWAI){
			$this->load->view('headeradmin');
			$this->load->model('mdlpeg');
			$data['query']=$this->mdlpeg->tampil1('$IDPEGAWAI');
			$this->load->view('edit_peg', $data);
		}

		public function edit(){
			$data=array(
				'IDPEG'=>$this->input->post('IDPEGAWAI'),
				'NAMA'=>$this->input->post('NAMA'),
				'ALAMAT'=>$this->input->post('ALAMAT'),
				'TTL'=>$this->input->post('TTL'),
				'NO_TELP'=>$this->input->post('NO_TELP'),
				'STATUS'=>$this->input->post('STATUS'),
				'USERNAME'=>$this->input->post('USERNAME'),
				'PASSWORD'=>$this->input->post('PASSWORD'),
			);
			$this->load->model('mdlpeg');
			$this->mdlpeg->edit($data,this->input->post('IDPEG'));
			$this->disp();
		}
	}
?>