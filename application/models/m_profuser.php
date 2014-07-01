<?php
	class M_profuser extends CI_Model{
		
		public function get_pegawai($idpeg) {
    		return $this->db->query("SELECT * FROM pegawai WHERE idpeg='".$idpeg."'");
		}
	}
?>