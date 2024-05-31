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

<!-- Code -->
<div class="content-wrapper">
    <!-- Add Content -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Các thông báo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
                        <li class="breadcrumb-item active">Các thông báo</li>
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
                        <!-- /.card-header-->
                        <div class="card-body">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">Thêm mới</button>
                            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm thông báo mới</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-notification" action="index.php?page=admin&controller=news&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="col-6"><label>Chọn người đăng</label>
                                                    <select class="form-control" type="text" name="CCCD_number" <?php if(isset($_POST['CCCD_number'])) echo "placeholder='".$_POST['CCCD_number']."'" ?> required>
                                                    <?php
                                                        foreach ($managers as $manager) {
                                                            echo "<option value=\"$manager->CCCD_number\">$manager->Lname $manager->Fname</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group"><label>Tiêu đề</label><input class="form-control" type="text" placeholder="Tiêu đề" name="title" /></div>
                                                <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" placeholder="Nội dung" name="content" rows="10"></textarea></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary" type="submit">Thêm mới</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="TAB-news" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày đăng</th>
                                        <th scope="col">Người đăng</th>
                                        <th scope="col">Họ và tên lót người đăng</th>
                                        <th scope="col">Tên người đăng</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $index = 1;

                                    foreach ($news as $notification) {
                                        echo
                                        "<tr >
                                            <td class=\"text-center\">"
                                                .$index.
                                            "</td>    
                                            <td>
                                            ".$notification->ID."
                                            </td> 
                                            <td>
                                            ".$notification->Title."
                                            </td> 
                                            <td>
                                            ".$notification->Content."
                                            </td> 
                                            <td class=\"text-center\">
                                                ".date('h:i - d/m/Y',strtotime($notification->Date))."
                                            </td>   
                                            <td>
                                                ".$notification->Mgr_ID."
                                            </td>
                                            <td>
                                                ".$notification->Mgr_Lname."
                                            </td>
                                            <td>
                                                ".$notification->Mgr_Fname."
                                            </td>
                                            <td>
                                            <button class=\"btn-edit btn btn-primary btn-xs\" data-toggle='modal' data-target='#EditStudentModal' style=\"margin-right: 5px\" data-id='$notification->ID'> <i style=\"font-size:17px;\" class=\"fas fa-edit\" ></i></button>
                                            <button class=\"btn-delete btn btn-danger btn-xs\" data-toggle='modal' data-target='#DeleteStudentModal' style=\"margin-right: 5px\" data-id='$notification->ID'><i style=\"font-size:17px;\" class=\"fas fa-trash\"></i></button>
                                            </td>                                                                                                                                                                                       
                                        </tr>";
                                        $index++;
                                    }
                                    ?>
                                </tbody>
                                <div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="EditStudentModal" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chỉnh sửa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=edit" enctype="multipart/form-data" method="post">
                                                <div class="modal-body">
                                                    <input class="form-control" type="hidden" placeholder="Name" name="id" />
                                                    <div class="form-group"><label>Tiêu đề </label><input class="form-control" type="text" name="title" /></div>
                                                    <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" name="content" rows="10"></textarea></div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Chỉnh sửa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteStudentModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=delete" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
                                                    <p>Bạn có chắc chắn xóa thông báo này</p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Đóng</button><button class="btn btn-danger btn-outline-light" type="submit">Xóa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




</div>


<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/news/index.js"></script>

</body>

</html>