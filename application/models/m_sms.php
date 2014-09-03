<?php
    class M_sms extends CI_Model{

		public function dispinbox(){
			return $this->db->query("SELECT SenderNumber, TextDecoded FROM inbox 
						WHERE TextDecoded LIKE '%IZIN%' or TextDecoded LIKE '%GANTI%' or TextDecoded LIKE '%UBAH_JADWAL%' 
						and Processed='false'")->result_array();
			}

		// public function check_sms_hari_ini() {
		// 	$where = array('tanggal_hari_ini' => date('Y-m-d'), 'status_kirim' => '1');
		// 	$hasil = $this->db->get_where('sms_helper', $where)->result_array();
		// 	return count($hasil);
		// }

		public function jika_sms_salah(){
			$smssalah = $this->db->query("SELECT SenderNumber, TextDecoded, ID FROM inbox
					WHERE TextDecoded NOT LIKE '%IZIN%' and TextDecoded NOT LIKE '%GANTI%' and TextDecoded NOT LIKE '%UBAH_JADWAL%'
					and Processed='false'")->result_array();
			return $smssalah;
		}

		public function insert_sms_benar($nomor){
			$this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Terima Kasih akan segera kami proses')");
		}

		// public function insert_hari_ini($sms) {
		// 	$this->db->insert('sms_helper', $sms);
		// }

		public function insert_sms_salah($nomor){
			$this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Format sms yang anda kirim salah. Sesuaikan dengan format yang ada.')");
		}

		public function update_inbox($id){
			$this->db->query("UPDATE inbox SET Processed='true' WHERE ID='$id';");
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