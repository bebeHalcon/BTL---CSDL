<?php
require_once('connection.php');
class Employee
{
    public $CCCD_number;
    public $CCCD_date;
    public $Fname;
    public $Lname;
    public $DOB;
    public $Sex;
    public $Religion;
    public $Ethnicity;
    public $Email;
    public $Phone;
    public $Address;
    public $Bname;
    // Only for Staff
    public $Job;
    public $Super_CCCD_number;
    // Only for Manager
    public $Mgr_start_date;
    public $High_Mgr;

    public function __construct($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, $Religion, $Ethnicity, $Email, $Phone, $Address, $Bname)
    {
        $this->CCCD_number = $CCCD_number;
        $this->CCCD_date = $CCCD_date;
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->DOB = $DOB;
        $this->Sex = $Sex;
        $this->Religion = $Religion;
        $this->Ethnicity = $Ethnicity;
        $this->Email = $Email;
        $this->Phone = $Phone;
        $this->Address = $Address;
        $this->Bname = $Bname;
    }

    public function set_staff_info($Job, $Super_CCCD_number) {
        $this->Job = $Job;
        $this->Super_CCCD_number = $Super_CCCD_number;
    }

    public function set_manager_info($Mgr_start_date, $High_Mgr) {
        $this->Mgr_start_date = $Mgr_start_date;
        $this->High_Mgr = $High_Mgr;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM employee");
        $employees = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $employee)
        {
            $employees[] = new Employee(
                $employee['CCCD_number'],
                $employee['CCCD_date'],
                $employee['Fname'],
                $employee['Lname'],
                $employee['DOB'],
                $employee['Sex'],
                $employee['Religion'],
                $employee['Ethnicity'],
                $employee['Email'],
                $employee['Phone'],
                $employee['Address'],
                $employee['Bname']
            );
        }
        return $employees;
    }

    static function getAllManagers()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM employee JOIN manager ON employee.CCCD_number = manager.CCCD_number
        ");
        $managers = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $manager) {
            $m = new Employee(
                $manager['CCCD_number'],
                $manager['CCCD_date'],
                $manager['Fname'],
                $manager['Lname'],
                $manager['DOB'],
                $manager['Sex'],
                $manager['Religion'],
                $manager['Ethnicity'],
                $manager['Email'],
                $manager['Phone'],
                $manager['Address'],
                $manager['Bname']
            );
            $m->set_manager_info($manager['Mgr_start_date'], $manager['High_Mgr']);
            $managers[] = $m;
        }
        return $managers;
    }

    static function getAllStaff()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM employee JOIN staff ON employee.CCCD_number = staff.CCCD_number
            ");
        $staffs = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $staff) {
            $s = new Employee(
                $staff['CCCD_number'],
                $staff['CCCD_date'],
                $staff['Fname'],
                $staff['Lname'],
                $staff['DOB'],
                $staff['Sex'],
                $staff['Religion'],
                $staff['Ethnicity'],
                $staff['Email'],
                $staff['Phone'],
                $staff['Address'],
                $staff['Bname']
            );
            $s->set_staff_info($staff['Job'], $staff['Super_CCCD_number']);
            $staffs[] = $s;
        }
        return $staffs;
    }

    static function get($CCCD_number)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM employee WHERE CCCD_number = $CCCD_number");
        $result = $req->fetch_assoc();
        $employee = new Employee(
            $result['CCCD_number'],
            $result['CCCD_date'],
            $result['Fname'],
            $result['Lname'],
            $result['DOB'],
            $result['Sex'],
            $result['Religion'],
            $result['Ethnicity'],
            $result['Email'],
            $result['Phone'],
            $result['Address'],
            $result['Bname']
        );
        return $Employee;
    }

    static function insert($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, $Religion, $Ethnicity, $Email, $Phone, $Address, $Bname)
    {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO employee (CCCD_number, CCCD_date, Fname, Lname, DOB, Sex, Religion, Ethnicity, Email, Phone, Address, Bname)
            VALUES ('$CCCD_number', '$CCCD_date', '$Fname', '$Lname', '$DOB', '$Sex', '$Religion', '$Ethnicity', '$Email', '$Phone', '$Address', '$Bname');
        ");
        $req1 = $db->query("
            INSERT INTO manager (CCCD_number, Mgr_start_date, High_Mgr)
            VALUES ('$CCCD_number', CURDATE(), NULL);
        ");
        return $req1;
    }

    static function insertStaff($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, $Religion, $Ethnicity, $Email, $Phone, $Address, $Job, $Bname)
    {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO employee (CCCD_number, CCCD_date, Fname, Lname, DOB, Sex, Religion, Ethnicity, Email, Phone, Address, Bname)
            VALUES ('$CCCD_number', '$CCCD_date', '$Fname', '$Lname', '$DOB', '$Sex', '$Religion', '$Ethnicity', '$Email', '$Phone', '$Address', '$Bname');
        ");
        $buildingQuery = $db->query("
            SELECT Mgr_ID FROM building WHERE Name = '$Bname';
        ");
        $buildingResult = $buildingQuery->fetch_assoc();

        $Mgr_ID = $buildingResult['Mgr_ID'];
        $req1 = $db->query("
            INSERT INTO staff (CCCD_number, Job, Super_CCCD_number)
            VALUES ('$CCCD_number', '$Job', '$Mgr_ID');
        ");
        return $req1;
    }

    static function delete($CCCD_number)
    {
        $db = DB::getInstance();
        $req1 = $db->query("
            DELETE FROM work_in WHERE Employee_ID = '$CCCD_number';
        ");
        $req1 = $db->query("
            DELETE FROM staff WHERE CCCD_number = '$CCCD_number';
        ");
        $req2 = $db->query("
            DELETE FROM manager WHERE CCCD_number = '$CCCD_number';
        ");
        $req = $db->query("
            DELETE FROM employee WHERE CCCD_number = '$CCCD_number';
        ");
        return $req;
    }

    static function update($CCCD_number, $CCCD_date, $Fname, $Lname, $DOB, $Sex, $Religion, $Ethnicity, $Email, $Phone, $Address, $Bname)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE employee
                SET CCCD_date = '$CCCD_date', Fname = '$Fname', Lname = '$Lname', DOB = '$DOB', Sex = '$Sex', Ethnicity = '$Ethnicity', Email = '$Email', Phone = '$Phone', Address = '$Address', Bname = '$Bname'
                WHERE CCCD_number = $CCCD_number
            ;");
    }
}
?>