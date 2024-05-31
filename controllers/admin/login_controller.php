<?php
require_once('controllers/admin/base_controller.php');
require_once('models/admin.php');

class LoginController extends BaseController
{
	function __construct()
	{
		$this->folder = 'login';
	}

	public function index()
	{
		$this->render('index');
	}

	public function check()
	{
		$user = $_POST['username'];
		$password = $_POST['password'];
		
		$check = Admin::validation($user, $password);
		if ($check == 1) {
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			$_SESSION["user"] = $user;
			$_SESSION["password"] = $password;
			header("Location: index.php?page=admin&controller=layouts&action=index");
		} else {
			$err = "Sai tài khoản hoặc mật khẩu";
			$data = array('err' => $err);
			$this->render('index', $data);
		}
	}

	public function logout()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		unset($_SESSION["user"]);
		unset($_SESSION["password"]);
		session_destroy();
		header("Location: index.php?page=admin&controller=login&action=index");
	}
}