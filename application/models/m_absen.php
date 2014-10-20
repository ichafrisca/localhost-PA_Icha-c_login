<?php
	class M_absen extends CI_Model{
    	public function ambil_data_absen(){
    		$queryabsen=$this->db->query("SELECT a.idabsen, a.status_absen, a.tgl_absen, a.idpeg_pengganti, j.jam, 
                        sp.nmsubprog, p.nama, p.no_telp FROM absensi a join jadwal j on (a.idjadwal=j.idjadwal) join pegawai p 
                        on (a.idpeg=p.idpeg) join subprogram sp on (j.idsubprog=sp.idsubprog) order by idabsen asc");
			return $queryabsen;
    	}

   		public function tambah_absen($absensi){
			$this->db->insert('ABSENSI', $absensi);
		}

        public function tampil_data_jadwal($tgl){
        	return $this->db->query("SELECT j.idjadwal, j.jam, sp.nmsubprog 
                FROM jadwal j join subprogram sp on(j.idsubprog=sp.idsubprog) where j.tanggal in('$tgl')");
        }
        
        public function tampil_data_subprog(){
            return $this->db->query('SELECT idsubprog, nmsubprog, gelombang from subprogram where nmsubprog not in("Office")'); 
        }

        public function view_tgl($idjadwal){
            return $this->db->query("SELECT j.tanggal, sp.nmsubprog from jadwal j join subprogram sp on(j.idsubprog=sp.idsubprog) where idjadwal='".$idjadwal."'")->result_array();
        } 

        public function tampil_data_nmpegawai(){
            return $this->db->query("SELECT * from pegawai where stat_peg='Aktif'");
        }

		public function tampil_id() {
			$maxMe = $this->db->query("SELECT MAX( SUBSTR( idabsen, 4, 4 ) ) AS MAXID FROM absensi");
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

        // GANTI ABSEN

        public function pegawai_pengganti($tgl, $jam_awal, $jam_akhir){
            return $this->db->query("SELECT distinct peg.idpeg, peg.nama, peg.no_telp, ab.tgl_absen, jdw.jam, sp.nmsubprog, 
                                    jdw.idjadwal from pegawai peg join absensi ab on(peg.idpeg=ab.idpeg) 
                                    join jadwal jdw on(ab.idjadwal=jdw.idjadwal)
                                    join subprogram sp on(sp.idsubprog=jdw.idsubprog)
                                    where ab.tgl_absen = '$tgl'
                                    and jdw.jam not between '$jam_awal' and '$jam_akhir'"); 
        }      

        public function sms_pengganti($nomor, $tanggal, $jam, $kelas, $idsub){
            $this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Besok tanggal $tanggal pukul $jam, anda ditunjuk sebagai pengganti di kelas $kelas, balas dengan format GANTI#YA#ID_PEGAWAI_ANDA#$idsub jika menyetujui.')");
        }

        public function sms_pemberitahuan_jadwal($nomor){
            $this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                VALUES ('$nomor', 'Jadwal anda telah tersedia. Silahkan cek melalui portal.')");
        }

        public function nomor_pegawai(){
            return $this->db->query("SELECT no_telp from pegawai where stat_peg='Aktif'")->result_array();
        }

        public function kesediaan(){
            return $this->db->query("SELECT k.idsedia, k.status_sedia, p.no_telp, k.status_admin, p.nama, k.tgl_sedia, j.jam, r.namaruang from kesediaan k join pegawai p
                                    on(k.idpeg=p.idpeg) join jadwal j on(k.idjadwal=j.idjadwal) join ruang r on(j.idruang=r.idruang)")->result_array();
        }

        public function sms(){
            return $this->db->query("SELECT SenderNumber, TextDecoded, ID, Processed, ReceivingDateTime FROM inbox 
                        WHERE TextDecoded LIKE '%GANTI%'")->result_array();
        }

        public function update_kesediaan($data,$IDSEDIA){
            $this->db->query("UPDATE kesediaan SET status_admin='$data' WHERE idsedia='$IDSEDIA'");
        }

        public function smspegawai($nomor, $nama, $jam, $ruang){
            $this->db->query("INSERT into outbox (DestinationNumber,TextDecoded) 
                                VALUES ('$nomor', 'Saudara $nama, anda tepilih untuk menggantikan pada jam $jam ruang $ruang')");
        }

        public function nomor_untuk_kesediaan(){
             return $this->db->query("SELECT p.nama, p.no_telp FROM pegawai p join kesediaan k ON (p.idpeg=k.idpeg) WHERE k.status_admin='ya'");
        }
    }
?>