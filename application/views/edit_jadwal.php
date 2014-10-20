<?php 
  // echo "<pre>";
  // print_r($queryjadwal->result_array());exit; 
?>
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
    foreach ($queryjadwal->result_array() as $row){
      echo form_open('c_jadwal/edit');
        echo '<center><h3>Perbarui Jadwal</h3></center>
          
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>'.form_hidden('idjadwal',$row['idjadwal']).'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>'.form_input('tanggal',$row['tanggal'], 'id="datepicker"').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Jam</td>
                  '.form_hidden('jam',$row['jam']);
                    $dropdown_jam = array(
                      "-" => "- Pilih Jam -",
                      "06.00" => "Jam 06.00",
                      "06.30" => "Jam 06.30",
                      "07.00" => "Jam 07.00",
                      "07.30" => "Jam 07.30",
                      "08.00" => "Jam 08.00",
                      "08.30" => "Jam 08.30",
                      "09.00" => "Jam 09.00",
                      "09.30" => "Jam 09.30",
                      "10.00" => "Jam 10.00",
                      "10.30" => "Jam 10.30",
                      "11.00" => "Jam 11.00",
                      "11.30" => "Jam 11.30",
                      "13.00" => "Jam 13.00",
                      "13.30" => "Jam 13.30",
                      "14.00" => "Jam 14.00",
                      "14.30" => "Jam 14.30",
                      "15.00" => "Jam 15.00",
                      "15.30" => "Jam 15.30",
                      "16.00" => "Jam 16.00",
                      "16.30" => "Jam 16.30",
                    );
                    echo '<td width="150" height="25">'.form_dropdown('jam', $dropdown_jam, $row['jam']).'
                  </td>'.'
              </tr>
            </div>
          </div><br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Nama Ruang</td>
                <td>:</td>
                <td>';
                  $pilihsub = array();
                  $pilihan['-'] = "- Pilih nama ruang -";
                  foreach ($ruang_tersedia->result_array() as $isi) {
                    $pilihan[$isi['idruang']] = $isi['namaruang'];
                  }
                  echo form_dropdown('namaruang', $pilihan, $row['idruang']);
                  echo '
                </td>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Sub Program</td>
                <td>:</td>  
                <td>';
                  $pilihsub = array();
                  $pilihsub['-'] = "- Pilih Subprogram -";
                  foreach ($dropdown_subprog->result_array() as $isisub) {
                    $pilihsub[$isisub['idsubprog']] = $isisub['nmsubprog'];
                  }
                  echo form_dropdown('nmsubprog', $pilihsub, $row['idsubprog']);
                  echo '
                </td>
              </tr>
            </div>
          </div>
          <br/>
        <label>
          <input type="submit" value="Save" class="button radius expand">
        </label>
        <label>
          <a href='.base_url().'c_jadwal/disp class="button radius expand">Back</a>
        </label>';
        echo form_close();
        }
      ?>
      </div>
      </div>

		<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.abide.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
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
          minDate: '-15'
        }
      );
    });
  </script>

  <script>
    $(document).ready(function(){
      $('select[name="jam"], input[name="tanggal"]').change(function() {
        $.ajax({
          type        : 'GET',
          url         : '../json_ruang_tersedia/' +  $('select[name="jam"]').val() + '/' + $('input[name="tanggal"]').val() , 
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data){
            $("select[name='namaruang'] option").next().remove();
            $.each(data, function(index, element) {
              $('select[name="namaruang"]').append("<option value='"+ element.idruang +"'>"+ element.namaruang +"</option>");
            });
          },
          error       : function(data){

          }
        });
      });
    });
  </script>
	</body>
</html>