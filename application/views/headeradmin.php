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
              <li class="has-dropdown">
                <a href="<?php echo base_url()?>c_grammar/disp">Grammar</a>
                  <ul class="dropdown">
                    <li><a href="#">Jadwal Tetap</a></li>
                    <li><a href="#">Holiday Program</a></li>
                  </ul>
              </li>

              <!-- SPEAKING PROGRAM -->
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
    <div class="large-12 medium-9 columns panel">
      <h2 id="tables" style="text-align:center;">Data Pegawai</h2>
      <div class="row">
        <div class="small-6 columns">
          <a href="<?php echo base_url();?>c_dtpegawai/form_tambah" class="button radius">Tambah Pegawai</a>
        </div>
      </div>
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Pegawai</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No. telp</th>
                <th>Status</th>
                <th>Status Pegawai</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($query->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idpeg']."</td>";
                    echo "<td>".$rows['nama']."</td>";
                    echo "<td>".$rows['alamat']."</td>";
                    echo "<td>".$rows['tmpt_lahir']."</td>";
                    echo "<td>".$rows['tgl_lahir']."</td>";
                    echo "<td>".$rows['no_telp']."</td>";
                    echo "<td>".$rows['status']."</td>";
                    echo "<td>".$rows['stat_peg']."</td>";
                    echo "<td>".$rows['username']."</td>";
                    echo "<td>".$rows['password']."</td>";
                    echo "<td>".anchor('c_dtpegawai/form_update_pegawai/'.$rows['idpeg'],'update')."</td>";
                    
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
          <?php echo $pagination; ?>
    </div>
  </div>
		<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
	<script type="text/javascript">
		$(document).foundation();
	</script>
	</body>
</html>