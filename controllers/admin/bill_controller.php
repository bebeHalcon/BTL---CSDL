<?php
require_once('controllers/admin/base_controller.php');
require_once('models/bill.php');


class BillController extends BaseController
{
	function __construct()
	{
		$this->folder = 'bill';
	}

	public function index()
	{
        $bills = Bill::getAll();
        $data = array('bills' => $bills);
        $this->render('index', $data);
	}

	public function delete(){
        $id = $_POST['id'];
        Bill::delete($id);
        header('Location: index.php?page=admin&controller=bill&action=index');
    }
}
