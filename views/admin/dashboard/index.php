<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>

<?php
    require_once('views/admin/header.php'); 
?>

<?php
    require_once('views/admin/content_layouts.php'); 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Add Content -->
	<!-- Content Header (Page header)-->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid-->
	</section>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Tòa <i class="fa fa-building" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_building();?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Phòng <i class="fa fa-home" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_room()?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Chỗ trống <i class="fa fa-cube" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_slot()?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Sinh viên đang ở <i class="fa fa-users" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_student_still_lives()?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Nhân viên <i class="fa fa-users" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_employee()?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Quản lý <i class="fa fa-user" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_manager()?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Sinh viên trả phòng <i class="fa fa-calendar-times-o" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5><?php echo get_total_student_outs()?></h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-cube" style="padding-top: 5px; text-align: center; font-size: 30px;height: 42px; width: 42px; color: white; background-color:#6fb3e0; border-radius:100%; box-shadow: 1px 1px 0 rgba(0,0,0,.2)"></i></h5>
                    <div class="card-body">
                        <h5></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </session>
</div>
<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/dashboard/index.js"></script>

</body>

</html>