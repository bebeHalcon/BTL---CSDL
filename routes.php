<?php
$pages = array(
  'error' => ['errors'],
  'admin' => ['layouts', 'members', 'rooms', 'news', 'comments']
);
$controllers = array(
  //Admin controller
  'errors' => ['index'],
  'layouts' => ['index'], // Bổ sung thêm các hàm trong controllers
  'rooms' => ['index','add','edit','delete'],
  'news' => ['index','add','edit','delete','hide'],
  'admin' => ['index', 'add', 'edit', 'delete'],
  'student' => ['index', 'add', 'edit', 'delete', 'search', 'sort'],
  'login' => ['index', 'check', 'logout'],
  'dashboard' => ['index'],
  'report' => ['index'], // Báo cáo - Thống kê
  'bill' => ['index', 'delete'], // Hóa đơn
  'rent' => ['index'], // Thuê phòng
  'employee' => ['index','add','edit','delete', 'addStaff'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $page = 'error';
  $controller = 'errors';
  $action = 'index';
}
if($page=='error'){
  $controller = 'errors';
  $action = 'index';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' .$page ."/" . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
