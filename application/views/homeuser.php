<html>
	<head>
		<title>Welcome</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>
</html>
<body>
	<div id="slides" style="position: relative; overflow: hidden; width:938px; height:344px; margin-left:225px; margin-top:30px;">
	<ul class="example-orbit" data-orbit>
  		<li>
  			<div class style="position: absolute; width:948px; height:344px;">
    		<img src="../assets/slider home/5.png" alt="slide 1" />
    		<div class="orbit-caption"> </div>
  		</li>
  		<li class="active">
  			<div class style="position: absolute; width:948px; height:344px;">
    		<img src="../assets/slider home/2.png" alt="slide 2" />
    		<div class="orbit-caption"> </div>
  		</li>
  		<li>
  			<div class style="width:950px; height:348px;">
    		<img src="../assets/slider home/4.png" alt="slide 3" />
    		<div class="orbit-caption"> </div>
  		</li>
	</ul>
	</div>
	</li>

	<!-- MENU -->
	<div class="off-canvas-wrap" data-offcanvas>
  		<div class="inner-wrap">
  			<!-- <div id="menu" style=" padding-right:210px; padding-left:225px; padding-top:40px; text-align:justify;"></div> -->
  			<nav class="tab-bar">
    			<section class="left-small">
    				<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      			</section>
      			<section class="middle tab-bar-section">
      				<h1 class="title">Home</h1>
				</section>
			</nav>
		<!-- <div id="menu1" style="padding-left:225px; padding-top:40px; text-align:justify;"></div> -->
		<aside class="left-off-canvas-menu">
      		<ul class="off-canvas-list">
        		<li><label>Menu</label></li>
        		<li><a href="#">Profil</a></li>
        		<li><a href="#">Jadwal</a></li>
        		<li><a href="#">Presensi</a></li>
      		</ul>
    	</aside>
    	<p>Elfast tidak hanya menawarkan sebuah sistem pembelajaran yang cepat dan tepat tetapi juga pada tingkat intermediate dan advance
     		memberikan sebuah wacana terhadap kesenjangan antara bahasa Inggris dan bahasa indonesia - mother language -
     		di dalam mengadaptasikan bahasa target (Inggris) dengan bahasa sumber (Indonesia), pada point inilah dibutuhkan sebuah perubahan 
     		mindset pelajar agar secara proporsional bisa membedakan karakter antara bahasa sumber dengan bahasa target tersebut.</p>
    	<section class="main-section">
    	</section>
	<a class="exit-off-canvas"></a>
  </div>
  </div>

	<!-- Javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.orbit.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.offcanvas.js"></script>
	<script>
		$(document).foundation();
	</script>
</body>