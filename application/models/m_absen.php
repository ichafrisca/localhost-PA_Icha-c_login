<?php
	class M_absen extends CI_Model{
    	public function ambil_data_absen(){
    		$queryabsen=$this->db->query("SELECT a.idabsen, a.status_absen, a.tgl_absen, a.idpeg_pengganti, r.namaruang, j.jam, j.tanggal, p.nama
    									 FROM absensi a JOIN ruang r ON ( a.idruang = r.idruang ) JOIN jadwal j ON ( a.idjadwal = j.idjadwal ) JOIN pegawai p ON ( a.idpeg = p.idpeg )");
			return $queryabsen;
    	}
    }
?>