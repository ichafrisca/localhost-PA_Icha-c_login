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
		$this->form_validation->set_rules('USERNAME', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('PASSWORD', 'Password', 'required|md5|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        //jika form yang di isi salah , akan kembali lagi ke form_login
		if ($this->form_validation->run()==FALSE){
			$this->load->view('admin_login');
		}else{
			// jika form yang diisi benar
			$username = $this -> input -> post('USERNAME');
			$password = $this -> input -> post('PASSWORD');
			$cek = $this -> m_loginadmin -> login($username, $password, 1)
		if ($cek <> 0){
				$this->session->set_userdata('isLogin', TRUE);
        		$this->session->set_userdata('username',$username);
        		redirect('headeradmin');
        	}else{
        	// jika salah
       		?>
       		<script>
            alert('Gagal Login: Cek username dan password anda!');
            history.go(-1);
            </script>
            <?php
            }
        }
    }
}

	function logout() {
		$this->session->sess_destroy();
		redirect('admin/admin_login')
	}
	}
?>