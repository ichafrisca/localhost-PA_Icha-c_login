<html>
	<head>
		<title>Kepegawaian ELFAST</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>

<body>		   
 <!-- Header and Nav -->
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- TITLE AREA -->
      <li class="name">
        <h1>
          <a href="#">
            ADMIN ELFAST
          </a>
        </h1>
      </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

    <!-- MENU DATA PEGAWAI -->
    <section class="top-bar-section">
        <!-- Left Nav Section -->
      
      <ul class="left">
          <li class="divider"></li>
              <li><a href="<?php echo base_url()?>c_dtpegawai/page">Data Pegawai</a></li>
          <li class="divider"></li>

          <!-- MENU JADWAL PEGAWAI -->
          <li class="has-dropdown">
            <a href="<?php echo base_url()?>c_jadwal/disp">Jadwal Pegawai</a>
            <ul class="dropdown">
              <li>
                <a href="<?php echo base_url()?>c_jadwal/grammar">Grammar</a>
              </li>

              <!-- SPEAKING PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_jadwal/speaking">Speaking</a>
              </li>

              <!-- PRONUNCIATION PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_jadwal/pronun">Pronunciation</a>
              </li>

              <!-- VOCABULARY PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_jadwal/vocab">Vocabulary</a>
              </li>

              <!-- TOEFL PROGRAM-->
              <li>
                <a href="<?php echo base_url()?>c_jadwal/toefl">TOEFL</a>
              </li>

              <!-- PAKET PROGRAM-->
              <li>
                <a href="<?php echo base_url()?>c_jadwal/efast">E-fast & Scoring TOEFL</a>
              </li>

              <!-- PEGAWAI OFFICE SHIFT PAGI -->
              <li><a href="<?php echo base_url()?>c_jadwal/ofpagi">Office Shift Pagi</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/ofsiang">Office Shift Siang</a></li>
            </ul>
          </li>

          <!-- MENU PRESENSI-->
          <li class="divider"></li>
            <li>
              <a href="<?php echo base_url()?>c_absen/disp">Presensi Pegawai</a>
            </li>
      
          <!-- GAJI PEGAWAI -->
          <li class="divider"></li>
            <li>
              <a href="<?php echo base_url()?>c_gaji/disp">Gaji Pegawai</a>
            </li>
          <li class="divider"></li>
            <li>
              <a href="<?php echo base_url()?>c_sms/disp">SMS</a>
            </li>
          <li class="divider"></li>
           <!--  <li><a href="#">Detail Gaji</a></li> -->
      </ul>

      <!-- RIGHT POSITION -->
      <ul class="right">
        <li class="divider"></li>
        <li><a href="<?php echo base_url();?>c_login/logout">Logout</a></li>
      </ul>
    </section>
</nav>
<br><br><br>

  <!-- PEGAWAI -->
  <div class="row">
    <div class="large-12 medium-9 columns panel">
      <h2 id="tables" style="text-align:center;">Jadwal Kelas</h2>
      <div class="row">
        <div class="small-6 columns">
          <a href="<?php echo base_url();?>c_jadwal/form_tambah" data-dropdown="drop1" class="button dropdown">Tambah</a><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown">
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah">Tambah Jadwal</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_office">Tambah Jadwal Office</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_program">Tambah Program</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_subprog">Tambah Subprogram</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_ruang">Tambah Ruangan</a></li>
            </ul>
        </div>
      </div>
        <center>
          <table style="width:100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Periode Tanggal</th>
                <th>Nama Ruang</th>
                <th>Nama Subprogram</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($queryjadwal->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idjadwal']."</td>";
                    echo "<td>".$rows['tanggal']."</td>";
                    echo "<td>".$rows['jam']."</td>";
                    echo "<td>".$rows['periode_tgl']."</td>";
                    echo "<td>".$rows['namaruang']."</td>";
                    echo "<td>".$rows['nmsubprog']."</td>";
                    if ($rows['namaruang']=='Office'){
                      echo "<td>".anchor('c_jadwal/form_update_office/'.$rows['idjadwal'],'Ubah Jadwal')."</td>";
                    }else{
                      echo "<td>".anchor('c_jadwal/form_update_jadwal/'.$rows['idjadwal'],'Ubah Jadwal')."</td>";
                    }
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
          </center>
          <?php echo $pagination; ?>
    </div>
  </div>

		<!-- javascript foundation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script> 
  	<script type="text/javascript">
  		$(document).foundation();
  	</script>
	</body>
</html>