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
  <div class="large-12 panel">
  <?php
      echo form_open('c_jadwal/tambah');
        echo '<center><h3>Form Tambah Jadwal</h3></center>
        
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>ID Jadwal</td>
                <td>:</td>
                <td>'.form_input('idjadwal',$newID,'readonly').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>'; $tanggal = array('name'=>'tanggal','id'=>'datepicker');
                      echo form_input($tanggal ) .'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Jam</td>
                <td>:</td>
                <td> <input type="text" data-field="time" name="jam"></td>
                <div id="dtBox"></div>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
               <tr>
                <td>Periode Tanggal</td>
                <td>:</td>
                <td>'. form_input('periode_tgl') .'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Sisa Kelas</td>
                <td>:</td>
                <td><select name="slot">
                    <option value="kosong">- Pilih slot -</option>
                    ';
                    foreach ($dropdown_slot->result_array() as $row) {
                      echo "<option value='". $row['idslot'] ."'> ".$row['slot'] ."</option>";
                    }
                    echo '
                  </select></td>
              </tr>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Nama Ruang</td>
                <td>:</td>
                <td>
                  <select name="namaruang">
                    <option value="kosong">- Pilih nama ruang -</option>
                    ';
                    foreach ($dropdown_ruang->result_array() as $row) {
                      echo "<option value='". $row['idruang'] ."'>Ruang : ".$row['namaruang'] ."</option>";
                    }
                    echo '
                  </select>
                </td>
              </tr>
            </div>
          </div><br/>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Sub Program</td>
                <td>:</td>  
                <td>
                  <select name="subprogram">
                    <option value="kosong">- Pilih nama subprogram -</option>
                    ';
                    foreach ($dropdown_subprog->result_array() as $row) {
                      echo "<option value='". $row['idsubprog'] ."'>".$row['nmsubprog']."</option>";
                    }
                    echo '
                  </select>
                </td>
              </tr>
            </div>
          </div>
          <br/>

        <label>
          <input type="submit" value="Save" class="button radius expand">
        </label>
        <label>
          <a href='. base_url() .'c_jadwal/disp class="button radius expand">Back</a>
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
          changeMonth: 'true',
          changeYear: 'true',
          dateFormat:'yy-mm-dd', 
          showAnim: 'slideDown',
          minDate: 0
        }
      );
    });
  </script>
	</body>
</html>