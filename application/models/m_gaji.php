<?php
	class M_gaji extends CI_Model{

		public function ambil_gaji() {
			$querygaji=$this->db->query("SELECT g.idgaji, g.tanggal, g.jml_pertemuan, g.honor, g.bonus, g.totalgaji, p.nama from gaji g join pegawai p on (g.idpeg=p.idpeg)");
			return $querygaji;
		}

		public function tampil_id() {
			$maxGJ = $this->db->query('SELECT MAX( SUBSTR( idgaji, 4, 4 ) ) AS MAXID FROM gaji');
			return $maxGJ;
		}

		public function tambah_gaji($gaji){
			$this->db->insert('GAJI', $gaji);
		}

		public function tampil_data_nmpegawai(){
        	return $this->db->query('SELECT * FROM pegawai');	
        }

        public function jmlh_pertemuan($id,$tgl){
        	return $this->db->query("SELECT count(idpeg) as total_hadir from absensi where idpeg='$id' 
					and idpeg_pengganti = '0' and tgl_absen between '$tgl' and '$tgl'
					union
					select count(idpeg) from absensi where idpeg_pengganti='$id' and tgl_absen
					between '$tgl' and '$tgl'");
        }
	}
?>
				<!-- SELECT count(idpeg) as total_hadir from absensi where idpeg='PEG0005' 
					and idpeg_pengganti = '0' and tgl_absen between '2014-07-11' and '2014-08-09'
					union
					select count(idpeg) from absensi where idpeg_pengganti='PEG0005' and tgl_absen
					between '2014-07-11' and '2014-08-09' -->