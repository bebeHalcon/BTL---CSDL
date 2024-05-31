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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách nhân viên</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div>
                        <button class="btn btn-secondary" type="button" id="showContent1">Toàn bộ nhân viên</button>
                        <button class="btn btn-info ml-2" type="button" id="showContent2">Các nhân viên thường</button>
                        </div>

                        <div>
                        <button class="btn btn-primary mt-3" id="addManagerButton" type="button" data-toggle="modal" data-target="#addManagerModal">Thêm Quản lý tòa mới</button>
                        <div class="modal fade" id="addManagerModal"  aria-labelledby="addManagerModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thêm Quản lý tòa mới</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form id="form-add-manager" action="index.php?page=admin&controller=employee&action=add" enctype="multipart/form-data" method="post">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label>Số CCCD</label>
                                                <input class="form-control" type="text" placeholder="CCCD" name="CCCD_number" />
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày cấp CCCD</label>
                                                <input class="form-control" type="date" placeholder="Họ và tên lót" name="CCCD_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>Họ và tên lót quản lý tòa</label>
                                                <input class="form-control" type="text" placeholder="Họ và tên lót" name="Lname" />
                                            </div>
                                            <div class="form-group">
                                                <label>Tên quản lý tòa</label>
                                                <input class="form-control" type="text" placeholder="Tên" name="Fname" />
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input class="form-control" type="date" placeholder="Ngày sinh" name="DOB" />
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select class="form-control" name="Sex">
                                                    <option value="M">Nam</option>
                                                    <option value="F">Nữ</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tôn giáo</label>
                                                <input class="form-control" type="text" placeholder="Tôn giáo" name="Religion" />
                                            </div>
                                            <div class="form-group">
                                                <label>Dân tộc</label>
                                                <input class="form-control" type="text" placeholder="Dân tộc" name="Ethnicity" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" placeholder="Email" name="Email" />
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" type="text" placeholder="Số điện thoại" name="Phone" />
                                            </div>
                                            <div class="form-group">
                                                <label>Quê quán</label>
                                                <input class="form-control" type="text" placeholder="Quê quán" name="Address" />
                                            </div>
                                            <div class="col-6"><label>Chọn tòa</label>
                                                <select class="form-control" type="text" name="Name" <?php if(isset($_POST['Name'])) echo "placeholder='".$_POST['Name']."'" ?> required>
                                                <?php
                                                    foreach ($buildings as $building) {
                                                        echo "<option value=\"$building->Name\">$building->Name</option>";
                                                    }
                                                ?>
                                                </select>
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

                        <button class="btn btn-primary mt-3 ml-2" id="addStaffButton" type="button" data-toggle="modal" data-target="#addStaffModal">Thêm nhân viên mới</button>
                        <div class="modal fade" id="addStaffModal"  aria-labelledby="addStaffModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thêm nhân viên mới</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form id="form-add-staff" action="index.php?page=admin&controller=employee&action=addStaff" enctype="multipart/form-data" method="post">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label>Số CCCD</label>
                                                <input class="form-control" type="text" placeholder="CCCD" name="CCCD_number" />
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày cấp CCCD</label>
                                                <input class="form-control" type="date" placeholder="Họ và tên lót" name="CCCD_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>Họ và tên lót nhân viên</label>
                                                <input class="form-control" type="text" placeholder="Họ và tên lót" name="Lname" />
                                            </div>
                                            <div class="form-group">
                                                <label>Tên nhân viên</label>
                                                <input class="form-control" type="text" placeholder="Tên" name="Fname" />
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input class="form-control" type="date" placeholder="Ngày sinh" name="DOB" />
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select class="form-control" name="Sex">
                                                    <option value="M">Nam</option>
                                                    <option value="F">Nữ</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tôn giáo</label>
                                                <input class="form-control" type="text" placeholder="Tôn giáo" name="Religion" />
                                            </div>
                                            <div class="form-group">
                                                <label>Dân tộc</label>
                                                <input class="form-control" type="text" placeholder="Dân tộc" name="Ethnicity" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" placeholder="Email" name="Email" />
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" type="text" placeholder="Số điện thoại" name="Phone" />
                                            </div>
                                            <div class="form-group">
                                                <label>Quê quán</label>
                                                <input class="form-control" type="text" placeholder="Quê quán" name="Address" />
                                            </div>
                                            <div class="form-group">
                                                <label>Công việc</label>
                                                <input class="form-control" type="text" placeholder="Công việc" name="Job" />
                                            </div>
                                            <div class="col-6"><label>Chọn tòa</label>
                                                <select class="form-control" type="text" name="Name" <?php if(isset($_POST['Name'])) echo "placeholder='".$_POST['Name']."'" ?> required>
                                                <?php
                                                    foreach ($buildings as $building) {
                                                        echo "<option value=\"$building->Name\">$building->Name</option>";
                                                    }
                                                ?>
                                                </select>
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
                        </div>

                        <div id="content1" class="mt-3">
                        <div class="row">
                            <table id="tab-employee-t" class="table table-bordered table-striped"> 
                                <thead>
                                    <tr  class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Số CCCD</th>
                                        <th scope="col">Ngày cấp</th>
                                        <th scope="col">Họ và tên lót</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Tôn giáo</th>
                                        <th scope="col">Dân tộc</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Quê quán</th>
                                        <th scope="col">Tòa phụ trách</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                        
                                        $index = 1;
                                        foreach ($employees as $employee) {
                                            echo 
                                            "<tr class=\"text-center\">
                                                <td>"
                                                    .$index. 
                                                "</td>
                                                <td>
                                                    ".$employee->CCCD_number."
                                                </td>
                                                <td>
                                                    ".$employee->CCCD_date."
                                                </td>   
                                                <td>
                                                    ".$employee->Lname."
                                                </td> 
                                                <td>
                                                    ".$employee->Fname."
                                                </td>
                                                <td>
                                                    ".$employee->DOB."
                                                </td>
                                                <td>
                                                    ".(($employee->Sex === 'M') ? 'Nam' : 'Nữ')."
                                                </td>   
                                                <td>
                                                    ".$employee->Religion."
                                                </td> 
                                                <td>
                                                    ".$employee->Ethnicity."
                                                </td>
                                                <td>
                                                    ".$employee->Email."
                                                </td>   
                                                <td>
                                                    ".$employee->Phone."
                                                </td> 
                                                <td>
                                                    ".$employee->Address."
                                                </td>
                                                <td>
                                                    ".$employee->Bname."
                                                </td>    
                                                <td>
                                                    <button class=\"btn-delete btn btn-danger btn-xs\" data-toggle='modal' data-target='#DeleteEmployeeModal' style=\"margin-right: 5px\" data-id='$employee->CCCD_number' ><i style=\"font-size:17px;\" class=\"fas fa-trash\"></i></button> 
                                                </td>                                                                                                                                                                    
                                            </tr>";
                                            $index++;
                                        }
                                    ?>
                                </tbody>
                                <div class="modal fade" id="DeleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEmployeeModal" aria-hidden="true" name="id">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=employee&action=delete" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
                                                    <p>Bạn có chắc chắn muốn xóa nhân viên này?</p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Đóng</button><button class="btn btn-danger btn-outline-light" type="submit">Xóa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                        </div>

                        <div id="content2" class="mt-3">
                        <div class="row">
                            <table id="TAB-staff" class="table table-bordered table-striped"> 
                                <thead>
                                    <tr  class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Số CCCD</th>
                                        <th scope="col">Ngày cấp</th>
                                        <th scope="col">Họ và tên lót</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Tôn giáo</th>
                                        <th scope="col">Dân tộc</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Quê quán</th>
                                        <th scope="col">Tòa phụ trách</th>
                                        <th scope="col">Công việc</th>
                                        <th scope="col">Quản lý trực tiếp</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                        $index = 1;
                                        foreach ($staffs as $staff) {
                                            echo 
                                            "<tr class=\"text-center\">
                                                <td>"
                                                    .$index. 
                                                "</td>
                                                <td>
                                                    ".$staff->CCCD_number."
                                                </td>
                                                <td>
                                                    ".$staff->CCCD_date."
                                                </td>   
                                                <td>
                                                    ".$staff->Lname."
                                                </td> 
                                                <td>
                                                    ".$staff->Fname."
                                                </td>
                                                <td>
                                                    ".$staff->DOB."
                                                </td>
                                                <td>
                                                    ".(($staff->Sex === 'M') ? 'Nam' : 'Nữ')."
                                                </td>   
                                                <td>
                                                    ".$staff->Religion."
                                                </td> 
                                                <td>
                                                    ".$staff->Ethnicity."
                                                </td>
                                                <td>
                                                    ".$staff->Email."
                                                </td>   
                                                <td>
                                                    ".$staff->Phone."
                                                </td> 
                                                <td>
                                                    ".$staff->Address."
                                                </td>
                                                <td>
                                                    ".$staff->Bname."
                                                </td>
                                                <td>
                                                    ".$staff->Job."
                                                </td> 
                                                <td>
                                                    ".$staff->Super_CCCD_number."
                                                </td>                                                                                                                                                                        
                                            </tr>";
                                            $index++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


<?php
require_once('views/admin/footer.php'); ?>
<script src="public/js/employee/index.js"></script>
<script>
    document.getElementById('showContent1').addEventListener('click', function () {
        document.getElementById('content1').style.display = 'block';
        document.getElementById('content2').style.display = 'none';
    });

    document.getElementById('showContent2').addEventListener('click', function () {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'block';
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
    });
</script>


</body>

</html>