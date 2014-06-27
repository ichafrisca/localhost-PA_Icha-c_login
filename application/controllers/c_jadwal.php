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

		// public function disp(){
		// 	$this->load->model('m_jadwal');
		// 	$data['queryjadwal']=$this->m_jadwal->ambil_jadwal();
		// 	$this->load->view('jdwl_peg', $data);
		// }
	}
?>