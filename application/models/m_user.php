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

		public function detailgaji($idpegawai, $tgl_Awal, $tgl_Akhir){
        	$detailgaji = $this->db->query("SELECT p.nama as nama, s.nmsubprog as kelas, 
					(select l.lisnominal from list_nominal l join subprogram k on (l.idsubprog=k.idsubprog) 
					where k.nmsubprog = s.nmsubprog) as honor, a.tgl_absen as tanggal, a.idpeg_pengganti as pengganti
        			from absensi a join pegawai p on (a.idpeg=p.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
					join subprogram s on (j.idsubprog=s.idsubprog)
					where a.idpeg='$idpegawai' and a.idpeg_pengganti='0' and a.tgl_absen between '$tgl_Awal' 
					and '$tgl_Akhir'
					union
					select p.nama as nama, s.nmsubprog as kelas, 
					(select l.lisnominal from list_nominal l join subprogram k on (l.idsubprog=k.idsubprog) 
					where k.nmsubprog = s.nmsubprog) as honor, a.tgl_absen as tanggal, a.idpeg_pengganti as pengganti
					from absensi a join pegawai p on (a.idpeg=p.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
					join subprogram s on (j.idsubprog=s.idsubprog) 
					where  a.idpeg_pengganti='$idpegawai' and a.tgl_absen between '$tgl_Awal' 
					and '$tgl_Akhir'")->result_array();
			return $detailgaji;
        }

        public function bonus_pegawai($id, $tgl1, $tgl2){
        	return $this->db->query("SELECT g.bonus from gaji g join pegawai p on(p.idpeg=g.idpeg) where p.idpeg='$id' 
								and g.dr_tgl='$tgl1' and g.ke_tgl='$tgl2'")->result_array();
        }
	}
?>