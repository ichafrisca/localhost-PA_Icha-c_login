<?php
	class M_pronun extends CI_Model{
		public function ambil_pronun(){
			$querypronun=$this->db->query(
				"SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) 
				join subprogram sp on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) 
				WHERE p.idprogram LIKE 'PR%'");
			return $querypronun;
    	}
    }
?>