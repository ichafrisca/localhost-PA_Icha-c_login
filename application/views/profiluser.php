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
    									echo form_open ('edit_profil');
    									echo'<table border="100px" align="center">
	    										<tbody>
	    											<tr>
	    												<td width="550">
				    										<table>
				    											<tr>
				    												<th colspan="8">
				    													<font>Data Pegawai</font>
				    												</th>
				    											</tr>
																<tr>
																	<td width="200">1. Nama</td>
																	<td>:</td>
																	<td colspan="5" align="left"><?php echo base_url?></td>
																</tr>
																<tr>
																	<td>2. Alamat</td>
																	<td>:</td>
																	<td>Jl. Anggrek 19 Tulungrejo Pare Kediri Jawa Timur</td>
																</tr>
																<tr>
																	<td>3. Tempat Tanggal Lahir</td>
																	<td>:</td>
																	<td>Kediri, 01-12-1992</td>
																</tr>
																<tr>
																	<td>4. Nomor Telp</td>
																	<td>:</td>
																	<td></td>
																</tr>
																<tr>
																	<td>5. Username</td>
																	<td>:</td>
																	<td></td>
																</tr>
																<tr>
																	<td>6. Password</td>
																	<td>:</td>
																	<td></td>
																</tr>
																<tr>
																	<td>7. Status Pegawai</td>
																	<td>:</td>
																	<td>Tutor</td>
																</tr>
																<tr>
																	<td>
																		<input type="submit" value="Edit Profil" class="button radius" style="position:center;">
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</tbody>
											</table>';										
										form_close();
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