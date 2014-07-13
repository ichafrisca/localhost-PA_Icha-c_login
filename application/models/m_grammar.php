<?php
    class M_grammar extends CI_Model{
        public function ambil_grammar(){
            $querygrammar=$this->db->query("SELECT j.idjadwal, j.jam, j.periode_tgl, s.slot, r.namaruang, sp.nmsubprog, p.nmprogram from jadwal j join slot s on(j.idslot=s.idslot) join ruang r on (j.idruang=r.idruang) join subprogram sp on (j.idsubprog=sp.idsubprog) join program p on (sp.idprogram=p.idprogram) WHERE p.idprogram LIKE 'GR%'");
            return $querygrammar;
        }

        public function tampil_id() {
            $maxMe = $this->db->query('SELECT MAX( SUBSTR( idjadwal, 4, 4 ) ) AS MAXID FROM jadwal');
            return $maxMe;
        }
    }
?>