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
  			<a href="<?php echo base_url().'utama'?>"><img src="<?php echo base_url();?>assets/slider home/logo elfast.png" style="width:380px; height:120; margin-top:40px; margin-bottom:40px;"/></a>
  			<center><h3>
				<?php 
	 			   	$session_id = $this->session->userdata('nama_pengguna');
				   	echo "Selamat Datang ".$session_id;
				?>
  			</h3></center>
  			</a>
		</div>

		<!-- BODY -->
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
								<h1 class="title">Detail Gaji Pegawai</h1>
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
						        <li><a href="<?php echo base_url();?>c_login/logout">Logout</a></li>
						    </ul>
    					</aside>
						
    					<section class="main-section">
    						<div class="row">
							    <div class="large-12 medium-9 columns panel">

									<?php if ($kesediaan == "ADA") { ?>
										<h2 id="tables" style="text-align:center;">Detail Gaji</h2><br><br>
							        		<table id="gajipeg" style="width:100%;">
								        		<thead>
								            		<tr>
								                		<th>Nama</th>
								                		<th>Kelas</th>
								                		<th>Keterangan</th>
								                		<th>Tanggal Hadir</th>
								                		<th>Honor Tiap Pertemuan</th>
								            		</tr>
								        		</thead>
								        	<?php
								        		$totalGaji = 0;
								        			foreach ($detailgaji as $row) { 
								        	?>
								        	<tr>
								        		<td><?php echo $row['nama']; ?></td>
								        		<td><?php echo $row['kelas']; ?></td>
								        		<td><?php echo $row['pengganti'] == "0" ? "Hadir" : "Pengganti"; ?></td>
								        		<td><?php echo $row['tanggal']; ?></td>
								        		<td><?php echo $row['honor']; ?></td>
								        	</tr>
								        <?php 
								        	$totalGaji += $row['honor'];
								        	} 
								        ?>
								        <tr>
								        	<td><b>Total Honor</b></td>
								        	<td></td>
								        	<td></td>
								        	<td></td>
								        	<td><b><?php echo $totalGaji; ?></b></td>
								        </tr>
								        <tr>
								        	<td><b>Bonus</b></td>
								        	<td></td>
								        	<td></td>
								        	<td></td>
								        	<td><b><?php echo $data_bonus[0]['bonus']; ?></b></td>
								        </tr>
								        <tr>
								        	<td><b>Total Gaji</b></td>
								        	<td></td>
								        	<td></td>
								        	<td></td>
								        	<td><b><?php echo $data_bonus[0]['bonus'] + $totalGaji; ?></b></td>
								        </tr>
							        </table>

									<?php } else {?>
										<center><h4><?php echo $kesediaan; ?></h4></center>
									<?php } ?>
									<center>
										<h1><a href="<?php echo base_url()?>utama/gajipegawai" id="kembali">Back</a></h1>
									</center>
							    </div>
							</div>
    					</section>
    					<a class="exit-off-canvas"></a>
					</div>
			  	</div>
			</div>
		</div>
	
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.formatCurrency-1.4.0.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4.custom/development-bundle/themes/smoothness/jquery-ui.css">
	<script src="<?php echo base_url(); ?>assets/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
		$(document).foundation()
	</script>
	<script>
	    $(function() {
	      $( "#from" ).datepicker({
	        dateFormat:'yy-mm-dd', 
	        showAnim: 'slideDown',
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 2,
	        onClose: function( selectedDate ) {
	          $( "#to" ).datepicker( "option", "minDate", selectedDate );
	        }
	      });
	      $( "#to" ).datepicker({
	        dateFormat:'yy-mm-dd', 
	        showAnim: 'slideDown',
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 2,
	        onClose: function( selectedDate ) {
	          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
	        }
	      });
	    });
  	</script>
</body>