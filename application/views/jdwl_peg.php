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
            <a href="#" class="">Vocabulary</a>
            <ul class="dropdown">
              <li class="divider"></li>
                <li><label>Durasi 2 Minggu</label></li>
                  <li><a href="#">Vocabulary 1</a></li>
                  <li><a href="#">Vocabulary 2</a></li>
            </ul>
          </li>

    	<!-- TOEFL PROGRAM-->
          <li class="has-dropdown">
            	<a href="#" class="">TOEFL</a>
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
            	<a href="#" class="">E-fast & Scoring TOEFL</a>
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
          	<li><a href="#">Office Shift Pagi</a></li>
          	<li><a href="#">Office Shift Siang</a></li>
          </ul>
        </li>

	<!-- MENU PRESENSI-->

        	<li class="divider"></li>
        	<li class="has-dropdown">
          <a href="#">Presensi Pegawai</a>
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
    <div class="large-12 medium-9 columns panel">
      <h2 id="tables" style="text-align:center;">Jadwal Pegawai</h2>
      <div class="row">
      <br><br>
        <!-- <div class="small-6 columns">
          <a href="<?php echo base_url();?>c_jadwal/form_tambah" class="button radius">Buat Jadwal</a>
        </div> -->
      </div>
        <center>
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Jam</th>
                <th>Tanggal</th>
                <th>Nama Ruang</th>
                <th>Sub Program</th>
                <th>Durasi</th>
                <th>Nama Program</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($queryjadwal->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idjadwal']."</td>";
                    echo "<td>".$rows['jam']."</td>";
                    echo "<td>".$rows['tanggal']."</td>";
                    echo "<td>".$rows['namaruang']."</td>";
                    echo "<td>".$rows['nmsubprog']."</td>";
                    echo "<td>".$rows['durasi']."</td>";
                    echo "<td>".$rows['nmprogram']."</td>";
                    // echo "<td>".anchor('c_dtpegawai/form_update_pegawai/'.$rows['idjadwal'],'update', array('class' => 'button'))."</td>";
                    
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
          </center>
          <div class="pagination-centered">
            <ul class="pagination" >
              <li class="arrow unavailable"><a href="<?php echo base_url()?>c_jadwal/disp">&laquo;</a></li>
              <li class="current"><a href="<?php echo base_url()?>c_jadwal/disp">1</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/disp">2</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/disp">3</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/disp">4</a></li>
              <li class="unavailable"><a href="<?php echo base_url()?>c_jadwal/disp">&hellip;</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/disp">12</a></li>
              <li><a href="<?php echo base_url()?>c_jadwal/disp">13</a></li>
              <li class="arrow"><a href="<?php echo base_url()?>c_jadwal/disp">&raquo;</a></li>
            </ul>
          </div>
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