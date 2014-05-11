<html>
<head>
	<title>Login</title>
	<link href="<?php echo base_url(); ?>assets/foundation/css/foundation.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/foundation/css/normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="row" style="margin-top:150px; ">
	<div class="small-2 large-4 columns"></div>
	<div class="small-4 large-4 large-offset-4 columns">
		<?php
			echo form_open('admin/adminlogin');
			echo '<fieldset>
				<legend style="font-size:20px; text-align:center;">Login Admin</legend>
				<label>Username
					'. form_input('user') .'
				</label>
				<label>Password
					'. form_password('pass') .'
				</label>
				<label>
					<input type="submit" value="Login" class="button radius expand">
				</label>
			</fieldset>';
			form_close();
		?>
	</div>
	<div class="small-6 large-4 columns "></div>
</div>

	<!-- javascript foundation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>  
	<script type="text/javascript">
		$(document).foundation();
	</script>
</body>
</html>