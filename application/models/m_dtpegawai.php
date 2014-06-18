<?php
    class M_dtpegawai extends CI_Model{
    	public function ambil_data_pegawai(){
    		$query=$this->db->query("select * from pegawai order by idpeg asc");
			return $query;
    	}
    	
    	public function tampil_edit($IDPEG){
    		$this->db->where('idpeg',$IDPEG);
    		$query=$this->db->get('PEGAWAI');
    		return $query;
    	}

    	public function edit($data, $IDPEG){
			$this->db->where('idpeg',$IDPEG);
			$this->db->update('PEGAWAI',$data);
		}

		public function tambah($data){
			$this->db->insert('PEGAWAI', $data);
			return;
		}

		public function tampil_id() {
			$maxMe = $this->db->query('SELECT MAX( SUBSTR( idpeg, 4, 4 ) ) AS MAXID FROM pegawai');
			return $maxMe;
		}
    }
?>