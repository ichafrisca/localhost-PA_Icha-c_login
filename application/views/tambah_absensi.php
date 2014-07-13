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
                <a href="<?php echo base_url()?>c_grammar/disp">Grammar</a>
              </li>

              <!-- SPEAKING PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_speaking/disp">Speaking</a>
              </li>

              <!-- PRONUNCIATION PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_pronun/disp">Pronunciation</a>
              </li>

              <!-- VOCABULARY PROGRAM -->
              <li>
                <a href="<?php echo base_url()?>c_vocab/disp">Vocabulary</a>
              </li>

              <!-- TOEFL PROGRAM-->
              <li>
                <a href="<?php echo base_url()?>c_toefl/disp">TOEFL</a>
              </li>

              <!-- PAKET PROGRAM-->
              <li>
                <a href="<?php echo base_url()?>c_efast/disp">E-fast & Scoring TOEFL</a>
              </li>

              <!-- PEGAWAI OFFICE SHIFT PAGI -->
              <li><a href="<?php echo base_url()?>c_ofpagi/disp">Office Shift Pagi</a></li>
              <li><a href="<?php echo base_url()?>c_ofsiang/disp">Office Shift Siang</a></li>
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
  <div class="large-12 panel">
  <?php
      echo form_open('c_absen/tambah');
        echo '<center><h3>Form Tambah Absensi</h3></center>
        
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>ID Absen</td>
                <td>:</td>
                <td>'.form_input('idabsen',$newID,'readonly').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
               <tr>
                <td>Status Absen</td>
                <td>:</td>
                <td>';
                $dropdown_absensi = array(
                    "-" => "- Pilih Status Kehadiran -",
                    "Tidak Hadir" => "Tidak Hadir",
                    "Hadir"       => "Hadir");
                echo form_dropdown('status_absen', $dropdown_absensi, '-');
                echo '</td>
              </tr>
            </div>
          </div><br/>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal Absen</td>
                <td>:</td>
                <td><input type="text" name="tgl_absen" id="datepicker"></td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Pegawai Pengganti</td>
                <td>:</td>  
                <td>'.form_input('idpeg_pengganti').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Jadwal</td>
                <td>:</td>
                <td>';
                  $dropdon = array('-' => '- Pilih Jadwal - ');
                  foreach ($dropdown_jadwal as $row) {
                    $dropdon[$row['idjadwal']] = $row['jam'];
                  }
                  echo form_dropdown('idjadwal', $dropdon, '-');
                  echo
                '</td>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td>';
                  $dropdown = array('-' => '- Pilih Nama Pegawai - ');
                  foreach ($dropdown_nmpegawai as $row) {
                    $dropdown[$row['idpeg']] = $row['nama'];
                  }
                  echo form_dropdown('idpeg', $dropdown, '-');
                  echo
                '</td>
              </tr>
            </div>
          </div>
          <br>
        <label>
          <input type="submit" value="Save" class="button radius expand">
        </label>
        <label>
          <a href='. base_url() .'c_absen/disp class="button radius expand">Back</a>
        </label>';
        echo form_close();
      ?>
      <?php if (isset($validation_errors)) echo $validation_errors;?>
      </div>
      </div>

		<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.abide.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/development-bundle/themes/smoothness/jquery-ui.css">
  <script src="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery.ui.datepicker.validation.min.js"></script> 
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript">
		$(document).foundation();
	</script>

  <script>
    $(function() {
      $( "#datepicker" ).datepicker(
        {
          dateFormat:'yy-mm-dd', 
          showAnim: 'slideDown',
          minDate: 0
        }
      );
    });
  </script>
	</body>
</html>