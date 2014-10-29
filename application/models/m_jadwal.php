<?php
	class M_jadwal extends CI_Model{

		public function total_jadwal() {
			return $this->db->count_all('jadwal');
		}

		public function ambil_jadwal($p = 0, $jumlah = 5) {
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

		public function is_ruang_available($tanggal, $jam, $namaruang){
			$jadwal = $this->db->query("SELECT COUNT(r.idruang) as jumlah_ruang from jadwal j join ruang r on(j.idruang=r.idruang) 
									where j.tanggal='$tanggal' and j.jam='$jam' and r.idruang='$namaruang'")->row();
			
			if ($jadwal->jumlah_ruang > 0) {
				return FALSE;
			} else {
				return TRUE;
			}
		}

		public function ruang_tersedia($jam, $tgl){
		 	return $this->db->query("SELECT  r.idruang, r.namaruang, j.jam 
									from jadwal j join ruang r on (j.idruang=r.idruang) 
									where j.jam NOT IN ('$jam') and j.tanggal in ('$tgl') 
									and r.namaruang NOT IN ('Office') group by namaruang
									union all
									select idruang, namaruang, null from ruang where namaruang not in('Office') order by idruang");
		}

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

		public function max_program(){
			$maxpr = $this->db->query("SELECT max(substr(idprogram, 4, 4) ) as maxID FROM program");
			return $maxpr;
		}

		public function max_ruang(){
			$maxra = $this->db->query("SELECT max(substr(idruang, 4, 4) ) as maxID FROM ruang");
			return $maxra;
		}

		public function tampil_ruang_office() {
            return $this->db->query('SELECT * from ruang where namaruang="Office"');
        }

        // public function tampil_data_ruang() {
        //     return $this->db->query('SELECT idruang, namaruang from ruang where namaruang not in("Office")');
        // }

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

        public function tampil_id() {
            $maxMe = $this->db->query('SELECT MAX( SUBSTR( idjadwal, 4, 4 ) ) AS MAXID FROM jadwal');
            return $maxMe;
        }

        public function ambil_grammar(){
            $querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
            	from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
            	on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR002%'");
            return $querygrammar;
        }

        public function ambil_speaking(){
			$queryspeaking=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR005%'");
			return $queryspeaking;
    	}

    	public function ambil_pronun(){
			$querypronun=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR004%'");
			return $querypronun;
    	}

    	public function ambil_vocab(){
			$queryvocab=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR007%'");
			return $queryvocab;
    	}

    	public function ambil_toefl(){
			$querytoefl=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR006%'");
			return $querytoefl;
    	}

        public function ambil_efast(){
        $queryefast=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram 
				from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp 
				on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'PR001%'");
		return $queryefast;
    	}


    	public function ambil_ofpagi(){
			$queryofpagi=$this->db->query("SELECT j.idjadwal, j.tanggal, j.jam, j.periode_tgl,r.namaruang
											from jadwal j join ruang r on (j.idruang=r.idruang) where j.jam='Pagi'");
			return $queryofpagi;
    	}

    	public function ambil_ofsiang(){
			$queryofsiang=$this->db->query("SELECT j.idjadwal, j.tanggal, j.jam, j.periode_tgl,r.namaruang
											from jadwal j join ruang r on (j.idruang=r.idruang) where j.jam='Siang'");
			return $queryofsiang;
    	}
	}
?>