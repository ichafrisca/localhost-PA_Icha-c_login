<?php
	class M_jadwal extends CI_Model{
		public function ambil_jadwal(){
			$queryjadwal=$this->db->query("SELECT j.idjadwal, j.jam, j.tanggal, r.namaruang, p.nmprogram, s.nmsubprog, s.durasi
											FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) JOIN program p ON (r.idprogram = p.idprogram) join subprogram s on (p.idprogram=s.idprogram)");
			return $queryjadwal;
    	}

    	public function max_jadwal(){
			$maxjdw = $this->db->query("SELECT max(substr(idjadwal, 4, 4) ) as maxID FROM jadwal");
			return $maxjdw;
		}
	}
?>