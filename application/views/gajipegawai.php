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
								<h1 class="title">Gaji Pegawai</h1>
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
						<input type="hidden" id="idpegawai" value="<?php echo $id; ?>">
    					<section class="main-section">
    						<div class="row" id="container_input_gaji">
    							<?php
    							echo form_open('utama/detail_gaji_pegawai');
    							echo '
    							<div class="large-12 columns">
    								<br><br><br>
									    <div class="row">
									       	<div class="large-6 columns">
									       		<label for="to">Pilih Bulan</label>
												<select name="bulan_gaji">
													<option value="-">- Pilih Bulan -</option>
													<option value="12-11|01-09">Januari</option>
													<option value="01-11|02-09">Februari</option>
													<option value="02-11|03-09">Maret</option>
													<option value="03-11|04-09">April</option>
													<option value="04-11|05-09">Mei</option>
													<option value="05-11|06-09">Juni</option>
													<option value="06-11|07-09">Juli</option>
													<option value="07-11|08-09">Agustus</option>
													<option value="08-11|09-09">September</option>
													<option value="09-11|10-09">Oktober</option>
													<option value="10-11|11-09">Nopember</option>
													<option value="11-11|12-09">Desember</option>
												</select>
									     	</div>
									      	<div class="large-6 columns">
										        <label for="to">Pilih Tahun</label>';
								                    $opsi_tahun = array("-" => "- Pilih Tahun-");
								                    $tahun_awal = 1980;
								                    for ($i = 0; $i < 500; $i++) {
								                    	$opsi_tahun[$tahun_awal + $i] = $tahun_awal + $i;
								                    }

								                    echo '<td width="150" height="25">'.form_dropdown('TAHUN_GAJI', $opsi_tahun,'required').'</td>
									     	</div>
									    </div>
									<label>
								        <input type="submit" value="Cari" class="button">
								    </label>
    							</div>
    						</div>
    					</section>';
    					echo form_close();
    					?>
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