<?php
	class M_absen extends CI_Model{
    	public function ambil_data_absen(){
    		$queryabsen=$this->db->query("SELECT a.idabsen, a.status_absen, a.tgl_absen, a.idpeg_pengganti, r.namaruang, j.jam, j.periode_tgl, p.nama
    									 FROM absensi a JOIN ruang r ON ( a.idruang = r.idruang ) JOIN jadwal j ON ( a.idjadwal = j.idjadwal ) JOIN pegawai p ON ( a.idpeg = p.idpeg )");
			return $queryabsen;
    	}

   		public function tambah_absen($absensi){
			$this->db->insert('ABSENSI', $absensi);
		}

		public function tampil_data_ruang() {
            return $this->db->query('SELECT * FROM ruang');
        }

        public function tampil_data_jadwal(){
        	return $this->db->query('SELECT * FROM jadwal');	
        }

        public function tampil_data_nmpegawai(){
        	return $this->db->query('SELECT * FROM pegawai');	
        }

		public function tampil_id() {
			$maxMe = $this->db->query('SELECT MAX( SUBSTR( idabsen, 4, 4 ) ) AS MAXID FROM absensi');
			return $maxMe;
		}
    }
?>