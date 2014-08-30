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
	}
?>