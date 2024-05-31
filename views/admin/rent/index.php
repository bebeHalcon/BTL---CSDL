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
    <h1>RENT</h1>
</div>
<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/rent/index.js"></script>

</body>

</html>