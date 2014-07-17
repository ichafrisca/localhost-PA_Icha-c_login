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
								<h1 class="title">Presensi Pegawai</h1>
							</section>
						</nav>
						<aside class="left-off-canvas-menu">
      						<ul class="off-canvas-list">
						        <li><label>Menu</label></li>
						        <li><a href="<?php echo base_url().'utama'?>">Home</a></li>
						        <li><a href="<?php echo base_url().'utama/profil'?>">Profil</a></li>
						        <li><a href="<?php echo base_url().'utama/jadwal'?>">Jadwal</a></li>
						        <li><a href="<?php echo base_url().'utama/presensi'?>">Presensi</a></li>
						    </ul>
    					</aside>

    					<section class="main-section">
    						<div class="row" id="panel_absen">
    							<div class="large-12 columns">
    								<div class="panel">
    									Detail Sub Program: <br>
    									<select id="dropdown_detail">
    										<option value="kosong">- Pilih Detail Sub Program -</option>
    										<?php echo '<tr>';
							                	$i=1;
							                  	foreach($absen as $rows) {
							                  		echo "<option value='". $rows['nmsubprog'] ."'>". $rows['nmsubprog'] ."</option>";
							                  	}
							                ?>
    									</select>
										<div class="panel">
								          	<table id="detailnya" style="width : 100%">
									            <thead>
										            <tr>
										            	<th>Tanggal</th>
										            	<th>Jam</th>
										            	<th>Status Absen</th>
										            	<th>Nama Subprogram</th>
										            	<th>Nama Ruang</th>
										            </tr>
									            </thead>
									            <tbody>
									            	<tr>
									            	</tr>
									            </tbody>
								          	</table>
								      	<div>    	
							          <!-- </center> -->
							        </div>
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

	<!-- jQuery ajax -->
	<script>
    $(document).ready(function() {

    	$("#dropdown_detail").change(function() {
    		$("#detailnya").hide();
    		$.ajax({
	      		type		: 'GET',
	      		url 		: 'absenjson/' + this.value,
	      		dataType	: 'json',
	      		success		: function(data) {
	      			if(data != null) {
	      				$("#detailnya").show();
				      	$("tr").next().remove();
				      	$.each(data, function(index, element) {
				      		$("#detailnya").last().append($("<tr>")
				      			.append("<td>"+ element.tgl_absen +"</td>")
				      			.append("<td>"+ element.jam +"</td>")
				      			.append("<td>"+ element.status_absen +"</td>")
				   				.append("<td>"+ element.nmsubprog +"</td>")
				   				.append("<td>"+ element.namaruang +"</td>")
				      		);
				      	});	
				    } else {
				    	$("#detailnya").hide();
				    }
	      		},
	      		error		: function(data) {
	      			alert("Kesalahan: " + data);
	      		}
	      	});
    	});
    });
    </script>

</body>