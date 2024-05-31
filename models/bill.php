<?php
require_once('connection.php');
class Bill
{
    public $Bill_ID;
    public $Detail;
    public $Amount;
    public $Date_paid;
    public $Date_issue;
    public $Date_expire;
    public $Mgr_ID;
    public $Mgr_Lname;
    public $Mgr_Fname;
    public $Student_ID;
    public $Student_Lname;
    public $Student_Fname;

    public function __construct($Bill_ID, $Detail, $Amount, $Date_paid, $Date_issue, $Date_expire, 
    $Mgr_ID, $Mgr_Lname, $Mgr_Fname, $Student_ID, $Student_Lname, $Student_Fname)
    {
        $this->Bill_ID = $Bill_ID;
        $this->Detail = $Detail;
        $this->Amount = $Amount;
        $this->Date_paid = $Date_paid;
        $this->Date_issue = $Date_issue;
        $this->Date_expire = $Date_expire;
        $this->Mgr_ID = $Mgr_ID;
        $this->Mgr_Lname = $Mgr_Lname;
        $this->Mgr_Fname = $Mgr_Fname;
        $this->Student_ID = $Student_ID;
        $this->Student_Lname = $Student_Lname;
        $this->Student_Fname = $Student_Fname;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT bill.*, 
                employee.Lname as Mgr_Lname, 
                employee.Fname as Mgr_Fname,
                student.Lname as Student_Lname, 
                student.Fname as Student_Fname
            FROM bill
            LEFT JOIN employee ON bill.Mgr_ID = employee.CCCD_number
            LEFT JOIN student ON bill.Student_ID = student.CCCD_number
            ORDER BY Date_issue DESC
        ");
        $bills = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $bill)
        {
            $bills[] = new Bill(
                $bill['Bill_ID'],
                $bill['Detail'],
                $bill['Amount'],
                $bill['Date_paid'],
                $bill['Date_issue'],
                $bill['Date_expire'],
                $bill['Mgr_ID'],
                $bill['Mgr_Lname'],
                $bill['Mgr_Fname'],
                $bill['Student_ID'],
                $bill['Student_Lname'],
                $bill['Student_Fname'],
            );
        }
        return $bills;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM bill WHERE Bill_ID = $id;");
        return $req;
    }
}
?>