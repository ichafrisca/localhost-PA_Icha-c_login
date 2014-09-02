<?php
	class M_jadwal extends CI_Model{

		public function total_jadwal() {
			return $this->db->count_all('jadwal');
		}

		public function ambil_jadwal($p = 0, $jumlah = 10) {
			$sql = "SELECT j.idjadwal, j.tanggal, j.jam, j.periode_tgl,r.namaruang, sp.nmsubprog 
				from jadwal j join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) order by idjadwal asc";
			$sql.=" limit $p, $jumlah";
			$queryjadwal=$this->db->query($sql);
			return $queryjadwal;
		}

		public function tambah_jadwal($jadwal){
			$this->db->insert('jadwal', $jadwal);
		}

		// public function ruang_tersedia($jam){
		// 	return $this->db->query("SELECT r.namaruang from jadwal j join ruang r on (j.idruang=r.idruang) where j.jam NOT IN 
		// 					(select j.jam from jadwal where j.jam='$jam')");
		// }

		public function tampil_edit($IDJADWAL){
            $this->db->where('idjadwal',$IDJADWAL);
            $queryjadwal=$this->db->get('JADWAL');
            return $queryjadwal;
        }

        public function edit($data, $IDJADWAL){
            $this->db->where('idjadwal',$IDJADWAL);
            $this->db->update('JADWAL',$data);
        }

    	public function max_jadwal(){
			$maxjdw = $this->db->query("SELECT max(substr(idjadwal, 4, 4) ) as maxID FROM jadwal");
			return $maxjdw;
		}	

		public function max_subprog(){
			$maxsp = $this->db->query("SELECT max(substr(idsubprog, 4, 4) ) as maxID FROM subprogram");
			return $maxsp;
		}

		public function max_ruang(){
			$maxra = $this->db->query("SELECT max(substr(idruang, 4, 4) ) as maxID FROM ruang");
			return $maxra;
		}

		public function tampil_ruang_office() {
            return $this->db->query('SELECT * from ruang where namaruang="Office"');
        }

        public function tampil_data_ruang() {
            return $this->db->query('SELECT idruang, namaruang from ruang where namaruang not in("Office")');
        }

        public function tampil_data_slot() {
            return $this->db->query('SELECT * FROM slot');
        }

        public function tampil_data_jadwal(){
        	return $this->db->query('SELECT * FROM jadwal');	
        }

        public function tampil_data_subprog(){
        	return $this->db->query('SELECT idsubprog, nmsubprog, gelombang from subprogram where nmsubprog not in("Office")');	
        }

        public function tampil_data_program(){
        	return $this->db->query('SELECT * FROM program');	
        }

        public function tambah_program($data){
			$this->db->insert('PROGRAM', $data);
			return;
		}

		public function tambah_subprog($data){
			$this->db->insert('SUBPROGRAM', $data);
			return;
		}

		public function tambah_ruang($data){
			$this->db->insert('RUANG', $data);
			return;
		}

		public function ambil_grammar(){
            $querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'GR%'");
            return $querygrammar;
        }

        public function tampil_id() {
            $maxMe = $this->db->query('SELECT MAX( SUBSTR( idjadwal, 4, 4 ) ) AS MAXID FROM jadwal');
            return $maxMe;
        }

        public function ambil_efast(){
        $queryefast=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'EF%'");
		return $queryefast;
    	}

    	public function ambil_pronun(){
			$querypronun=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR%'");
			return $querypronun;
    	}

    	public function ambil_speaking(){
			$queryspeaking=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'SP%'");
			return $queryspeaking;
    	}

    	public function ambil_toefl(){
			$querytoefl=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'TO%'");
			return $querytoefl;
    	}

    	public function ambil_vocab(){
			$queryvocab=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'VC%'");
			return $queryvocab;
    	}

    	public function ambil_ofpagi(){
			$queryofpagi=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'OP%'");
			return $queryofpagi;
    	}

    	public function ambil_ofsiang(){
			$queryofsiang=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'OS%'");
			return $queryofsiang;
    	}
	}
?>