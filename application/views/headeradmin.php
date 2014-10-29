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
          <a href="#"> <!-- style="font-family:Verdana; color: cyan;" -->
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
      <h2 id="tables" style="text-align:center;">Data Pegawai</h2>
      <div class="row">
        <div class="small-6 columns">
          <a href="<?php echo base_url();?>c_dtpegawai/form_tambah" class="button radius">Tambah Pegawai</a>
        </div>
      </div>
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Pegawai</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No. telp</th>
                <th>Status</th>
                <th>Status Pegawai</th>
                <th>Username</th>
                <!-- <th>Password</th> -->
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=$nomor+1;
                  foreach($query ->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idpeg']."</td>";
                    echo "<td>".$rows['nama']."</td>";
                    echo "<td>".$rows['alamat']."</td>";
                    echo "<td>".$rows['tmpt_lahir']."</td>";
                    echo "<td>".$rows['tgl_lahir']."</td>";
                    echo "<td>".$rows['no_telp']."</td>";
                    echo "<td>".$rows['status']."</td>";
                    echo "<td>".$rows['stat_peg']."</td>";
                    echo "<td>".$rows['username']."</td>";
                    // echo "<td>".$rows['password']."</td>";
                    echo "<td>".anchor('c_dtpegawai/form_update_pegawai/'.$rows['idpeg'],'Ubah Data')."</td>";
                    
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
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