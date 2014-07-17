<?php
	class M_user extends CI_Model{
		
		public function get_pegawai($idpeg) {
    		return $this->db->query("SELECT * FROM pegawai WHERE idpeg='".$idpeg."'");
		}

    	public function edit($data, $IDPEG){
			$this->db->where('idpeg',$IDPEG);
			$this->db->update('PEGAWAI',$data);
		}

		public function ambil_jadwal($id) {
			$queryjadwal=$this->db->query("SELECT p.nama, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog 
											from pegawai p join absensi a on(p.idpeg=a.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
											join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) 
											join subprogram sp on (j.idsubprog=sp.idsubprog) where p.idpeg='".$id."'");
			return $queryjadwal->result_array();
		}

		public function absen($idabsen) {
			$query=$this->db->query("SELECT sp.nmsubprog from pegawai p join absensi a on(p.idpeg=a.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
									join ruang r on (j.idruang=r.idruang)join subprogram sp on (j.idsubprog=sp.idsubprog) where p.idpeg='".$idabsen."' group by sp.nmsubprog");
			return $query->result_array();
		}

		public function ambil_absen($idabsen, $nmsubprog) {
			$queryabsen=$this->db->query("SELECT a.tgl_absen, j.jam, a.status_absen, sp.nmsubprog, r.namaruang 
											from pegawai p join absensi a on(p.idpeg=a.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
											join ruang r on (j.idruang=r.idruang) 	
											join subprogram sp on (j.idsubprog=sp.idsubprog) 
											where sp.nmsubprog='".$nmsubprog."' AND p.idpeg='".$idabsen."'");
			return $queryabsen->result_array();
		}
	}
?>