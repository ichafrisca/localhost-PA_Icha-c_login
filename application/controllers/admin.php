<?php

class Admin extends CI_Controller{
	public function index(){
		$this->load->view('admin_login');
	}
	public function adminlogin(){
		// $this->output->set_header('Last-Modified: '.gmdate("D, d M Y H:i:s") . 'GMT');
		// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		// $this->output->set_header('Pragma: no-cache');
		// $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			$this->db->select('USERNAME','PASSWORD');
			$this->db->where("USERNAME",$this->input->post('user'));
			$this->db->where("PASSWORD",$this->input->post('pass'));
			$this->db->where("STATUS",$this->input->post('admin'));
			$data1 = $this->db->get('PEGAWAI');
		if ($data1->num_rows()==1) {
			$data = array(
				'is_login' => 'ok',
				'user'=>$this->input->post('admin')
			);
			$this->session->set_userdata($data1);
				$this->load->model('m_logadmin');
				$this->load->view('headeradmin');
				//$this->load->model('modmember');
				//$data ['query'] = $this ->modmember ->ambil_data_member();
				//$this->load->view('registerad',$data); 
		} 
		else {
			$this->session->set_flashdata('message','Wrong Username or Password');
			$this->index();
			
			}
		}
	function logout() {
		$this->session->sess_destroy();
		$data['logout'] = 'You have been logged out.';
		$this->load->view('admin_login', $data);
	}
	}
?>