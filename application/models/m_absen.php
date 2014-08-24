<?php
	class M_absen extends CI_Model{
    	public function ambil_data_absen(){
    		$queryabsen=$this->db->query("SELECT a.idabsen, a.status_absen, a.tgl_absen, a.idpeg_pengganti, j.jam, 
                        sp.nmsubprog, p.nama FROM absensi a join jadwal j on (a.idjadwal=j.idjadwal) join pegawai p 
                        on (a.idpeg=p.idpeg) join subprogram sp on (j.idsubprog=sp.idsubprog) order by idabsen asc");
			return $queryabsen;
    	}

   		public function tambah_absen($absensi){
			$this->db->insert('ABSENSI', $absensi);
		}

        public function tampil_data_jadwal(){
        	return $this->db->query('SELECT j.idjadwal, j.jam, sp.nmsubprog FROM jadwal j join subprogram sp on(j.idsubprog=sp.idsubprog)');
        }

        public function view_tgl($idjadwal){
            return $this->db->query("SELECT j.tanggal, sp.nmsubprog from jadwal j join subprogram sp on(j.idsubprog=sp.idsubprog) where idjadwal='".$idjadwal."'")->result_array();
        } 

        public function tampil_data_nmpegawai(){
            return $this->db->query('SELECT * from pegawai');
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

        public function data_ganti_absen(){
            $gantiabsen=$this->db->query("SELECT * from kesediaan");
            return $gantiabsen;
        }

        public function ganti_absen($ganti){
            $this->db->insert('KESEDIAAN', $ganti);
        }

        // GANTI ABSEN

        public function pegawai_pengganti($tgl, $jam_awal, $jam_akhir){
            return $this->db->query("SELECT distinct peg.idpeg, peg.nama, peg.no_telp, ab.tgl_absen, jdw.jam, sp.nmsubprog, 
                                    sp.idsubprog from pegawai peg join absensi ab on(peg.idpeg=ab.idpeg) 
                                    join jadwal jdw on(ab.idjadwal=jdw.idjadwal)
                                    join subprogram sp on(sp.idsubprog=jdw.idsubprog)
                                    where ab.tgl_absen = '$tgl'
                                    and jdw.jam not between '$jam_awal' and '$jam_akhir'"); 
        }      

        public function sms_pengganti($nomor, $tanggal, $jam, $kelas, $idsub){
            $this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Besok tanggal $tanggal pukul $jam, anda ditunjuk sebagai pengganti di kelas $kelas, balas dengan format GANTI-ID_ANDA-$idsub jika menyetujui.')");
        }
    }
?>