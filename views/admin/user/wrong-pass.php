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

<div class="text-center" style="margin-top:30px; margin-bottom:10px;">
	<span>Bạn vừa nhập sai mật khẩu hiện tại.</span> <br>
	<a href="index.php?page=admin&controller=user&action=index" class="btn btn-info" role="button">Quay lại</a>
		
</div>


<?php
require_once('views/admin/footer.php'); ?>
</body>
</html>