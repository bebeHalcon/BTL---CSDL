<?php
require_once('controllers/admin/base_controller.php');
require_once('models/rent.php');


class RentController extends BaseController
{
	function __construct()
	{
		$this->folder = 'rent';
	}

	public function index()
	{
		$this->render('index');
	}
}
