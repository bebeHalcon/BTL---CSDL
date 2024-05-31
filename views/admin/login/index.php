<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập - Quản lý Ký túc xá ĐHQG-HCM</title>

	<link href="/assets/img/logo.png" rel="icon">

	<!-- Google Font: Source Sans Pro-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
	<!-- Font Awesome-->
	<link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap-->
	<link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style-->
	<link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>
<body class="bg-light">
<div class="container-flex">
	<div class="navbar bg-primary p-4 "></div>
	<div class="header row p-3 h-auto bg-white">
		<div class="col-sm-2 logo d-flex justify-content-center">
		<img src="http://svktx.vnuhcm.edu.vn:8010/assets/img/logo.png" alt="LOGO">
		</div>
		<div class="col-sm-8 d-flex justify-content-center">
			<h2 class="text-primary" style="font-family: 'Times New Roman', serif;">HỆ THỐNG QUẢN LÝ KÝ TÚC XÁ ĐẠI HỌC QUỐC GIA</h2>
		</div>
	</div>
	<div class="d-flex justify-content-center p-5">
		<div class="login-box">
			<!-- /.login-logo-->
			<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg"> Đăng nhập vào hệ thống </p>
				<?php
					if (isset($err))
					{
						echo '<p class="login-box-msg" style="color: red">' . $err . '</p>';
						unset($err);
					}
				?>
				<form action="index.php?page=admin&controller=login&action=check" method="post">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Tài khoản" name="username">
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-user"></span></div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input class="form-control" type="password" placeholder="Mật khẩu" name="password">
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-lock"></span></div>
						</div>
					</div>
					<div class="row">
						<div class="col-7"></div>
						<!-- /.col-->
						<div class="col-5">
							<button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>
						</div>
						<!-- /.col-->
					</div>
				</form>
			</div>
			<!-- /.login-card-body-->
			<!-- /.login-box-->
			<!-- jQuery-->
			<script src="public/plugins/jquery/jquery.min.js"></script>
			<!-- Bootstrap 4-->
			<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- AdminLTE App-->
			<script src="public/dist/js/adminlte.min.js"></script>
		</div>
	</div>
	</div>
</body>
</html>