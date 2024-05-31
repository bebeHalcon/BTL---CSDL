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


<!-- Code -->
<div class="content-wrapper">
	<!-- Add Content -->
	<!-- Content Header (Page header)-->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Quản lý Liên hệ khách hàng</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Quản lý Liên hệ khách hàng</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid-->
	</section>
	<!-- Main content-->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<!-- Button trigger modal-->
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">Thêm mới</button>
							<!-- Modal-->
							<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Thêm mới</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=add" enctype="multipart/form-data" method="post">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Họ và tên lót</label>
															<input class="form-control" type="text" placeholder="Họ và tên lót" name="fname" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Tên</label>
															<input class="form-control" type="text" placeholder="Tên" name="lname" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Tuổi</label>
															<input class="form-control" type="number" placeholder="Tuổi" name="age" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Giới tính:</label>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="1" />
																		<label>Nam</label>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="0" />
																		<label>Nữ</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label>Số điện thoại</label>
													<input class="form-control" type="number" placeholder="Số điện thoại" name="phone" />
												</div>

												<div class="form-group">
													<label>Email</label>
													<input class="form-control" type="text" placeholder="Email" name="email" />
												</div>

												<div class="form-group">
													<label>Mật khẩu</label>
													<input class="form-control" type="password" placeholder="Mật khẩu" name="password" />
												</div>
												<div class="form-group">
													<label>Hình ảnh</label>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
												</div>

											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Thêm mới</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<table class="table table-bordered table-striped" id="tab-user">
								<thead>
									<tr class="text-center">
										<th>STT</th>
										<th>Họ và tên lót</th>
										<th>Tên</th>
										<th>Giới tính</th>
										<th>Tuổi</th>
										<th>Số điện thoại</th>
										<th>Email</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$index = 1;
									foreach ($user as $user) {
										echo "<tr class='text-center' style='height:300px; line-height:300px; white-space: nowrap;'>";
										echo "<td>" . $index++ . "</td>";
										echo "<td>" . $user->fname . "</td>";
										echo "<td>" . $user->lname . "</td>";
										echo "<td>" . (($user->gender == 1) ? "Nam" : "Nữ") . "</td>";
										echo "<td>" . $user->age . "</td>";
										echo "<td>" . $user->phone . "</td>";
										echo "<td>" . $user->email . "</td>";
										echo "<td>
											<btn data-toggle='tooltip' data-placement='top' title='Chỉnh sửa' class='btn-edit btn btn-primary btn-xs' style='margin-right: 5px' data-email='$user->email' data-fname='$user->fname' data-lname='$user->lname' data-gender='$user->gender' data-age='$user->age' data-phone='$user->phone' data-img='$user->profile_photo'> <i class='fas fa-edit'></i></btn>
											<btn data-toggle='tooltip' data-placement='top' title='Đổi mật khẩu' class='btn-changepass btn btn-warning btn-xs' style='margin-right: 5px' data-email='$user->email'> <i class='fas fa-lock'></i></btn>
											<btn data-toggle='tooltip' data-placement='top' title='Xóa tài khoản' class='btn-delete btn btn-danger btn-xs' style='margin-right: 5px' data-email='$user->email' data-img='$user->profile_photo'> <i class='fas fa-trash'></i></btn>
											</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>

							<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Chỉnh sửa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=editInfo" enctype="multipart/form-data" method="post">
											<div class="modal-body">
												<input type="hidden" name="email">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Họ và tên lót</label>
															<input class="form-control" type="text" placeholder="Họ và tên lót" name="fname" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Tên</label>
															<input class="form-control" type="text" placeholder="Tên" name="lname" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Tuổi</label>
															<input class="form-control" type="number" placeholder="Tuổi" name="age" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Giới tính:</label>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="1" id="Nam" />
																		<label>Nam</label>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="0" id="Nu" />
																		<label>Nữ</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label>Số điện thoại</label>
													<input class="form-control" type="number" placeholder="Số điện thoại" name="phone" />
												</div>
												<div class="form-group">
													<label>Hình ảnh hiện tại </label>
													<input class="form-control" type="text" name="img" readonly />
												</div>
												<div class="form-group">
													<label>Hình ảnh mới</label>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Cập nhật</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="EditPassModal" tabindex="-1" role="dialog" aria-labelledby="EditPassModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Chỉnh sửa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=editPass" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" />
												<div class="form-group">
													<label>Email</label>
													<input class="form-control" type="text" placeholder="Email" name="email" readonly />
												</div>

												<div class="form-group">
													<label> Password hiện tại</label>
													<input class="form-control" type="password" placeholder="Please enter your new password" name="current-password" />
												</div>

												<div class="form-group">
													<label>Password mới</label>
													<input class="form-control" type="password" placeholder="Please enter your new password" name="new-password" />
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Cập nhật</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content bg-danger">
										<div class="modal-header">
											<h5 class="modal-title">Xóa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=delete" method="post">
											<div class="modal-body">
												<input type="hidden" name="email" />
												<input type="hidden" name="img" />
												<p>Bạn chắc chưa ?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-danger btn-outline-light" type="submit">Xác nhận</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
</div>


<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/user/index.js"></script>
</body>

</html>