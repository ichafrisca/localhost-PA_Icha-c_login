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
                <td>'.form_hidden('status_absen','Tidak Hadir').'</td>
              </tr>
            </div>
          </div>
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
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>'.form_hidden('idpeg_pengganti',0).'</td>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Jam</td>
                <td>:</td>
                <td>
                  <select name="idjadwal">
                    <option value="kosong">- Pilih Jam -</option>
                  </select>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal Kelas</td>
                <td>:</td>
                <td><input type="text" name="tgl_kelas" readonly></td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Nama Subprogram</td>
                <td>:</td>
                <td><input type="text" name="nmsubprog" readonly></td>
              </tr>
            </div>
          </div>
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

  <script>
    $(function() {
      $( "#datepicker" ).datepicker(
        {
          changeMonth: 'true',
          changeYear: 'true',
          dateFormat:'yy-mm-dd', 
          showAnim: 'slideDown',
          // minDate: 0
        }
      );
    });
  </script>

  <!-- ajax jQuery -->
  <script>
    $(document).ready(function(){
      $("input[value='Save']").prop("disabled", true);
      $("select[name='idjadwal']").change(function(){
        var idjadwal=$(this).val();
        
        $.ajax({
          type        : 'GET',
          url         : 'tgl_subprog/' + idjadwal,
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data){
            console.log(data[0].tanggal + " - " + data[0].nmsubprog);
            $("input[name='tgl_kelas']").val(data[0].tanggal);
            $("input[name='nmsubprog']").val(data[0].nmsubprog);
            var tanggal_absen=$("input[name='tgl_absen']").val();
            var tanggal_kelas=$("input[name='tgl_kelas']").val();
            if(tanggal_absen === tanggal_kelas){
              $("input[value='Save']").prop("disabled", false);
            }else{
              alert("tanggal yang di pilih kurang atau lebih dari tanggal jadwal");
              $("input[value='Save']").prop("disabled", true);
            }
          },
          error       : function(data){
            alert("Salah :" + data);
          }
        })
      });
    })
  </script>

  <script>
    $(document).ready(function(){
      $('input[name="tgl_absen"]').change(function() {
        $.ajax({
          type        : 'GET',
          url         : 'json_tambah_absen/' + $('input[name="tgl_absen"]').val(), 
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data){
            $("select[name='idjadwal'] option").next().remove();
            $.each(data, function(index, element) {
              $('select[name="idjadwal"]').append("<option value='"+ element.idjadwal +"'>"+ element.jam +"</option>");
            });
          },
          error       : function(data){

          }
        });
      });
    });
  </script>

  <!-- jam yg uda dipake -->
   <script>
  //   $(document).ready(function(){
  //     $('input[name="tgl_absen"], select[name="idjadwal"]').change(function() {
  //       $.ajax({
  //         type        : 'GET',
  //         url         : 'json_jam_tersedia/' + $('input[name="tgl_absen"]').val() + '/' + $('select[name="idjadwal"]').val(), 
  //         dataType    : 'json',
  //         contentType : 'application/json; charset=utf-8',
  //         success     : function(data){
  //           $("input[name='tgl_kelas']").next();
  //           $("input[name='nmsubprog']").next();
  //           $.each(data, function(index, element) {
  //             console.log(data);
  //             $('input[name="tgl_kelas"]').append("<option value='"+ element.idsubprog +"'>"+ element.nmsubprog +"</option>");
  //             $('input[name="nmsubprog"]').append("<option value='"+ element.nmsubprog +"'>"+ element.nmsubprog +"</option>");
  //           });
  //         },
  //         error       : function(data){

  //         }
  //       });
  //     });
  //   });
  </script>
	</body>
</html>