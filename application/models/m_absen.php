<?php
	class M_absen extends CI_Model{
    	public function ambil_data_absen(){
    		$queryabsen=$this->db->query("SELECT a.idabsen, a.status_absen, a.tgl_absen, a.idpeg_pengganti, j.jam, p.nama FROM absensi a join jadwal j on (a.idjadwal=j.idjadwal) join pegawai p on (a.idpeg=p.idpeg)");
			return $queryabsen;
    	}

   		public function tambah_absen($absensi){
			$this->db->insert('ABSENSI', $absensi);
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

        public function tampil_edit($IDABSEN){
            $this->db->where('idabsen',$IDABSEN);
            $queryabsen=$this->db->get('ABSENSI');
            return $queryabsen;
        }

        public function tampil_status(){
           $list_status = $this->db->query('SELECT status_absen FROM absensi');
           return $list_status;
        } 

        public function edit($data, $IDABSEN){
            $this->db->where('idabsen',$IDABSEN);
            $this->db->update('ABSENSI',$data);
        }
    }
?>