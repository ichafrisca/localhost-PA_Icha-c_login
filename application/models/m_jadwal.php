<?php
	class M_jadwal extends CI_Model{
		public function ambil_jadwal(){
			// $queryjadwal=$this->db->select('idjadwal, jam, tanggal, namaruang, nmprogram, nmsubprog, durasi');
			// $queryjadwal=$this->db->from('jadwal');
			// $queryjadwal=$this->db->join('absensi', 'jadwal.idjadwal=absensi.idjadwal');
			// $queryjadwal=$this->db->join('ruang', 'absensi.idruang=ruang.idruang');
			// $queryjadwal=$this->db->join('program', 'ruang.idprogram=program.idprogram');
			// $queryjadwal=$this->db->join('subprogram', 'absensi.idruang=ruang.idruang');
			$queryjadwal=$this->db->query("SELECT j.idjadwal, j.jam, j.tanggal, r.namaruang, p.nmprogram, s.nmsubprog, s.durasi
											FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) JOIN program p ON (r.idprogram = p.idprogram) join subprogram s on (p.idprogram=s.idprogram)");
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