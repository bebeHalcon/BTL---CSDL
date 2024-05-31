</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar-->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links-->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button">
						<i class="fas fa-bars"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a class="nav-link" href="index.php?page=admin&controller=layouts&action=index">Home</a>
				</li>
			</ul>
			<h4 class="m-auto text-center text-primary" style="font-family: 'Times New Roman', serif">HỆ THỐNG QUẢN LÝ KÝ TÚC XÁ ĐẠI HỌC QUỐC GIA</h4>
			<!-- Right navbar links-->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search-->
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a class="nav-link" href="index.php?page=admin&controller=login&action=logout">Logout</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar-->
		<!-- Main Sidebar Container-->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo-->
			<!-- <a class="brand-link" href="index.php?page=admin&controller=layouts&action=index" style="margin-left:20px;">
				<h3>KMS<span style="color: #00BFFF;"> TECHNOLOGY</span>
			</a></h3> -->

			<a href="index.php?page=admin&controller=layouts&action=index" class="brand-link" >
				<img class="brand-image bg-white elevation-3" src="public/assets/img/logo.png" alt="KMS Logo" style="opacity: .8">
				<span class="brand-text font-weight-light" style="margin-left: 5px;"><strong>KTX</strong></span>
				<span class="brand-text font-weight-light" style="color: #00BFFF;"><strong>ĐHQG-HCM</strong></span>
			</a>
			<!-- Sidebar-->
			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<?php
					echo ('
							<div class="info" style="margin:auto;">
								<a href="#" class="d-block style="color:#000000;">
									Xin chào, 
						'
						. $_SESSION["user"] .
						' </a>
							</div>
						');

					?>
					
				</div>

				<!-- Sidebar Menu-->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Ky tuc xa -->
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=dashboard&action=index">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=student&action=index">
								<i class="nav-icon fas fa-users"></i>
								<p>Sinh viên</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=employee&action=index">
								<i class="nav-icon fas fa-users"></i>
								<p>Nhân viên</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=rooms&action=index">
								<i class="nav-icon fas fa-home"></i>
								<p>Khu/Nhà/Phòng</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=news&action=index">
								<i class="nav-icon fa fa-calendar"></i>
								<p>Thông báo</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=bill&action=index">
								<i class="nav-icon fa fa-book"></i>
								<p>Hóa đơn</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=report&action=index">
								<i class="nav-icon fas fa-bar-chart"></i>
								<p>Báo cáo - Thống kê</p>
							</a>
						</li>
					</ul>
					<!-- Content Wrapper. Contains page content-->
				</nav>
			</div>
		</aside>