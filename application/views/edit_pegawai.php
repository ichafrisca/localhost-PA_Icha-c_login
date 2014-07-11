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
                    $opsi=array("- Status -","Admin"=>"Admin", "Tutor"=>"Tutor", "Office"=>"Office");
                    echo '<td width="150" height="25">:'.form_dropdown('STATUS', $opsi, $row['status']).'</td>'.'
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
                    echo '<td width="150" height="25">:'.form_dropdown('STAT_PEG', $opsi, $row['stat_peg']).'</td>'.'
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
          <a href="<?php echo base_url()?>c_dtpegawai/page"></a>
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