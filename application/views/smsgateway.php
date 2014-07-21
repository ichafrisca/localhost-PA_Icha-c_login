<html>
	<head>
		<title>Kepegawaian ELFAST</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>

<body onload="getInboxSms(1);">		   
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
  		<center><h2>Data SMS Pegawai</h2></center><br/>
		    <div class="row">
	        <div class="small-10 columns">
	          <a href="#" class="button radius" id="button_sms">Buat SMS</a>
            <a href="#" class="button radius" id="button_pesan">Kotak Masuk</a>
	        </div>
        </div>
      <?php
      echo form_open('c_sms/sms');
        echo '
          <div class="panel" id="panel_sms">
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>No HP</td>
                <td>:</td>
                <td>'.form_input('no_tujuan').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
               <tr>
                <td>Tulis Pesan</td>
                <td>:</td>
                <td>'.form_textarea('isi_pesan').'</td>
              </tr>
            </div>
          </div><br/>
        
          <label>
            <input type="submit" value="Send" class="button radius expand">
          </label>
          </div>
          ';
        echo form_close();
      ?>

      <div class="panel" id="panel_pesan">
        <div class="row">
          <div class="large-12 medium-9 columns">
            <table id="tabel_sms" style="width:100%">
              <thead>
                <tr>
                  <th>No Telepon</th>
                  <th>Isi Pesan</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

            <!-- pagination -->
            <div>
              <ul class="pagination">
                <?php 
                  for ($i=1; $i <= $inbox_pagination; $i++) { 
                    if ($i == 1) {
                      echo "<li class='current' onclick='getInboxSms(".$i.")'><a href='#'>". $i ."</a></li>";      
                    } else {
                      echo "<li onclick='getInboxSms(".$i.")'><a href='#'>". $i ."</a></li>";
                    }
                  }
                ?>
              </ul>
            </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


	<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.abide.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css"> 
  
  <script type="text/javascript">
		$(document).foundation({
  </script>


  <!-- jQuery -->
  <script>
    $(document).ready(function() {
      $("#panel_sms").hide();
      $("#panel_pesan").hide();
      
      // toggle kirim sms
      $("#button_sms").click(function() {
        $("#panel_pesan").hide('slow');
        $("#panel_sms").slideToggle();
      });

      // toggle inbox sms
      $("#button_pesan").click(function() {
        $("#panel_sms").hide('slow');
        $("#panel_pesan").slideToggle();
      });

      $("li").click(function() {
        $("li").removeClass('current');
        $(this).addClass('current');
      });
    });

    function getInboxSms(page) {
      $.ajax({
        type        : 'GET',
        url         : 'inboxjson/' + page,
        dataType    : 'json',
        contentType : 'application/json; charset=utf-8',
        success     : function(data) {
          $("tbody").remove();
          $.each(data, function(index, element) {
            $("#tabel_sms").last().append($("<tr>")
              .append("<td>"+ element.SenderNumber +"</td>")
              .append("<td>"+ element.TextDecoded +"</td>"));
            console.log(element.SenderNumber + " " + element.TextDecoded);
          });
        },
        error       : function(data) {
          alert("Kesalahan: " + data);
        }
      });
    }
  </script>

	</body>
</html>