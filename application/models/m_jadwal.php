<?php
	class M_jadwal extends CI_Model{
		public function ambil_jadwal(){
			// $queryjadwal=$this->db->query("select * from jadwal order by idjadwal asc");
			$queryjadwal=$this->db->query("SELECT a.idjadwal, j.tanggal, j.jam, r.namaruang, p.idprogram, p.nmprogram, s.durasi, s.nmsubprog
											FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) JOIN program p ON (r.idprogram = p.idprogram), subprogram s WHERE p.idprogram=s.idsubprog");
			return $queryjadwal;
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

		// public function tambah($data){
		// 	$this->db->insert('JADWAL', $data);
		// 	return;
		// }

    	public function max_jadwal(){
			$maxjdw = $this->db->query("SELECT max(substr(idjadwal, 4, 4) ) as maxID FROM jadwal");
			return $maxjdw;
		}

    	
	}
?>