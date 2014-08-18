<?php
	class M_gaji extends CI_Model{

		public function ambil_gaji() {
			$querygaji=$this->db->query("SELECT g.idgaji, g.dr_tgl, g.ke_tgl, g.jml_pertemuan, g.bonus, 
						g.totalgaji, p.nama from gaji g join pegawai p on (g.idpeg=p.idpeg)");
			return $querygaji;
		}

		public function tampil_id() {
			$maxGJ = $this->db->query('SELECT MAX( SUBSTR( idgaji, 4, 4 ) ) AS MAXID FROM gaji');
			return $maxGJ;
		}

		public function tampil_NM() {
			$maxNM = $this->db->query('SELECT MAX( SUBSTR( idlistnominal, 4, 4 ) ) AS MAXID FROM list_nominal');
			return $maxNM;
		}

		public function tambah_gaji($gaji){
			$this->db->insert('GAJI', $gaji);
		}

		public function listnominal($lnominal){
			$this->db->insert('LIST_NOMINAL', $lnominal);
		}

		public function tampil_data_nmpegawai(){
        	return $this->db->query('SELECT * FROM pegawai');	
        }

		public function tampil_nominal(){
        	return $this->db->query('SELECT * FROM subprogram');	
        }        

        public function total_gaji_karyawan($id,$tgl_awal, $tgl_akhir){
        	return $this->db->query("SELECT sum((select l.lisnominal from list_nominal l join subprogram k on
	        		(l.idsubprog=k.idsubprog) where k.nmsubprog = s.nmsubprog)) as 'total_honor'
	        		from absensi a join pegawai p on (a.idpeg=p.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
	        		join subprogram s on (j.idsubprog=s.idsubprog) join memiliki m on(p.idpeg=m.idpeg)
	        		join list_nominal l on (m.idlistnominal=l.idlistnominal) where a.idpeg='$id' 
	        		and a.idpeg_pengganti='0' and a.tgl_absen between '$tgl_awal' and '$tgl_akhir'
	        		union
	        		select sum((select l.lisnominal from list_nominal l join subprogram k on (l.idsubprog=k.idsubprog) 
					where k.nmsubprog = s.nmsubprog)) as honor 
        			from absensi a join pegawai p on (a.idpeg=p.idpeg) join jadwal j on(a.idjadwal=j.idjadwal) 
					join subprogram s on (j.idsubprog=s.idsubprog) join memiliki m on(p.idpeg=m.idpeg) 
					join list_nominal l on (m.idlistnominal=l.idlistnominal) where a.idpeg_pengganti='$id' 
					and a.tgl_absen between '$tgl_awal' and '$tgl_akhir'")->result_array();
		}
	}

?>