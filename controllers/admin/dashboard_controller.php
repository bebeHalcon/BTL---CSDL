<?php
require_once('controllers/admin/base_controller.php');
require_once('models/dashboard.php');


class DashboardController extends BaseController
{
	function __construct()
	{
		$this->folder = 'dashboard';
	}

	public function index()
	{
		$this->render('index');
	}
}
