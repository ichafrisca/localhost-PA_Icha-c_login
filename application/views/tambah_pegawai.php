<html>
	<head>
		<title>Tambah Pegawai</title>
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
  <center><h2>Tambah Pegawai</h2></center>
    <?php
      echo form_open('c_dtpegawai/tambah');
    ?>
        <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>ID Pegawai</td>
                <td>:</td>
                <td> <?php echo form_input('idpeg',$newID,'readonly'); ?></td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
               <tr>
                <td>Nama</td>
                <td>:</td>
                <td> 
                  <input id="nama" type="text" name="nama" value="<?php echo set_value('nama'); ?>"/>
                </td>
              </tr>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <textarea id="alamat" rows="10" name="alamat"><?php echo set_value('alamat'); ?></textarea>
                </td>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td> 
                  <input id="tmpt_lahir" type="text" name="tmpt_lahir" value="<?php echo set_value('tmpt_lahir'); ?>"/>
                </td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                  <input id="datepicker" type="text" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>"/>
                  <?php 
                  //  $tanggal = array('name'=>'tgl_lahir','id'=>'datepicker');
                  //  echo form_input($tanggal);
                  //  echo set_value('tgl_lahir');
                  ?>
                </td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>No Telepon</td>
                <td>:</td>
                <td> 
                  <input id="no_telp" type="text" name="no_telp" value="<?php echo set_value('no_telp'); ?>"/>
                </td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Status Pegawai</td>
                <td>:</td>
                <select id="status" name="status">
                  <option value="-" <?php echo set_select('status', '-', TRUE); ?> >- Status Pegawai -</option>
                  <option value="Admin" <?php echo set_select('status', 'Admin'); ?> >Admin</option>
                  <option value="Tutor" <?php echo set_select('status', 'Tutor'); ?> >Tutor</option>
                  <option value="Office" <?php echo set_select('status', 'Office'); ?> >Office</option>
                </select>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Status</td>
                <td>:</td>
                <select id="stat_peg" name="stat_peg">
                  <option value="-" <?php echo set_select('stat_peg', '-', TRUE); ?> >- Status Kepegawaian -</option>
                  <option value="Aktif" <?php echo set_select('stat_peg', 'Aktif'); ?> >Aktif</option>
                  <option value="Nonaktif" <?php echo set_select('stat_peg', 'Nonaktif'); ?> >Nonaktif</option>
                </select>
              </tr>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Username</td>
                <td>:</td>
                <td> 
                  <input id="username" type="text" name="username" value="<?php echo set_value('username'); ?>"/>
                </td>
              </tr>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <tr>
                <td>Password</td>
                <td>:</td>
                <td> 
                  <input id="password" type="password" name="password" value="<?php echo set_value('password'); ?>"/>
                </td>
              </tr>
            </div>
          </div>

        <label>
          <input type="submit" value="Save" class="button radius expand">
        </label>
        <label>
          <a href="<?php echo base_url(); ?>c_dtpegawai/page" class="button radius expand">Back</a>
        </label>
        <?php echo form_close(); ?>
      <?php if (isset($error)) echo $error;?>
    </div>
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
          maxDate: 0
        }
      );
    });
  </script>
	</body>
</html>