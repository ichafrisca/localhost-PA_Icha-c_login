<?php
    class M_dtpegawai extends CI_Model{
    	public function ambil_data_pegawai(){
    		$query=$this->db->query("select * from PEGAWAI order by idpeg asc");
			return $query->result();
    	}

    	public function edit($data, $IDPEG){
			$this->db->where('IDPEG',$IDPEG);
			$this->db->update('PEGAWAI',$data);
		}
    }
?>