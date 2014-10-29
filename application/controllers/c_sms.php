<?php
	class C_sms extends CI_Controller{

		public function disp(){
			$this->load->model('m_sms');
			$data['inbox'] = $this->m_sms->dispinbox();
			$this->load->view('smsgateway', $data);	
		}

		public function inbox(){
			$this->load->model('m_sms');
			$this->load->view('smsgateway', $data);	
		}

		public function jsoninbox(){
			$this->load->model('m_sms');
			$data['data_json'] = json_encode($this->m_sms->jika_sms_salah());
			$this->load->view('json',$data);
		}

		public function jsonid(){
			$this->load->model('m_sms');
			$data['data_json'] = json_encode($this->m_sms->idpeg());
			$this->load->view('json', $data);
		}

		public function jsoninboxbenar(){
			$this->load->model('m_sms');
			$data['data_json'] = json_encode($this->m_sms->dispinbox());
			$this->load->view('json',$data);
		}

		public function c_sms_salah(){
			$this->load->model('m_sms');
			$nomor_tujuan = $this->input->post('nomor');
			$this->m_sms->insert_sms_salah($nomor_tujuan);
		}

		public function c_update_sms_salah(){
			$this->load->model('m_sms');
			$id_pesan = $this->input->post('id');
			$this->m_sms->update_inbox($id_pesan);
		}

		public function c_sms_benar(){
			$this->load->model('m_sms');
			$nomor_pegawai = $this->input->post('nomor');
			$this->m_sms->insert_sms_benar($nomor_pegawai);
		}
		
		public function insert_kesediaan(){
			$this->load->model('m_sms');
			
			// ambil nilai dari ajax POST
			$status 	= $this->input->post('status');
			$idpegawai 	= $this->input->post('idpegawai');
			$idjadwal 	= $this->input->post('idjadwal');
			$nomor 		= $this->input->post('nomor');

			// echo $this->isTerdaftar("PEG0001");exit;

			// ambil tanggal besok dari DateTime
			$besok = new DateTime('tomorrow');
			$tglsedia = $besok->format('Y-m-d');

			// jika terdaftar maka insert
			if ($this->isTerdaftar($idpegawai) == TRUE) {
				$this->m_sms->insert_kesediaan($status, $idpegawai, $tglsedia, $idjadwal);
			} else {
				//jika tidak terdaftar maka beri peringatan
				$this->load->model('m_sms');
				$this->m_sms->insert_pesan_pegawai_gak_dikenal($nomor);
			}
		}

		private function isTerdaftar($data) {
			$this->load->model('m_sms');
			foreach ($this->m_sms->idpeg() as $id) {
				if ($id['idpeg'] == $data) {
					return TRUE;
				}
			}
			return FALSE;
		}
	}
?>