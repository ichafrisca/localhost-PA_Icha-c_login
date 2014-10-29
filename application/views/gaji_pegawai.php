<html>
  <head>
    <title>Gaji Pegawai</title>
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
    <div class="large-12 medium-9 columns panel">
      <h2 id="tables" style="text-align:center;">Gaji Pegawai</h2><br><br>
      <div class="row">
        <div class="small-12 columns">
          <div class="button-bar">
            <ul class="button-group">
              <li><a href="<?php echo base_url();?>c_gaji/memiliki" class="button radius">Tambah Nominal</a></li>
              <li><a href="<?php echo base_url();?>c_gaji/memiliki1" class="button radius">Lihat Nominal</a></li>
              <li><a href="<?php echo base_url();?>c_gaji/form_tambah" class="button radius">Tambah Gaji</a></li>
            </ul>
            <div class="small-5 columns">
              <?php echo form_open("c_gaji/sms_gaji"); ?>
                <input type="submit" class="button radius" value="Kirim Pemberitahuan" />
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
        <center>
          <table style="width:100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Dari Tanggal</th>
                <th>Ke Tanggal</th>
                <th>jumlah Pertemuan</th>
                <th>Bonus</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php echo '<tr>';
                $i=1;
                  foreach($querygaji->result_array() as $rows) {
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['idpeg']."</td>";
                    echo "<td>".$rows['nama']."</td>";
                    echo "<td>".$rows['dr_tgl']."</td>";
                    echo "<td>".$rows['ke_tgl']."</td>";
                    echo "<td>".$rows['jml_pertemuan']."</td>";
                    echo "<td>".$rows['bonus']."</td>";
                    echo "<td>".$rows['totalgaji']."</td>";
                    echo "<td>".anchor('c_gaji/detail_gaji/'.$rows['idpeg'].'/'.$rows['dr_tgl'].'/'.$rows['ke_tgl'],'Detail')." |
                                      ".anchor('c_gaji/hapusgaji/'.$rows['idgaji'],'Hapus', array('class'=>'delete'))."</td>";
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
    
    <script type="text/javascript">
      $(document).foundation();
    </script>

    <script>
      $(document).ready(function(){
        $('.delete').click(function(){
            var answer = confirm('Hapus data nominal?');
                        // jQuery(this).attr('title') gets anchor title attribute
            return answer; // answer is a boolean
            }); 
    }); 
    </script>
  </body>
</html>