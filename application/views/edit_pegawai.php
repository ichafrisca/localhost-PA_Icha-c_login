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
        		<li><a href="<?php echo base_url()?>c_dtpegawai/disp">Data Pegawai</a></li>
        	<li class="divider"></li>

    <!-- MENU JADWAL PEGAWAI -->
        	<li class="has-dropdown">
              <a href="<?php echo base_url()?>c_jadwal/disp">Jadwal Pegawai</a>
            <ul class="dropdown">
              <li class="has-dropdown">
                <a href="<?php echo base_url()?>c_grammar/disp">Grammar</a>
              <ul class="dropdown">
                  <li><a href="#">Jadwal Tetap</a></li>
                  <li><a href="#">Holiday Program</a></li>
              </ul>
          </li>

      <!-- SPEAKING PROGRAM -->
        <!-- DURASI 2 MINGGU -->
          <li class="has-dropdown">
            <a href="<?php echo base_url()?>c_speaking/disp">Speaking</a>
              <ul class="dropdown">
                <li class="divider"></li>
                  <li><label>Durasi 2 Minggu</label></li>
                    <li><a href="#">Elementary Stage</a></li>
                    <li><a href="#">Talk More</a></li>
                    <li><a href="#">English Corner</a></li>
                    <li><a href="#">Confidence</a></li>
                    <li><a href="#">Grammar for Speaking</a></li>
                    <li><a href="#">Academic Speaking</a></li>
                    <li><a href="#">Ear Waves</a></li>
                    <li><a href="#">Ear Waves</a></li>

            <!-- DURASI 1 MINGGU -->
            <li class="divider"></li>
              <li><label>Durasi 1 Minggu</label></li>
                <li><a href="#">The Workshop - Job Interview</a></li>
                <li><a href="#">The workshop - Psyco-Test</a></li>

            <!-- DURASI 1 BULAN -->
            <li class="divider"></li>
                <li><label>Durasi 1 Bulan</label></li>
                  <li><a href="#">Dynamic Speaking</a></li>
                  <li><a href="#">Speaking Therapy</a></li>
            </ul>
          </li>

        <!-- PRONUNCIATION PROGRAM -->
          <li class="has-dropdown">
            <a href="<?php echo base_url()?>c_pronun/disp">Pronunciation</a>
            <ul class="dropdown">
              <li class="divider"></li>
                <li><label>Durasi 2 Minggu</label></li>
                  <li><a href="#">Pronunciation Stage 1</a></li>
                  <li><a href="#">Pronunciation Stage 2</a></li>
            </ul>
          </li>

        <!-- VOCABULARY PROGRAM -->
          <li class="has-dropdown">
            <a href="<?php echo base_url()?>c_vocab/disp">Vocabulary</a>
            <ul class="dropdown">
              <li class="divider"></li>
                <li><label>Durasi 2 Minggu</label></li>
                  <li><a href="#">Vocabulary 1</a></li>
                  <li><a href="#">Vocabulary 2</a></li>
            </ul>
          </li>

      <!-- TOEFL PROGRAM-->
          <li class="has-dropdown">
              <a href="<?php echo base_url()?>c_toefl/disp">TOEFL</a>
            <ul class="dropdown">
              <li class="divider"></li>
                <li><label>Durasi 2 Minggu</label></li>
                  <li><a href="#">Basic Program 1 Exercise</a></li>
                  <li><a href="#">Basic Program 2 Exercise</a></li>
                  <li><a href="#">Pre TOEFL (IBT)</a></li>
                  <li><a href="#">IELTS</a></li>
                  <li><a href="#">TOEFL (IBT)</a></li>
              <li class="divider"></li>
                <li><label>Durasi 1 Bulan</label></li>
                  <li><a href="#">Pre TOEFL (ITP)</a></li>
                  <li><a href="#">TOEFL (ITP)</a></li>
            </ul>
          </li>

    <!-- PAKET PROGRAM-->
            <li class="has-dropdown">
              <a href="<?php echo base_url()?>c_efast/disp">E-fast & Scoring TOEFL</a>
            <ul class="dropdown">
              <li class="divider"></li>
                <li><label>Durasi 2 Minggu</label></li>
                  <li><a href="#">E-fast 3</a></li>
              <li class="divider"></li>
                <li><label>Durasi 1 Bulan</label></li>
                  <li><a href="#">E-fast 1</a></li>
                  <li><a href="#">E-fast 2</a></li>            
                  <li><a href="#">E-fast 4</a></li>
            </ul>
            </li>

      <!-- PEGAWAI OFFICE SHIFT PAGI -->
            <li><a href="<?php echo base_url()?>c_ofpagi/disp">Office Shift Pagi</a></li>
            <li><a href="<?php echo base_url()?>c_ofsiang/disp">Office Shift Siang</a></li>
          </ul>
        </li>

	<!-- MENU PRESENSI-->

        	<li class="divider"></li>
        	<li class="has-dropdown">
            <a href="<?php echo base_url()?>c_absen/disp">Presensi Pegawai</a>
          <ul class="dropdown">
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>
       
      </ul>
 
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <li class="has-dropdown">
          <a href="#">Main Item 4</a>
          <ul class="dropdown">
            <li><label>Section Name</label></li>
            <li class="has-dropdown">
              <a href="#" class="">Has Dropdown, Level 1</a>
              <ul class="dropdown">
                <li><a href="#">Dropdown Options</a></li>
                <li><a href="#">Dropdown Options</a></li>
                <li class="has-dropdown">
                  <a href="#">Has Dropdown, Level 2</a>
                  <ul class="dropdown test">
                    <li><a href="#">Subdropdown Option</a></li>
                    <li><a href="#">Subdropdown Option</a></li>
                    <li><a href="#">Subdropdown Option</a></li>
                  </ul>
                </li>
                <li><a href="#">Subdropdown Option</a></li>
                <li><a href="#">Subdropdown Option</a></li>
                <li><a href="#">Subdropdown Option</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><label>Section Name</label></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>
        <li class="divider"></li>
        <li><a href="#">Main Item 5</a></li>
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
    foreach ($query->result_array() as $row){
      echo form_open('c_dtpegawai/edit');
        echo '<center><h3>Edit Pegawai</h3></center>
        
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>ID Pegawai</td>
                <td>:</td>
                <td>'.form_input('IDPEG',$row['idpeg'],'readonly').'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
               <tr>
                <td>Nama</td>
                <td>:</td>
                <td>'.form_input('NAMA',$row['nama']).'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>'.form_textarea('ALAMAT',$row['alamat']).'</td>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-4 columns">
              <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>'.form_input('TMPT_LAHIR',$row['tmpt_lahir']).'</td>
              </tr>
            </div>
            <div class="large-4 columns">
              <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>'.form_input('TGL_LAHIR',$row['tgl_lahir']).'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>No Telepon</td>
                <td>:</td>
                <td>'.form_input('NO_TELP',$row['no_telp']).'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Status</td>
                  '.form_hidden('STATUS',$row['status']);
                    $opsi=array("- Status -","admin"=>"Admin", "tutor"=>"Tutor", "office"=>"Office");
                    echo '<td width="150" height="25">:'.form_dropdown('STATUS',$opsi).'</td>'.'
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Status Kepegawaian</td>
                  '.form_hidden('STAT_PEG',$row['stat_peg']);
                    $opsi=array("- Status Kepegawaian -","Aktif"=>"Aktif", "Tidak Aktif"=>"Tidak Aktif");
                    echo '<td width="150" height="25">:'.form_dropdown('STAT_PEG',$opsi).'</td>'.'
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>'.form_input('USERNAME',$row['username']).'</td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Password</td>
                <small>required</small>
                <td>:</td>
                <td>'.form_input('PASSWORD',$row['password'],'required pattern="[a-zA-Z 0-9]+"').'</td>
              </tr>
            </div>
          </div>

        <label>
          <input type="submit" value="Save" class="button radius expand">
        </label>
        <label>
          <input type="submit" value="Back" class="button radius expand">
          <a href="<?php echo base_url()?>c_dtpegawai/disp"></a>
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
	<script type="text/javascript">
		$(document).foundation();
	</script>
	</body>
</html>