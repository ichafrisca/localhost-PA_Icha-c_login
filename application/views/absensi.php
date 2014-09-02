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
      <h2 id="tables" style="text-align:center;">Absensi Pegawai</h2><br>
      <div class="row">
        <div class="small-2 columns">
          <a href="<?php echo base_url();?>c_absen/form_tambah" data-dropdown="drop1" class="button dropdown">Tambah</a>
            <ul id="drop1" data-dropdown-content class="f-dropdown">
              <li><a href="<?php echo base_url();?>c_absen/form_tambah">Tambah Absensi</a></li>
              <li><a href="<?php echo base_url();?>c_absen/form_ganti_absen">Pengganti Pegawai</a></li>
            </ul>
        </div>
        <div class="small-10 columns" style="float:top;">
          <?php echo form_open("c_absen/sms_pemberitahuan_jadwal"); ?>
              <a><input type="submit" class="button radius" value="Kirim Pemberitahuan" /></a>
          <?php echo form_close(); ?>
        </div>
      </div>
        <center>
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Absen</th>
                <th>Status Absen</th>
                <th>Tanggal Absen</th>
                <th>Pegawai Pengganti</th>
                <th>Jam Masuk</th>
                <th>Nama Subprogram</th>
                <th>Nama Pegawai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($queryabsen->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idabsen']."</td>";
                    echo "<td>".$rows['status_absen']."</td>";
                    echo "<td>".$rows['tgl_absen']."</td>";
                    echo "<td>".$rows['idpeg_pengganti']."</td>";
                    echo "<td>".$rows['jam']."</td>";
                    echo "<td>".$rows['nmsubprog']."</td>";
                    echo "<td>".$rows['nama']."</td>";
                    echo "<td>".anchor('c_absen/form_update_absen/'.$rows['idabsen'],'Ubah')."</td>";
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
        </center>
    </div>
  </div>

		<!-- javascript foundation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.reveal.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>    
  	<script type="text/javascript">
  		$(document).foundation();
  	</script>

    <!-- jQuery -->
    <script>
      $(document).ready(function(){
        $("#check_all").click(function() {
          var cek = $("#check_all").is(':checked');
          if(cek){
            $("input[type='checkbox']").prop('checked',true);
            console.log($("input[type='checkbox']").val());
          }
          else{
            $("input[type='checkbox']").prop('checked',false);
          }
        });
      });
    </script>

    <script>
    <?php if ($notif != null){
      echo $notif;
    } ?>
    </script>
	</body>
</html>