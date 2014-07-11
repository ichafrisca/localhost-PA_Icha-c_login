<?php
	class M_speaking extends CI_Model{
		public function ambil_speaking(){
			$queryspeaking=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, r.namaruang, s.nmsubprog, s.durasi, p.nmprogram
                                            FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) join subprogram s on (s.idruang = r.idruang) JOIN program p ON (s.idprogram = p.idprogram) WHERE p.idprogram LIKE 'SP%'");
			return $queryspeaking;
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

		// public function tambah($data){
		// 	$this->db->insert('JADWAL', $data);
		// 	return;
		// }
    }
?>