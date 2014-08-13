<?php
    class M_sms extends CI_Model{

    	public function insertsms($nomor, $pesan) {
    		$this->db->query("INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('".$nomor."', '".$pesan."');");
		}

		public function dispinbox(){
			$querysms = $this->db->query("SELECT SenderNumber, TextDecoded FROM inbox");
			return $querysms->result_array();
		}

		public function check_sms_hari_ini() {
			$where = array('tanggal_hari_ini' => date('Y-m-d'), 'status_kirim' => '1');
			$hasil = $this->db->get_where('sms_helper', $where)->result_array();
			return count($hasil);
		}

		public function insert_hari_ini($sms) {
			$this->db->insert('sms_helper', $sms);
		}

		public function dispinboxajax($page = 1, $total) {
			if ($page < 1) {
				$page = 0;
			} else {
				$page = $page - 1;
			}
			
			$smss = $this->db->query("SELECT SenderNumber, TextDecoded FROM inbox LIMIT ".$page * $total.",".$total);
			return $smss->result_array();
		}
	}
?>