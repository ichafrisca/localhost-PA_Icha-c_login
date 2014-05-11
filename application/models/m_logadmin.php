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
 <?php
// 	class M_logadmin extends CI_model{
		
// 		public function login($username, $password, $status){
// 			$this -> db -> select('*');
// 			$this -> db -> from ('PEGAWAI');
// 			$this -> db -> where ('USERNAME', $username);
// 			$this -> db -> where ('PASSWORD', $password);
// 			$this -> db -> where ('STATUS', $status);
// 			// membuat query yang mengambil datase
// 			$query = $this -> db -> get();
// 			// kembali ke query
// 			return $query -> num_rows();
// 		}

// 		public function dataPegawai($username){
// 			$this -> db -> select ('USERNAME');
// 			$this -> db -> select ('PEGAWAI');
// 			$this -> db -> where ('USERNAME', $username);
// 			$query = $this -> db -> get('PEGAWAI');

// 			return $query -> row();
// 		}
// 	}
// ?>