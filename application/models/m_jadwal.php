<?php
	class M_jadwal extends CI_Model{
		public function ambil_jadwal(){
			$queryjadwal=$this->db->query("SELECT j.idjadwal, j.jam, j.tanggal, r.namaruang, s.nmsubprog, s.durasi, p.nmprogram FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) join subprogram s on (s.idruang = r.idruang) JOIN program p ON (s.idprogram = p.idprogram)");
			return $queryjadwal;
    	}

    	public function max_jadwal(){
			$maxjdw = $this->db->query("SELECT max(substr(idjadwal, 4, 4) ) as maxID FROM jadwal");
			return $maxjdw;
		}
	}
?>