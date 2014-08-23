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
  			<center><h3>Selamat Datang di Portal Anda</h3></left></center>
  			<a href="<?php echo base_url();?>c_login/logout" style="color:black; font-size:16px; text-align:center; font-family:Helvetica">Logout</a>
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
						    </ul>
    					</aside>
						<input type="hidden" id="idpegawai" value="<?php echo $id; ?>">
    					<section class="main-section">
    						<div class="row" id="container_input_gaji">
    							<div class="large-12 columns">
									<center><h2>Gaji Pegawai</h2></center>
									    <div class="row">
									       	<div class="large-6 columns">
									           	<label for="from">Dari Tanggal</label>
									          	<input type="text" id="from" name="from">
									     	</div>
									      	<div class="large-6 columns">
										        <label for="to">Sampai Tanggal</label>
										        <input type="text" id="to" name="to">
									     	</div>
									    </div>
									    <div>
									      	<a href="#" class="small-offset-11 label" id="detil">Detail Gaji</a>
									    </div>
    							</div>
    						</div>

    						<div class="row">
							    <div class="large-12 medium-9 columns panel">
							      <h2 id="tables" style="text-align:center;">Detail Gaji</h2><br><br>
							        <center>
							          	<table id="gajipeg">
								            <thead>
								              <tr>
								              	<th>No</th>
								                <th>Nama</th>
								                <th>Kelas</th>
								                <th>Keterangan</th>
								                <th>Tanggal Hadir</th>
								                <th>Honor Tiap Pertemuan</th>
								              </tr>
								            </thead>
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
  	<script>
  		$(document).ready(function(){
  			$("#to, #from").change(function() {
  				var id 		= $("#idpegawai").val();
  				var dr_tgl 	= $("#from").val();
  				var ke_tgl 	= $("#to").val();
  				var nomor	= 1;
  				var total_gaji = 0;
  				$.ajax({
	  				type 		: "GET",
	  				url         : 'json_gaji/' + id + '/' + dr_tgl + '/' + ke_tgl,
	           		dataType    : 'json',
	          		contentType : 'application/json; charset=utf-8',
	          		success		: function(data){
	          			$.each(data, function(index,element){
	          				var keterangan = element.nama === data[0].nama ? "Hadir" : "Pengganti"; 
	          				$("#gajipeg").last().append($("<tr>")
	          					.append("<td>" + nomor + "</td>")
	          					.append("<td>" + element.nama + "</td>")
	          					.append("<td>" + element.nmsubprog + "</td>")
	          					.append("<td>" + keterangan + "</td>")
	          					.append("<td>" + element.tanggal + "</td>")
	          					.append("<td style='text-align:right'>" + element.honor + "</td>")
	          					);
	          				total_gaji += parseInt(element.honor);
	          				nomor++;
	          			});
	          			$("#gajipeg").last().append($("<tr>")
	          				.append("<td colspan='5'><b>Total Honor</b></td>")
	          				.append("<td id='tot' style='text-align:right'><b>" + total_gaji + "</b></td>")
	          				);
	          			// var total = $("#tot").formatCurrency().text();
	          			// $("#tot").text(total.replace("$", "Rp. "));
	          		},
	          		error 		: function(data){

	          		}
	  			});
  			});
  		});
  	</script>
</body>