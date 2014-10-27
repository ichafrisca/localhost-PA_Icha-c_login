<html>
	<head>
		<title>Kepegawaian ELFAST</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>

<body >		   
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
  		<h2 id="tables" style="text-align:center;">Data Kotak Masuk</h2><br>
      <div class="panel" id="panel_pesan">
        <div class="row">
          <div class="large-12 medium-9 columns">
            <table id="tabel_sms" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Telepon</th>
                  <th>Isi Pesan</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  foreach ($inbox->result_array() as $rows) {
                    $keterangan = $rows['Processed'] == "true" ? "Sudah di proses" : "Belum di proses";
                    echo '<tr>';
                    echo "<td>".$i."</td>";
                    echo "<td>".$rows['SenderNumber']."</td>";
                    echo "<td>".$rows['TextDecoded']."</td>";
                    echo "<td>".$rows['ReceivingDateTime']."</td>";
                    echo "<td>". $keterangan ."</td>";
                    echo '</tr>';
                    $i++;
                  }
                ?>
              </tbody>
            </table>
            </div>
            </div>
            <?php echo $pagination; ?>
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
  
  <script type="text/javascript">
    $(document).foundation();
  </script>

  <script>
    var updateProses = function(idInbox) {
      $.ajax({
        type        : 'POST',
        url         : 'c_update_sms_salah',
        data        : {id: idInbox},
        success     : function(data) {
          console.log("update progres ID: " + idInbox);
        },
        error       : function(data) {
          alert('Gagal perbarui progress kotak masuk.');
        }
      });
    };

    var kirimPesanSalah = function(nomorTujuan) {
      $.ajax({
        type        : 'POST',
        url         : 'c_sms_salah',
        data        : {nomor: nomorTujuan},
        success     : function(data) {
          console.log('Kirim sms peringatan ke nomor: ' + nomorTujuan);
        },
        error       : function(data) {
          alert('Gagal mengirim pesan peringatan kesalahan format sms.');
        }
      });
    };

     var kirimPesanBenar = function(nomorTujuan) {
      $.ajax({
        type        : 'POST',
        url         : 'c_sms_benar',
        data        : {nomor: nomorTujuan},
        success     : function(data) {
          console.log('Kirim sms peringatan ke nomor: ' + nomorTujuan);
        },
        error       : function(data) {
          alert('Gagal mengirim pesan peringatan kesalahan format sms.');
        }
      });
    };

    var prosesSmsSalah = function(idInbox, nomor) {
      updateProses(idInbox);
      kirimPesanSalah(nomor);
    };

    var prosesSmsBenar = function(idInbox, nomor) {
      updateProses(idInbox);
      kirimPesanBenar(nomor);
    };

    var insertToKesediaan = function(statusSedia, idPeg, idJadwal, nomor) {
      $.ajax({
        type        : 'POST',
        url         : 'insert_kesediaan',
        data        : {'status': statusSedia, 'idpegawai': idPeg, 'idjadwal': idJadwal, 'nomor': nomor},
        success     : function(data) {
          console.log('Berhasil insert ke kesediaan');
        },
        error       : function(data) {
          alert('Gagal insert ke kesediaan.');
        }
      });
    };

    $(document).ready(function(){

      // jalankan ajax pada interval sekian detik
      setInterval(function() {
        // AJAX SMS SALAH
        $.ajax({
          type        : 'GET',
          url         : 'jsoninbox',
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data){
            //jika ada sms yang belum di proses
            if (data.length >= 1) {
              $.each(data, function(index, element) {
                prosesSmsSalah(element.ID, element.SenderNumber);
              });
            } else {
              console.log("Tidak ada sms di inbox yang belum di proses.");
            }
          },
          error       : function(data){
            alert("Salah :" + data);
          }
        });

        // AJAX SMS BENAR
        $.ajax({
          type        : 'GET',
          url         : 'jsoninboxbenar',
          dataType    : 'json',
          contentType : 'application/json; charset=utf-8',
          success     : function(data){
            var totalSmsMasuk = 0;

            // format sms ganti yang benar
            var SMS_GANTI_PATTERN = /^GANTI#YA#PEG+(\d{4})+#JAD+(\d{2})$/;
            // var SMS_IZIN_PATTERN = /^IZIN#PEG+(\d{4})+#+([a-zA-Z0-9 ])+#/;

            //jika ada sms yang belum di proses
            $.each(data, function(index, element) {
              
              // cek jika sms belum di proses/balas
              if (element.Processed == "false") {
                // tambah 1 setiap ada sms yang bernilai false
                totalSmsMasuk++;

                // cek jika sms masuk sesuai dengan format sms
                if (SMS_GANTI_PATTERN.test(element.TextDecoded)) {

                  // pecah sms berdasar delimiter #
                  var sms = element.TextDecoded.split('#');

                  // insert ke tabel kesediaan
                  insertToKesediaan(sms[1], sms[2], sms[3], element.SenderNumber);

                  //kirim respon dari sistem ke pengguna
                  prosesSmsBenar(element.ID, element.SenderNumber);
                  
                } else {

                  // kirim respon jika sms tidak sesuai format yang benar
                  prosesSmsSalah(element.ID, element.SenderNumber);
                }

              } else {
                console.log("Tidak ada sms di inbox yang belum di proses.");    
              }  
            });


            // alert waktu ada sms masuk
            if (totalSmsMasuk > 0) {
              alert(totalSmsMasuk + " sms diterima.");
            }
          },
          error       : function(data){
            alert("Salah :" + data);
          }
        });

      }, 1000 * 1); // 1000 = 1 detik
      
    });
  </script>
  
	</body>
</html>