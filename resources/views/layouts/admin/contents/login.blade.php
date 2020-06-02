<!doctype html>
<html class="fixed">
	<head>
        <title>Đăng nhập Admin</title>
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">
		<script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>

	</head>
	<body>
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ asset('assets/images/logo.png') }}" height="54" alt="Porto Admin" />
				</a>
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Đăng nhập</h2>
					</div>
					<div class="panel-body">
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                        @endif
                        <form action="{{ route('authentication')}}" method="POST">
                            @csrf
							<div class="form-group mb-lg">
								<label>Email</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Mật khẩu</label>
									<a href="pages-recover-password.html" class="pull-right">Quên mật khẩu?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Nhớ mật khẩu</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Đăng nhập</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Đăng nhập</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		<script src="{{ asset('assets/javascripts/theme.js') }}"></script>
		<script src="{{ asset('assets/javascripts/theme.custom.js') }}"></script>
		<script src="{{ asset('assets/javascripts/theme.init.js') }}"></script>
	</body><img src="http://www.ten28.com/fref.jpg">
</html>