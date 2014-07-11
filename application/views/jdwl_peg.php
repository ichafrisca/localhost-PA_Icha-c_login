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
    <div class="large-12 medium-9 columns panel">
      <h2 id="tables" style="text-align:center;">Jadwal Seluruh Pegawai</h2>
      <div class="row">
        <div class="small-6 columns">
          <a href="<?php echo base_url();?>c_jadwal/form_tambah" data-dropdown="drop1" class="button dropdown">Tambah</a><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown">
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah">Tambah Jadwal</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_program">Tambah Program</a></li>
              <li><a href="<?php echo base_url();?>c_jadwal/form_tambah_subprog">Tambah Subprogram</a></li>
            </ul>
        </div>
      </div>
        <center>
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Jam</th>
                <th>Periode Tanggal</th>
                <th>Jumlah Slot</th>
                <th>Nama Ruang</th>
                <th>Nama Subprogram</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($queryjadwal->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idjadwal']."</td>";
                    echo "<td>".$rows['jam']."</td>";
                    echo "<td>".$rows['periode_tgl']."</td>";
                    echo "<td>".$rows['slot']."</td>";
                    echo "<td>".$rows['namaruang']."</td>";
                    echo "<td>".$rows['nmsubprog']."</td>";
                    echo "<td>".anchor('c_jadwal/form_update_jadwal/'.$rows['idjadwal'],'Edit')."</td>";
                    
                    $i++;
                  echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
          </center>
          <?php echo $pagination; ?>
    </div>
  </div>

		<!-- javascript foundation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/development-bundle/themes/smoothness/jquery-ui.css">
    <script src="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">   
  	<script type="text/javascript">
  		$(document).foundation();
  	</script>
    <script>
      $(function() {
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          height:140,
          modal: true,
          buttons: {
            "Delete all items": function() {
              $( this ).dialog( "close" );
            },
            Cancel: function() {
              $( this ).dialog( "close" );
            }
          }
        });
      });
    </script>
	</body>
</html>