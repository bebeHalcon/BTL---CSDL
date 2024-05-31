<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user"])) {
	header("Location: index.php?page=admin&controller=login&action=index");
}
?>
<?php
require_once('views/admin/header.php'); ?>

<!-- Add CSS -->


<?php
require_once('views/admin/content_layouts.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-8">
					<i class="nav-icon fa fa-home d-inline"></i>
					<h1 class="d-inline">Trang chủ</h1>
				</div>
				<div class="col-sm-4">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active"></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="invoice p-3 mb-3">
				<div class="row invoice-info">
					<div class="col-sm-6 invoice-col">
						<ul style="list-style: none;">
							<li>
								<a href="index.php?page=admin&controller=user&action=index" > 
									<i class="fas fa-tachometer-alt"></i>
									Dashboard
								</a>
							</li>
							<li>
								<a href="index.php?page=admin&controller=employee&action=index" > 
									<i class="fas fa-users"></i>
									Nhân viên
								</a>
							</li>
							<li>
								<a href="index.php?page=admin&controller=rooms&action=index" > 
									<i class="fas fa-home"></i>
									Khu/Nhà/Phòng
								</a>
							</li>
						</ul>
					</div>
					<!-- /.col -->
					<div class="col-sm-6 invoice-col">
						<ul style="list-style: none;">
							<li>
								<a href="index.php?page=admin&controller=news&action=index">
									<i class="fa fa-calendar"></i>
									Thông báo
								</a>
							</li>
							
							<li>
								<a href="index.php?page=admin&controller=bill&action=index">
									<i class="fa fa-book"></i>
									Hóa đơn
								</a>
							</li>
							<li>
								<a href="index.php?page=admin&controller=report&action=index" > 
									<i class="fas fa-bar-chart"></i>
									Báo cáo - Thống kê
								</a>
							</li>
						</ul>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->


</body>

</html>