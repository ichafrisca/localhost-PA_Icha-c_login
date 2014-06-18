<?php
	class M_logadmin extends CI_model{
		
		public function login($username, $password, $status){
			$this -> db -> select('*');
			$this -> db -> where ('STATUS', $status);
			$this -> db -> where ('PASSWORD', $password);
			$this -> db -> where ('STATUS', $status);
			$query = $this -> db -> get('PEGAWAI');
			return $query -> num_rows();
		}
	}
?>