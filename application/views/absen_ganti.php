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
      <center><h3>Form Pengganti</h3></center>
        <br><br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal Kesediaan</td>
                <td>:</td>
                <td><input type="text" name="tgl_sedia" id="datepicker"></td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <tr>
                <td>Jam Masuk</td>
                <td>:</td>
                <td>
                  <select id="jam_awal">
                    <option value="-"> - Pilih Jam Awal - </option>
                    <option value="06.00">Pukul 06:00</option>
                    <option value="07.00">Pukul 07:00</option>
                    <option value="08.00">Pukul 08:00</option>
                    <option value="09.00">Pukul 09:00</option>
                    <option value="10.00">Pukul 10:00</option>
                    <option value="11.00">Pukul 11:00</option>
                    <option value="12.00">Pukul 13:00</option>
                    <option value="13.00">Pukul 14:00</option>
                    <option value="14.00">Pukul 15:00</option>
                    <option value="15.00">Pukul 16:00</option>
                  </select>
                </td>
              </tr>
            </div>
            <div class="large-6 columns">
              <tr>
                <td>Jam Selesai</td>
                <td>:</td>
                <td>
                  <select id="jam_akhir">
                    <option value="-"> - Pilih Jam Akhir - </option>
                    <option value="07.30">Pukul 07:30</option>
                    <option value="08.30">Pukul 08:30</option>
                    <option value="09.30">Pukul 09:30</option>
                    <option value="10.30">Pukul 10:30</option>
                    <option value="11.30">Pukul 11:30</option>
                    <option value="13.30">Pukul 13:30</option>
                    <option value="14.30">Pukul 14:30</option>
                    <option value="15.30">Pukul 15:30</option>
                    <option value="16.30">Pukul 16:30</option>
                    <option value="17.30">Pukul 17:30</option>
                  </select>
                </td>
              </tr>
            </div>
          </div>
          <div class="panel">
            <?php echo form_open('c_absen/sms_pengganti'); ?>
              <table id="detailnya" style="width : 100%">
                <thead>
                  <tr>
                    <th>ID Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Tanggal Absen</th>
                    <th>Jam</th>
                    <th>Nama Subprogram</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  </tr>
                </tbody>
              </table>
              <label>
                <input type="submit" value="Kirim" class="button radius expand">
              </label>            
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
  </div>
		<!-- javascript foundation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.reveal.js"></script>
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
      $(document).ready(function() {
        $("#jam_akhir").change(function(){
          $("#detailnya").hide();
          var pilihtgl = $("#datepicker").val();
          var jammasuk = $("#jam_awal").val();
          var jamselesai = $("#jam_akhir").val();
          var alamat = 'json_ganti_absen/' + pilihtgl + '/' + jammasuk + '/' + jamselesai;
          $.ajax({
            type        : 'GET',
            url         : alamat, 
            dataType    : 'json',
            contentType : 'application/json; charset=utf-8',
            success     : function(data){
              if(data != null){
                if (jammasuk != "-" || jamselesai != "-") {
                  $("#detailnya").show();
                  $("tr").next().remove();
                  $.each(data, function(index,element){
                    $("#detailnya").last().append($("<tr>")
                      .append("<input type='hidden' name='telp"+ index +"' value='" +  element.no_telp + "'>")
                      .append("<input type='hidden' name='tanggal' value='" +  element.tgl_absen + "'>")
                      .append("<input type='hidden' name='idsubprog' value='" +  element.idsubprog + "'>")
                      .append("<input type='hidden' name='jumlahdata' value='" +  data.length + "'>")
                      .append("<input type='hidden' name='jam_pgt' value='" +  jammasuk + "'>")
                      .append("<input type='hidden' name='idjadwal' value='" +  element.idjadwal + "'>")
                      .append("<td>"+ element.idpeg +"</td>")
                      .append("<td>"+ element.nama +"</td>")
                      .append("<td>"+ element.tgl_absen +"</td>")
                      .append("<td>"+ element.jam +"</td>")
                      .append("<td>"+ element.idjadwal +"</td>")
                    );
                  });
                }
              }else{
                $("#detailnya").hide();
              }
            },
            error       : function(data){
              alert("Pilih tanggal terlebih dulu ");
            }
          });
        });
      });
    </script>

    <script>
      $( "#datepicker" ).datepicker(
        {
          changeMonth: 'true',
          changeYear: 'true',
          dateFormat:'yy-mm-dd', 
          showAnim: 'slideDown',
          minDate: +1
      });
    </script>
    <script>
      <?php 
        if ($notif != null) {
          echo $notif;
        }
       ?>
    </script>
	</body>
</html>