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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Các hóa đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
                        <li class="breadcrumb-item active">Các hóa đơn</li>
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
                            
                            <table id="tab-bill" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Giá thành</th>
                                        <th scope="col">Ngày thanh toán</th>
                                        <th scope="col">Ngày tạo hóa đơn</th>
                                        <th scope="col">Ngày hết hạn</th>
                                        <th scope="col">Người đăng</th>
                                        <th scope="col">Người đăng</th>
                                        <th scope="col">Sinh viên</th>
                                        <th scope="col">Sinh viên</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $index = 1;

                                    foreach ($bills as $bill) {
                                        echo
                                        "<tr >
                                            <td class=\"text-center\">"
                                                .$index.
                                            "</td>    
                                            <td>
                                                ".$bill->Bill_ID."
                                            </td> 
                                            <td>
                                                ".$bill->Detail."
                                            </td> 
                                            <td>
                                                ".$bill->Amount."
                                            </td> 
                                            <td class=\"text-center\">
                                                ".date('h:i - d/m/Y',strtotime($bill->Date_paid))."
                                            </td>   
                                            <td class=\"text-center\">
                                                ".date('h:i - d/m/Y',strtotime($bill->Date_issue))."
                                            </td>   
                                            <td class=\"text-center\">
                                                ".date('h:i - d/m/Y',strtotime($bill->Date_expire))."
                                            </td>   
                                            <td>
                                                ".$bill->Mgr_ID."
                                            </td>
                                            <td>
                                                ".$bill->Mgr_Lname." ".$bill->Mgr_Fname."
                                            </td>
                                            <td>
                                                ".$bill->Student_ID."
                                            </td>
                                            <td>
                                                ".$bill->Student_Lname." ".$bill->Student_Fname."
                                            </td>
                                            <td>
                                            <button class=\"btn-delete btn btn-danger btn-xs\" style=\"margin-right: 5px\" data-id='$bill->Bill_ID'><i style=\"font-size:17px;\" class=\"fas fa-trash\"></i></button>
                                            </td>                                                                                                                                                                                       
                                        </tr>";
                                        $index++;
                                    }
                                    ?>
                                </tbody>
                                <div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteStudentModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=bill&action=delete" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
                                                    <p>Bạn có chắc chắn xóa hóa đơn này</p>
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
<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/bill/index.js"></script>

</body>

</html>