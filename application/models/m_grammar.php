<?php
    class M_grammar extends CI_Model{
        public function ambil_grammar(){
            $querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, r.namaruang, s.nmsubprog, s.durasi, p.nmprogram
                                                FROM jadwal j JOIN absensi a ON ( j.idjadwal = a.idjadwal ) JOIN ruang r ON ( a.idruang = r.idruang ) join subprogram s on (s.idruang = r.idruang) JOIN program p ON (s.idprogram = p.idprogram) WHERE p.idprogram LIKE 'GR%'");
            return $querygrammar;
        }

        public function tampil_id() {
            $maxMe = $this->db->query('SELECT MAX( SUBSTR( idjadwal, 4, 4 ) ) AS MAXID FROM jadwal');
            return $maxMe;
        }
    }
?>