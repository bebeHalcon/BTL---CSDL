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
                    <h1>Khu/Nhà/Phòng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="page=admin&controller=layouts&action=index">Home</a></li>
                        <li class="breadcrumb-item active">Khu/Nhà/Phòng</li>
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
                        <button class="btn btn-secondary" type="button" id="showContent1">Các tòa nhà</button>
                        <button class="btn btn-info ml-2" type="button" id="showContent2">Các phòng</button>

                        <div id="content2" class="mt-3 ml-2">
                        <div class="row">
                            <table id="TAB-room-test" class="table table-bordered table-striped"> 
                                <thead>
                                    <tr  class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên phòng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tòa nhà</th>
                                        <th scope="col">Loại phòng</th>
                                        <th scope="col">Trưởng phòng</th>
                                        <th scope="col">Họ và tên lót trưởng phòng</th>
                                        <th scope="col">Tên trưởng phòng</th>
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php
                                        
                                        $index = 1;

                                        foreach ($rooms as $room) {  
                                                                                        
                                            echo 
                                            "<tr class=\"text-center\">
                                                <td>"
                                                    .$index. 
                                                "</td>
                                                <td>
                                                    ".$room->Room_ID."
                                                </td>
                                                <td>
                                                    ".$room->Status."
                                                </td>   
                                                <td>
                                                    ".$room->Bname."
                                                </td> 
                                                <td>
                                                    ".$room->Room_type_ID."
                                                </td>
                                                <td>
                                                    ".$room->Leader_ID."
                                                </td>
                                                <td>
                                                    ".$room->Leader_Lname."
                                                </td>
                                                <td>
                                                    ".$room->Leader_Fname."
                                                </td>                                                                                                                                                                             
                                            </tr>";
                                            $index++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </div>

                        <div id="content1" class="mt-3 ml-2">
                        <div class="row">
                            <table id="TAB-building-test" class="table table-bordered table-striped"> 
                                <thead>
                                    <tr  class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên tòa nhà</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Quản lý tòa</th>
                                        <th scope="col">Họ và tên lót quản lý tòa</th>
                                        <th scope="col">Tên quản lý tòa</th>
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php
                                        
                                        $index = 1;

                                        foreach ($buildings as $building) {  
                                                                                        
                                            echo 
                                            "<tr class=\"text-center\">
                                                <td>"
                                                    .$index. 
                                                "</td>
                                                <td>
                                                    ".$building->Name."
                                                </td>
                                                <td>
                                                    ".$building->Status."
                                                </td>   
                                                <td>
                                                    ".$building->Mgr_ID."
                                                </td>
                                                <td>
                                                    ".$building->Mgr_Lname."
                                                </td>
                                                <td>
                                                    ".$building->Mgr_Fname."
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
            </div>
        </div>
    </section>

</div>


<?php
require_once('views/admin/footer.php'); ?>
<script src="public/js/rooms/index.js"></script>
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