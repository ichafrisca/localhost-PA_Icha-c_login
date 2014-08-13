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
  <center><h2>Input Gaji</h2></center>
  <?php
    echo form_open('c_gaji/tambah');
      echo '
      <br>
        <div class="row">
          <div class="large-12 columns">
            <tr>
              <td>'.form_hidden('idgaji',$newID,'readonly').'</td>
            </tr>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <tr>
              <td>Nama Pegawai</td>
              <td>:</td>
              <td>';
                  $droppeg = array('-' => '- Pilih Pegawai - ');
                  foreach ($dropdown_nmpegawai as $row) {
                    $droppeg[$row['idpeg']] = $row['nama'];
                  }
                  echo form_dropdown('idpeg', $droppeg, '-', "id='drop_peg'");
                  echo
                '
              </td>
            </tr>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="large-6 columns">
            <label for="from">Dari Tanggal</label>
            <input type="text" id="from" name="from">
          </div>
          <div class="large-6 columns">
            <label for="to">Sampai Tanggal</label>
            <input type="text" id="to" name="to">
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <tr>
              <td>Jumlah Pertemuan</td>
              <td>:</td>
              <td>';
              $property = array('name' => 'jml_prtemuan', 'id' => 'jml_pertemuan', 'readonly' => 'true');
              echo form_input($property);
              echo '</td>
            </tr>
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            <tr>
              <td>Honor</td>
              <td>:</td>
              <td>'.form_input('honor').'</td>
            </tr>
          </div>
          <div class="large-6 columns">
            <tr>
              <td>Bonus</td>
              <td>:</td>
              <td>'.form_input('bonus').'</td>
              </tr>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <tr>
              <td>Total Gaji</td>
              <td>:</td>
              <td>'.form_input('totalgaji').'</td>
            </tr>
          </div>
        </div>
        <br>
        
      <label>
        <input type="submit" value="Save" class="button radius expand">
      </label>
      <label>
        <a href='. base_url() .'c_dtpegawai/page class="button radius expand">Back</a>
      </label>';
    
      echo form_close();
      ?>
      <?php if (isset($validation_errors)) echo $validation_errors;?>
    </div>
  </div>
</div>

		<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.abide.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/development-bundle/themes/smoothness/jquery-ui.css">
  <script src="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- javascript jQueryUI datepicker -->
  <script>
    $(function() {
      $( "#from" ).datepicker({
        dateFormat:'yy-mm-dd', 
        showAnim: 'slideDown',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2,
        onClose: function( selectedDate ) {
          $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#to" ).datepicker({
        dateFormat:'yy-mm-dd', 
        showAnim: 'slideDown',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2,
        onClose: function( selectedDate ) {
          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });
  </script>

  <!-- javascript jQuery -->
  <script>
    $(document).ready(function() {
      // $("#from").change(function(),
      $("#to").change(function() {
        var hasil = $(this).val();
        $.ajax({
          type        : 'GET',
          url         : 'jml_hadir/' + hasil,
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data) {
            var totalHadir = 0;
            for (var i = 0; i < data.length; i++) {
              totalHadir += parseInt(data[i].total_hadir);
            };
            $("#jml_pertemuan").val(totalHadir);
          },
          error       : function(data) {
            alert('kesalahan: ' + data);
          }
        });
      });
    });
  </script>
	</body>
</html>