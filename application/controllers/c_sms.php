<?php
	class C_sms extends CI_Controller{

		public function disp(){
			$this->load->model('m_sms');
			$data['inbox'] = $this->m_sms->dispinbox();
			
			$total_tiap_halaman = 5;
			$paging = count($this->m_sms->dispinbox()) / $total_tiap_halaman;

			$data['inbox_pagination'] = ceil($paging);
			$this->load->view('smsgateway', $data);	
		}
		
		public function sms(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('DestinationNumber','Nomor','required');
			$this->form_validation->set_rules('TextDecoded','Isi Pesan','required');

			// if ($this -> form_validation -> run() == FALSE){
			// 	$this -> session -> set_flashdata('errors', validation_errors(''));
			// 	redirect('c_sms/sms');
			// }else {
				$tujuan = $this -> input -> post('no_tujuan');
				$pesan  = $this -> input -> post('isi_pesan');
				$this->load->model('m_sms');
				$this -> m_sms -> insertsms($tujuan, $pesan);
			// }
		}

		public function inbox(){
			$this->load->model('m_sms');
			$this->load->view('smsgateway', $data);	
		}

		public function inboxjson($p) {
			$this->load->model('m_sms');

			$total = 5;
			$inbox = $this->m_sms->dispinboxajax($p, $total);
			$data['data_json'] = json_encode($inbox);
			$this->load->view("json", $data);
		}
	}
?>