<?php
	class M_grammar extends CI_Model{
		public function ambil_grammar(){
			$querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, r.namaruang, s.nmsubprog, s.durasi, p.nmprogram
                                            FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) join subprogram s on (s.idruang = r.idruang) JOIN program p ON (s.idprogram = p.idprogram) WHERE p.idprogram LIKE 'GR%'");
			return $querygrammar;
    	}

  //   	public function tampil_edit($IDJADWAL){
  //   		$this->db->set('j.idjadwal');
  //   		$this->db->set('j.jam');
  //   		$this->db->set('j.tanggal');
  //   		$this->db->set('r.namaruang');
  //   		$this->db->where('p.idjadwal', 'GR');
  //   		$this->db->update('j.jadwal');
  //   		$this->db->update('r.ruang');
  //   		$this->db->update('a.absensi');
  //   	}

  //   	public function edit($data, $IDJADWAL){
		// 	$this->db->where('idjadwal',$IDJADWAL);
		// 	$this->db->update('JADWAL',$data);
		// }

		// public function tambah($jadwal, $absensi, $ruang, $subprogram, $program){
		// 	$this->db->insert('JADWAL', $jadwal);
  //           $this->db->insert('ABSENSI', $absensi);
  //           $this->db->insert('SUBPROGRAM', $subprogram);
  //           $this->db->insert('PROGRAM', $program);
		// }

  //       public function tampil_data_ruang() {
  //           return $this->db->query('SELECT * FROM ruang');
  //       }

  //       public function tampil_data_program() {
  //           return $this->db->query('SELECT * FROM program');
  //       }

  //       public function tampil_data_subprogram(){
  //           return $this->db->query('SELECT * FROM subprogram');   
  //       }

        public function tampil_id() {
            $maxMe = $this->db->query('SELECT MAX( SUBSTR( idjadwal, 4, 4 ) ) AS MAXID FROM jadwal');
            return $maxMe;
        }
    }
?>