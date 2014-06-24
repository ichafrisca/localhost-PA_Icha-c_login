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
			echo form_open('C_login/login');
			echo '<fieldset>
				<legend style="font-size:20px; text-align:center;">Form Login</legend>
				<label>Username
					<input type="text" name="user" placeholder="Input Username"/>
				</label>
				<label>Password
					<input type="password" name="pass" placeholder="Input Password"/>
				</label>
				<label>
					<input type="submit" value="Login" class="button radius expand">
				</label>
			</fieldset>';
			form_close();
		?>

		<!-- <?php if($this->session->flashdata('message') != null) { ?> -->
		<small class="error">
			<?php echo $this->session->flashdata('message'); ?>
		</small>
		<!-- <?php } ?> -->
		

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