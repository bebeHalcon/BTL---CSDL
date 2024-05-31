<?php
require_once('controllers/admin/base_controller.php');
require_once('models/employee.php');
require_once('models/building.php');


class EmployeeController extends BaseController
{
	function __construct()
	{
		$this->folder = 'employee';
	}

	public function index()
	{
        $employees = Employee::getAll();
        $staffs = Employee::getAllStaff();
        $buildings = Building::getAll();
        $data = array('employees' => $employees, "staffs" => $staffs, "buildings" => $buildings);
        $this->render('index', $data);
	}
    public function add(){
        $CCCD_number = $_POST['CCCD_number'];
		$CCCD_date = $_POST['CCCD_date'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$DOB = $_POST['DOB'];
		$Sex = $_POST['Sex'];
		$Religion = $_POST['Religion'];
		$Ethnicity = $_POST['Ethnicity'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Address = $_POST['Address'];
		$Bname = $_POST['Name'];
		$add_new = Employee::insert($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, 
            $Religion, $Ethnicity, $Email, $Phone, $Address, $Bname);
		header('Location: index.php?page=admin&controller=employee&action=index');
    }
    public function addStaff(){
        $CCCD_number = $_POST['CCCD_number'];
		$CCCD_date = $_POST['CCCD_date'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$DOB = $_POST['DOB'];
		$Sex = $_POST['Sex'];
		$Religion = $_POST['Religion'];
		$Ethnicity = $_POST['Ethnicity'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Address = $_POST['Address'];
        $Job = $_POST['Job'];
		$Bname = $_POST['Name'];
		$add_new = Employee::insertStaff($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, 
            $Religion, $Ethnicity, $Email, $Phone, $Address, $Job, $Bname);
		header('Location: index.php?page=admin&controller=employee&action=index');
    }
    public function delete(){
        $CCCD_number = $_POST['id'];
        Employee::delete($CCCD_number);
        header('Location: index.php?page=admin&controller=employee&action=index');
    }
}
