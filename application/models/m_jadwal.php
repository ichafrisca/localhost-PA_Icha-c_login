<?php
	class M_jadwal extends CI_Model{

		public function total_jadwal() {
			return $this->db->count_all('jadwal');
		}

		public function ambil_jadwal($p = 0, $jumlah = 10) {
			$sql = "SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp on (j.idsubprog=sp.idsubprog) order by idjadwal asc";
			$sql.=" limit $p, $jumlah";
			$queryjadwal=$this->db->query($sql);
			return $queryjadwal;
		}

		public function tambah_jadwal($jadwal){
			$this->db->insert('jadwal', $jadwal);
		}

		public function hapus($idjadwal){
			$this->db->where('idjadwal',$idjadwal);
			$this->db->delete('jadwal');
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

		public function tampil_data_ruang() {
            return $this->db->query('SELECT * FROM ruang');
        }

        public function tampil_data_slot() {
            return $this->db->query('SELECT * FROM slot');
        }

        public function tampil_data_jadwal(){
        	return $this->db->query('SELECT * FROM jadwal');	
        }

        public function tampil_data_subprog(){
        	return $this->db->query('SELECT * FROM subprogram');	
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
	}
?>