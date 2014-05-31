<html>
	<head>
		<title>Welcome</title>
		<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
	</head>
</html>
<body>
	<ul class="example-orbit" data-orbit>
  		<li>
    		<img src="../assets/slider home/b.jpg" alt="slide 1" />
    		<div class="orbit-caption"> </div>
  		</li>
  		<li class="active">
    		<img src="../assets/slider home/a.jpg" alt="slide 2" />
    		<div class="orbit-caption"> </div>
  		</li>
  		<li>
    	<img src="../assets/slider home/d.jpg" alt="slide 3" />
    		<div class="orbit-caption"> </div>
  		</li>
	</ul>

	<!-- Javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation/foundation.orbit.js"></script>  
	<script type="text/javascript">
		$(document).foundation();
	</script>
</body>