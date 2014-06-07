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
								<h1 class="title">Profil Pegawai</h1>
							</section>
						</nav>
						<aside class="left-off-canvas-menu">
      						<ul class="off-canvas-list">
						        <li><label>Menu</label></li>
						        <li><a href="<?php echo base_url().'utama'?>">Home</a></li>
						        <li><a href="<?php echo base_url().'utama/profil'?>">Profil</a></li>
						        <li><a href="#">Jadwal</a></li>
						        <li><a href="#">Presensi</a></li>
						    </ul>
    					</aside>

    					<section class="main-section">
    						<div class="row">
    							<div class="large-12 columns">
    								<br>
    								<br>
    								<?php
										foreach ($query->result_array() as $row)
											echo form_open('cmember/edit');
												echo '<h3>Edit Member</h3>
												<table>
													<form method="post">
														<tr>
															<td>ID Member</td>
															<td>:</td>
															<td>'.form_input('IDMEMBER',$row['ID_MEMBER'],'readonly').'</td>
														</tr>
														<tr>
															<td>Nama</td>
															<td>:</td>
															<td>'.form_input('NAMA',$row['NAMA']).'</td>
														</tr>										
														<tr>
															<td>Username</td>
															<td>:</td>
															<td>'.form_input('USERNAME',$row['USERNAME']).'</td>
														</tr>														
														<tr>
															<td>Nama</td>
															<td>:</td>
															<td>'.form_input('ALAMAT',$row['ALAMAT']).'</td>
														</tr>														
														<tr>
															<td>No. Telp</td>
															<td>:</td>
															<td>'.form_input('NO_TELP',$row['NO_TELP']).'</td>
														</tr>														
														<tr>
															<td>Email</td>
															<td>:</td>
															<td>'.form_input('EMAIL',$row['EMAIL']).'</td>
														</tr>										
													<td>'.form_submit('submit','update');'</td>';
											echo form_close();		
										?>
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
	<script>
		$(document).foundation()
	</script>
</body>