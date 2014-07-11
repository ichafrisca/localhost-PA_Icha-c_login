<?php
	class M_efast extends CI_Model{
		public function ambil_efast(){
			$queryefast=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, r.namaruang, s.nmsubprog, s.durasi, p.nmprogram
                                            FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) join subprogram s on (s.idruang = r.idruang) JOIN program p ON (s.idprogram = p.idprogram) WHERE p.idprogram LIKE 'EF%'");
			return $queryefast;
    	}
    }
?>