<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
	
	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon--> 
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon--> 
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
	
	<!-- Styles -->
    <link href="<?php echo e(base_url('assets/fontAwesome/css/fontawesome-all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/lib/themify-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/lib/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/lib/nixon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/style.css')); ?>" rel="stylesheet">
</head>

<body class="bg-primary">

	<div class="Nixon-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="login-logo">
							<a href="index.html"><span>Foodmin</span></a>
						</div>
						<div class="login-form">
							<h4>Administratior Login</h4>

                        
                        <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

							<form action="<?php echo e(site_url('sistem/login/login_process')); ?>" method="post">
								<div class="form-group">
									<label>Email address</label>
									<input type="username" name="username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox"> Remember Me
									</label>
									<label class="pull-right">
										<a href="page-reset-password.html">Forgotten Password?</a>
									</label>
									
								</div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
								<div class="register-link m-t-15 text-center">
									<p>Don't have account ? <a href="<?php echo e(site_url('sistem/register')); ?>"> Sign Up Here</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>