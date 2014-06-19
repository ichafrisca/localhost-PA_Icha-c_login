<?php
	class M_grammar extends CI_Model{
		public function ambil_grammar(){
			$querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.tanggal, r.namaruang, p.nmprogram, s.nmsubprog, s.durasi
											FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) JOIN program p ON (r.idprogram = p.idprogram) join subprogram s on (p.idprogram=s.idprogram) WHERE p.idprogram LIKE 'GR%'");
			return $querygrammar;
    	}

    	public function tampil_edit($IDJADWAL){
    		$this->db->where('idjadwal',$IDJADWAL);
    		$querygrammar=$this->db->get('JADWAL');
    		return $querygrammar;
    	}

    	public function edit($data, $IDJADWAL){
			$this->db->where('idjadwal',$IDJADWAL);
			$this->db->update('JADWAL',$data);
		}

		public function tambah($data){
			$this->db->insert('JADWAL', $data);
			return;
		}
    }
?>