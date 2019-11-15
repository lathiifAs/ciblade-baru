<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nixon : Widget</title>
	
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
    <link href="{{ base_url('assets/fontAwesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/css/lib/nixon.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/css/style.css') }}" rel="stylesheet">
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
							<h4>Register to Administration</h4>
							
							{{-- alert --}}
							@if (!empty($tipe))
								@if($tipe == 'Sukses')
								<div class="alert alert-success" style="margin-top: 20px">
									<label ><strong>{{ $tipe }},</strong> {{ $pesan }}</label>
								</div>
								@else
								<div class="alert alert-danger" style="margin-top: 20px">
									<label ><strong>{{ $tipe }},</strong> {{ $pesan }}</label>
								</div>
								@endif
							@endif

							<form>
								<div class="form-group">
									<label>User Name</label>
									<input type="email" class="form-control" placeholder="User Name">
								</div>
								<div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="Password">
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox"> Agree the terms and policy 
									</label>									
								</div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
								<div class="social-login-content">
									<div class="social-button">
										<button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Register with facebook</button>
										<button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Register with twitter</button>
									</div>
								</div>
								<div class="register-link m-t-15 text-center">
									<p>Already have account ? <a href="{{ site_url('sistem/login') }}"> Sign in</a></p>
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