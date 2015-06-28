<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Vester - Administrator</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
                <?php
		echo plugin_css_asset ( "admin/bootstrap/css/bootstrap.min.css" );
		echo plugin_css_asset ( "admin/font-awesome/css/font-awesome.min.css" );
		
		echo css_asset ( "admin/main.css" );
		echo css_asset ( "admin/main-responsive.css" );
		echo plugin_css_asset ( "admin/iCheck/skins/all.css" );
		echo plugin_css_asset ( "admin/bootstrap-colorpalette/css/bootstrap-colorpalette.css" );
		echo plugin_css_asset ( "admin/perfect-scrollbar/src/perfect-scrollbar.css");
		echo css_asset ( "admin/theme_dark.css" );
		echo css_asset ( "admin/print.css", null, array ( "media" => "print") );
		
		?>
                
		<link rel="stylesheet" href="<?php echo other_asset_url( "fonts/style.css"); ?>">
                    
		<!--[if IE 7]>
		<?php
                echo plugin_css_asset ( "admin/font-awesome/css/font-awesome-ie7.min.css" );
                ?>
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example1">
		<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="logo">The <i class="clip-t-shirt" style="color: #A47441"></i> Vester
			</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3>Sign in to your account</h3>
				<p>
					Please enter your name and password to log in.
				</p>
				<form class="form-login" method="post">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="email" placeholder="email">
								<i class="fa fa-user"></i> </span>
							<!-- To mark the incorrectly filled input, you must add the class "error" to the input -->
							<!-- example: <input type="text" class="login error" name="login" value="Username" /> -->
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password">
								<i class="fa fa-lock"></i>
								<!--
								<a class="forgot" href="?box=forgot">
									I forgot my password
								</a>
								-->
								</span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								<input type="checkbox" class="grey remember" id="remember" name="remember">
								Keep me signed in
							</label>
							<button type="submit" class="btn btn-bricky pull-right">
								Login <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<!--
						<div class="new-account">
							Don't have an account yet?
							<a href="?box=register" class="register">
								Create an account
							</a>
						</div>
						-->
					</fieldset>
				</form>
			</div>
			<!-- end: LOGIN BOX -->
			<!-- start: FORGOT BOX -->
			<div class="box-forgot">
				<h3>Forget Password?</h3>
				<p>
					Enter your e-mail address below to reset your password.
				</p>
				<form class="form-forgot">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" placeholder="Email">
								<i class="fa fa-envelope"></i> </span>
						</div>
						<div class="form-actions">
							<a href="?box=login" class="btn btn-light-grey go-back">
								<i class="fa fa-circle-arrow-left"></i> Back
							</a>
							<button type="submit" class="btn btn-bricky pull-right">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: FORGOT BOX -->
			<!-- start: REGISTER BOX -->
			<div class="box-register">
				<h3>Sign Up</h3>
				<p>
					Enter your personal details below:
				</p>
				<form class="form-register">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<input type="text" class="form-control" name="full_name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="Address">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="city" placeholder="City">
						</div>
						<div class="form-group">
							<div>
								<label class="radio-inline">
									<input type="radio" class="grey" value="F" name="gender">
									Female
								</label>
								<label class="radio-inline">
									<input type="radio" class="grey" value="M" name="gender">
									Male
								</label>
							</div>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" placeholder="Email">
								<i class="fa fa-envelope"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" name="password_again" placeholder="Password Again">
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<div>
								<label for="agree" class="checkbox-inline">
									<input type="checkbox" class="grey agree" id="agree" name="agree">
									I agree to the Terms of Service and Privacy Policy
								</label>
							</div>
						</div>
						<div class="form-actions">
							<a href="?box=login" class="btn btn-light-grey go-back">
								<i class="fa fa-circle-arrow-left"></i> Back
							</a>
							<button type="submit" class="btn btn-bricky pull-right">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: REGISTER BOX -->
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2015 &copy; Vester by Mobic Co.,Ltd.
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<?php
		echo plugin_js_asset ( "admin/respond.min.js" );
		echo plugin_js_asset ( "admin/excanvas.min.js" );
		echo plugin_js_asset ( "admin/jQuery-lib/1.10.2/jquery.min.js" );
		?>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<?php
		echo plugin_js_asset ( "admin/jQuery-lib/2.0.3/jquery.min.js");
		?>
		<!--<![endif]-->
		
		<?php
		echo plugin_js_asset ( "admin/jquery-ui/jquery-ui-1.10.2.custom.min.js");
		echo plugin_js_asset ( "admin/bootstrap/js/bootstrap.min.js");
		echo plugin_js_asset ( "admin/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js");
		echo plugin_js_asset ( "admin/blockUI/jquery.blockUI.js");
		echo plugin_js_asset ( "admin/iCheck/jquery.icheck.min.js");
		echo plugin_js_asset ( "admin/perfect-scrollbar/src/jquery.mousewheel.js");
		echo plugin_js_asset ( "admin/perfect-scrollbar/src/perfect-scrollbar.js");
		echo plugin_js_asset ( "admin/less/less-1.5.0.min.js");
		echo plugin_js_asset ( "admin/jquery-cookie/jquery.cookie.js");
		echo plugin_js_asset ( "admin/bootstrap-colorpalette/js/bootstrap-colorpalette.js");
		echo js_asset ( "admin/main.js" );
		?>
		
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<?php
		echo plugin_js_asset ( "admin/jquery-validation/dist/jquery.validate.min.js");
		echo js_asset ( "admin/login.js" );
		?>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>