<?php
    class M_sms extends CI_Model{

		public function dispinbox(){
			return $this->db->query("SELECT SenderNumber, TextDecoded, ID, Processed, ReceivingDateTime 
										FROM inbox WHERE(
											TextDecoded REGEXP '^IZIN#PEG+([0-9]{4})+#+[a-zA-Z0-9 ]+#+([0-9]{2})+[.]+([0-9]{2})$'
												or
											TextDecoded REGEXP '^GANTI#YA#PEG+([0-9]{4})+#JAD+([0-9]{2})$'
												or
											TextDecoded REGEXP '^UBAH_JADWAL#+([0-9]{4})+-+([0-9]{2})+-+([0-9]{2})+#+([0-9]{2})+[.]+([0-9]{2})+#+([0-9]{2})+[.]+([0-9]{2})$'
												and 
											Processed='false')
									order by ReceivingDateTime asc")->result_array();
		}

		public function jika_sms_salah(){
			$smssalah = $this->db->query("SELECT SenderNumber, TextDecoded, ID, Processed, ReceivingDateTime 
											FROM inbox WHERE (
												TextDecoded NOT REGEXP '^IZIN#PEG+([0-9]{4})+#+[a-zA-Z0-9 ]+#+([0-9]{2})+[.]+([0-9]{2})$'
													and
												TextDecoded NOT REGEXP '^GANTI#YA#PEG+([0-9]{4})+#JAD+([0-9]{2})$'
													and
												TextDecoded NOT REGEXP '^UBAH_JADWAL#+([0-9]{4})+-+([0-9]{2})+-+([0-9]{2})+#+([0-9]{2})+[.]+([0-9]{2})+#+([0-9]{2})+[.]+([0-9]{2})$'
													and
												Processed='false')
											order by ReceivingDateTime asc")->result_array();
			return $smssalah;
		}

		public function idpeg(){
			$idpeg = $this->db->query("SELECT idpeg FROM pegawai")->result_array();
			return $idpeg;
		}

		public function insert_sms_benar($nomor){
			$this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Terima Kasih akan segera kami proses')");
		}

		public function insert_pesan_pegawai_gak_dikenal($nomor){
			$this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Maaf, kode pegawai anda tidak terdaftar pada sistem kami.')");
		}

		public function insert_sms_salah($nomor){
			$this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Format sms yang anda kirim salah. Sesuaikan dengan format yang ada.')");
		}

		public function update_inbox($id){
			$this->db->query("UPDATE inbox SET Processed='true' WHERE ID='$id';");
		}

		public function insert_kesediaan($statussedia,$idpeg,$tglsedia,$idjadwal){
			$this->db->query("INSERT into kesediaan VALUES ('$statussedia', 'Tidak', '$idpeg', '$tglsedia', '$idjadwal', null)");
		}

		// public function dispinboxajax($page = 1, $total) {
		// 	if ($page < 1) {
		// 		$page = 0;
		// 	} else {
		// 		$page = $page - 1;
		// 	}
			
		// 	$smss = $this->db->query("SELECT SenderNumber, TextDecoded FROM inbox LIMIT ".$page * $total.",".$total);
		// 	return $smss->result_array();
		// }
	}
?>