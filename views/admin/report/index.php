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
	require_once('controllers/admin/report_controller.php');
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
					<h1>Báo cáo - Thống kê</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Báo cáo - Thống kê</li>
					</ol>
				</div>
				<div class="modal fade" id="CalculateExpensesForBuildingMonth"  aria-labelledby="CalculateExpensesForBuildingMonth" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Tổng hóa đơn của tòa nhà theo tháng</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<form id="form-add-student" action="#" enctype="multipart/form-data" method="post">
								<div class="modal-body">
									<div class="row">
										<div  class="col-6"><label>Tên tòa nhà</label><select class="form-control" type="text" name="Bname" <?php if(isset($_POST['Bname'])) echo "placeholder='".$_POST['Bname']."'" ?> required>
											<?php
												foreach ($buildings as $building) {
													echo "<option value=\"$building->Name\">$building->Name</option>";
												}
											?>
										</select></div>
									</div>
									<div class="row">
										<div  class="col-6"><label>Tháng</label><input class="form-control" type="number" min="1" max="12" name="month" id="monthInput" <?php if(isset($_POST['month'])) echo "placeholder='".$_POST['month']."'" ?> required /></div>
									</div>
									<div class="row">
										<div class="col-6">
											<label>Tổng tiền</label>
											<?php
												if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Bname']) && isset($_POST["month"])) {
													$Bname = $_POST['Bname'];
													$month = $_POST['month'];
													echo "<p>".ReportController::CalculateExpensesForBuildingMonth($month, $Bname)."</p>";
												}
												?>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
									<button class="btn btn-primary" type="submit">Tính</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="FindStudentsInMonth"  aria-labelledby="FindStudentsInMonth" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Danh sách sinh viên sinh cùng tháng</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<form id="form-add-student" action="#" enctype="multipart/form-data" method="post">
								<div class="modal-body">
									<div class="row">
										<div  class="col-6"><label>Tháng</label><input class="form-control" type="number" min="1" max="12" name="monthStudent" id="monthStudentInput" <?php if(isset($_POST['monthStudent'])) echo "placeholder='".$_POST['monthStudent']."'" ?> required /></div>
									</div>
									<div class="row">
										<div class="col-12">
											<label>Kết quả</label>
											<?php
												if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['monthStudent'])) {
													$monthStudent = $_POST['monthStudent'];
													$result = ReportController::FindStudentsInMonth($monthStudent);
													echo '
													<h5>Tháng '.$monthStudent.'</h5>
													<table class="table table-bordered table-striped" id="tab-student">
													<thead>
														<tr class="text-center">
															<th><div>STT</div></th>
															<th><div>CCCD</div></th>
															<th><div>Họ và tên</div></th>
															<th><div>Ngày sinh</div></th>
														</tr>
													</thead>
													<tbody>
													';
													$index = 1;
													foreach ($result as $member) {
														echo 
															"<tr class=\"text-center\">
																<td>"
																	.$index. 
																"</td>
																<td>
																	".$member["Student_ID"]."
																</td>
																<td>
																	".$member["Name"]."
																</td>
																<td>
																	".$member["DOB"]."
																</td>
														</tr>";
														$index++;
													}
													echo '    </tbody>
													</table>';
												}
												?>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
									<button class="btn btn-primary" type="submit">Tính</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="PrintStudentListByDatein"  aria-labelledby="PrintStudentListByDatein" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Danh sách sinh viên cùng phòng (theo thứ tự ngày nhận phòng)</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<form id="form-add-student" action="#" enctype="multipart/form-data" method="post">
								<div class="modal-body">
									<div class="row">
										<div  class="col-6"><label>Mã số phòng</label><select class="form-control" type="text" name="Room_ID" <?php if(isset($_POST['Room_ID'])) echo "placeholder='".$_POST['Room_ID']."'" ?> required>
											<?php
												foreach ($rooms as $room) {
													echo "<option value=\"$room->Room_ID\">$room->Room_ID</option>";
												}
											?>
										</select></div>
									</div>
									<div class="row">
										<div class="col-12">
											<label>Kết quả</label>
											<?php
												if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Room_ID'])) {
													$Room_ID = $_POST['Room_ID'];
													$result = ReportController::PrintStudentListByDatein($Room_ID);
													echo '
													<h5>Phòng '.$Room_ID.'</h5>
													<table class="table table-bordered table-striped" id="tab-student">
													<thead>
														<tr class="text-center">
															<th><div>STT</div></th>
															<th><div>CCCD</div></th>
															<th><div>Ảnh</div></th>
															<th><div>Họ và tên lót</div></th>
															<th><div>Tên</div></th>
															<th><div>Ngày nhận phòng</div></th>
														</tr>
													</thead>
													<tbody>
													';
													$index = 1;
													foreach ($result as $member) {
														echo 
															"<tr class=\"text-center\">
																<td>"
																	.$index. 
																"</td>
																<td>
																	".$member["CCCD_number"]."
																</td>
																<td>
																<img class=\"profile-picture\" src=\"".$member["Avatar"]."\" width=\"57\" height=\"72\">
																</td>  
																<td>
																	".$member["Lname"]."
																</td> 
																<td>
																	".$member["Fname"]."
																</td>
																<td>
																	".$member["Date_in"]."
																</td>
														</tr>";
														$index++;
													}
													echo '    </tbody>
													</table>';
												}
												?>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
									<button class="btn btn-primary" type="submit">Tính</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="PrintGeneralInfo"  aria-labelledby="PrintGeneralInfo" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Thông tin chung về tòa nhà</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<form id="form-add-student" action="#" enctype="multipart/form-data" method="post">
								<div class="modal-body">
									<div class="row">
										<div  class="col-6"><label>Tên tòa nhà</label><select class="form-control" type="text" name="BnameGeneral" <?php if(isset($_POST['BnameGeneral'])) echo "placeholder='".$_POST['BnameGeneral']."'" ?> required>
											<?php
												foreach ($buildings as $building) {
													echo "<option value=\"$building->Name\">$building->Name</option>";
												}
											?>
										</select></div>
									</div>
									<div class="row">
										<div class="col-12">
											<label>Kết quả</label>
											<?php
												if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BnameGeneral'])) {
													$BnameGeneral = $_POST['BnameGeneral'];
													$result = ReportController::PrintGeneralInfo($BnameGeneral);
													echo '
													<table class="table table-bordered table-striped" id="tab-student">
													<thead>
														<tr class="text-center">
															<th><div>STT</div></th>
															<th><div>Phòng</div></th>
															<th><div>Tòa</div></th>
															<th><div>Số sinh viên đang ở</div></th>
															<th><div>Tuổi trung bình</div></th>
														</tr>
													</thead>
													<tbody>
													';
													$index = 1;
													foreach ($result as $member) {
														echo 
															"<tr class=\"text-center\">
																<td>"
																	.$index. 
																"</td>
																<td>
																	".$member["Room_ID"]."
																</td>
																<td>
																	".$member["Bname"]."
																</td>
																<td>
																	".$member["StudentCount"]."
																</td> 
																<td>
																	".$member["AvgAge"]."
																</td>
														</tr>";
														$index++;
													}
													echo '</tbody>
													</table>';
												}
												?>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
									<button class="btn btn-primary" type="submit">Tính</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped" id="tab-user">
					<thead>
						<tr class="text-center">
							<th style="width:20px;">STT</th>
							<th>Thống kê</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Danh sách sinh viên cùng phòng (theo thứ tự ngày nhận phòng)</td>
							<td><button class="ml-3 btn btn-primary" id="PrintStudentListByDatein" type="button" data-toggle="modal" data-target="#PrintStudentListByDatein">Xuất</button></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Thông tin chung về tòa nhà</td>
							<td><button class="ml-3 btn btn-primary" id="PrintGeneralInfo" type="button" data-toggle="modal" data-target="#PrintGeneralInfo">Xuất</button></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Tổng hóa đơn của tòa nhà theo tháng</td>
							<td><button class="ml-3 btn btn-primary" id="CalculateExpensesForBuildingMonth" type="button" data-toggle="modal" data-target="#CalculateExpensesForBuildingMonth">Xuất</button></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Danh sách sinh viên sinh cùng tháng</td>
							<td><button class="ml-3 btn btn-primary" id="FindStudentsInMonth" type="button" data-toggle="modal" data-target="#FindStudentsInMonth">Xuất</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.container-fluid-->
	</section>
	<!-- Main content-->
	<section class="content">

    </section>
</div>
<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/report/index.js"></script>
<script>
	$(document).ready(function(){
		<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Bname']) && isset($_POST["month"])) {
			echo '$("#CalculateExpensesForBuildingMonth").modal("show");';
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['monthStudent'])) {
			echo '$("#FindStudentsInMonth").modal("show");';
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Room_ID'])) {
			echo '$("#PrintStudentListByDatein").modal("show");';
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BnameGeneral'])) {
			echo '$("#PrintGeneralInfo").modal("show");';
		}
		?>
	});
</script>
<script>
    document.getElementById('monthInput').addEventListener('input', function() {
        validateInput(this);
    });
    document.getElementById('monthStudentInput').addEventListener('input', function() {
        validateInput(this);
    });
    function validateInput(inputElement) {
        var inputValue = inputElement.value;
        if (inputValue > 12) {
            inputElement.value = 12;
        }
    }
</script>
</body>

</html>