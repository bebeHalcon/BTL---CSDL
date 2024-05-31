<?php
require_once('controllers/admin/base_controller.php');
require_once('models/report.php');
require_once('models/building.php');
require_once('models/room.php');

class ReportController extends BaseController
{
	function __construct()
	{
		$this->folder = 'report';
	}

	public function index()
	{
		$buildings = Building::getAll();
		$rooms = Room::getAll();
		$data = array("buildings" => $buildings, "rooms" => $rooms);
        $this->render('index', $data);
	}

	public function FindStudentsInMonth($month) {
		$result = Report::FindStudentsInMonth($month);
		return $result;
	}

	public function CalculateExpensesForBuildingMonth($month, $Bname) {
		$result = Report::CalculateExpensesForBuildingMonth($Bname, $month);
		return $result;
	}

	static function PrintStudentListByDatein($room_id) {
		$result = Report::PrintStudentListByDatein($room_id);
		return $result;
	}

	static function PrintGeneralInfo($Bname) {
		$result = Report::PrintGeneralInfo($Bname);
		return $result;
	}
}
