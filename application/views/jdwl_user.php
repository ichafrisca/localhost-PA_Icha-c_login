<html>
	<head>
		<title>ELFAST English Course</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>
</html>
<body style="background-color:lightgrey;">
	<!-- HEADER -->
	<div class="column">
		<div class="small-9 small-centered columns" style="background-color:#C9A798; border-radius: 30px 30px 30px 30px; margin-top:20px; margin-bottom:20px;">
  			<a href="utama"><img src="<?php echo base_url();?>assets/slider home/logo elfast.png" style="width:380px; height:120; margin-top:40px; margin-bottom:40px;"/>
  			<center><h3>Selamat Datang di Portal Anda</h3></center>
  			</a>
		</div>
		
		<!-- BODY -->
		<border>
		<div class="row" style="margin-top:20px;">
			<div class="large-12 medium-8 columns">
				<div class="off-canvas-wrap docs-wrap" data-offcanvas>
					<div class="inner-wrap">
						<nav class="tab-bar">
							<section class="left-small">
								<a class="left-off-canvas-toggle menu-icon" href="#">
									<span>
									</span>
								</a>
							</section>
							<section class="right tab-bar-section">
								<h1 class="title">Jadwal</h1>
							</section>
						</nav>
						<aside class="left-off-canvas-menu">
      						<ul class="off-canvas-list">
						        <li><label>Menu</label></li>
						        <li><a href="<?php echo base_url().'utama'?>">Beranda</a></li>
						        <li><a href="<?php echo base_url().'utama/profil'?>">Profil</a></li>
						        <li><a href="<?php echo base_url().'utama/jadwal'?>">Jadwal</a></li>
						        <li><a href="<?php echo base_url().'utama/presensi'?>">Presensi</a></li>
						        <li><a href="<?php echo base_url().'utama/gajipegawai'?>">Gaji Pegawai</a></li>
						    </ul>
    					</aside>

    					<section class="main-section">
    						<div class="row">
    							<div class="large-12 columns">
    							<br><br>
    								<center>
							          	<table>
								            <thead>
									            <tr>
									            	<th>No</th>
									            	<th>Nama Pegawai</th>
									            	<th>Jam</th>
									            	<th>Periode Tanggal</th>
									            	<th>Jumlah Slot</th>
									            	<th>Nama Ruang</th>
									            	<th>Nama Subprogram</th>
									            </tr>
								            </thead>

							            <tbody>
							              	<?php echo '<tr>';
							                	$i=1;
							                  		foreach($queryjadwal as $rows) {
									                    echo "<td>".$i."</td>";
									                    echo "<td>".$rows['nama']."</td>";
									                    echo "<td>".$rows['jam']."</td>";
									                    echo "<td>".$rows['periode_tgl']."</td>";
									                    echo "<td>".$rows['slot']."</td>";
									                    echo "<td>".$rows['namaruang']."</td>";
									                    echo "<td>".$rows['nmsubprog']."</td>";
							                    $i++;
							                echo '</tr>';
							                }?>
							            </tbody>
							          </table>
							          </center>
    							</div>
    						</div>
    					</section>
    					<a class="exit-off-canvas"></a>
					</div>
			  	</div>
			</div>
		</div>
		</border>
		<div class="elfast-footer-bottom">
			<div class="row" style="margin-top:20px;">
				<div class="large-3 columns">&nbsp;</div>
	  			<div class="large-7 columns">
	  				<center><p class="copyright" style="font-size:11px;">Copyright © 2007 - 2014 ELFAST, English Course. All rights reserved.</p></center>
	  			</div>
				<div class="large-3 columns">&nbsp;</div>
			</div>
		</div>
	</div>

	<!-- Javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.offcanvas.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/development-bundle/themes/smoothness/jquery-ui.css">
  	<script src="<?php echo base_url(); ?>assets/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
  	<link rel="stylesheet" href="/resources/demos/style.css"> 
	<script>
		$(document).foundation()
	</script>
</body>