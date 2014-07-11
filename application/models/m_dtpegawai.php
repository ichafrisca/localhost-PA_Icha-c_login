<?php
    class M_dtpegawai extends CI_Model{

    	public function total_pegawai() {
			return $this->db->count_all('pegawai');
		}

		public function get_pegawai_page($p = 0, $jumlah = 5) {
			$sql = "select * from pegawai";
			$sql.=" limit $p, $jumlah";
			$query=$this->db->query($sql);
			return $query;
		}

		public function tambah($data){
			$this->db->insert('PEGAWAI', $data);
			return;
		}

		public function tampil_id() {
			$maxMe = $this->db->query('SELECT MAX( SUBSTR( idpeg, 4, 4 ) ) AS MAXID FROM pegawai');
			return $maxMe;
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

		public function tampil_status(){
		   $list_status = $this->db->query("Select status from pegawai");  
		   return $list_status;
		}
    }
?>