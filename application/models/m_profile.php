<?php
    class Modmember extends CI_Model{
    	public function ambil_data_member(){
    		$query=$this->db->query("select * from pegawai where idpeg=");
			return $query;
    	}

		public function hapus($ID_MEMBER){
			$this->db->where('ID_MEMBER',$ID_MEMBER);
			$this->db->delete('MEMBER');
		}
		
		public function tampil_satu($ID_MEMBER){
			$this->db->where('ID_MEMBER',$ID_MEMBER);
			$query=$this->db->get('MEMBER');
			return $query;
		}
		
		public function edit($data,$ID_MEMBER){
			$this->db->where('ID_MEMBER',$ID_MEMBER);
			$this->db->update('MEMBER',$data);
		}
    }
?>