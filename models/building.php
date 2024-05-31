<?php
require_once('connection.php');

class Building
{
    public $Name;
    public $Status;
    public $Mgr_ID;
    public $Mgr_Lname;
    public $Mgr_Fname;

    public function __construct($Name, $Status, $Mgr_ID, $Mgr_Lname, $Mgr_Fname)
    {
        $this->Name = $Name;
        $this->Status = $Status;
        $this->Mgr_ID = $Mgr_ID;
        $this->Mgr_Lname = $Mgr_Lname;
        $this->Mgr_Fname = $Mgr_Fname;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT building.*, 
                employee.Lname as Mgr_Lname, 
                employee.Fname as Mgr_Fname
            FROM building
            LEFT JOIN employee ON building.Mgr_ID = employee.CCCD_number
        ");
        $buildings = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $building)
        {
            $buildings[] = new Building(
                $building['Name'],
                $building['Status'],
                $building['Mgr_ID'],
                $building['Mgr_Lname'],
                $building['Mgr_Fname'],
            );
        }
        return $buildings;
    }

    static function get($Name)
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM building WHERE Name = $Name;
        ");
        $result = $req->fetch_assoc();
        $building = new Building(
            $result['Name'],
            $result['Status'],
            $result['Mgr_ID'],
        );
        return $building;
    }

    static function insert($Room_ID, $Status, $Bname, $Room_type_ID, $Leader_ID)
    {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO room (Room_ID, Status, Bname, Room_type_ID, Leader_ID)
            VALUES ('$Room_ID', '$Status', '$Bname', '$Room_type_ID', '$Leader_ID');
        ");
        return $req;
    }

    static function delete($Room_ID)
    {
        $db = DB::getInstance();
        $req = $db->query("
            DELETE FROM room WHERE Room_ID = $Room_ID
        ");
        return $req;
    }

    static function update($Room_ID, $Status, $Bname, $Room_type_ID, $Leader_ID)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE room
                SET Status = $Status, Bname = '$Bname', Room_type_ID = '$Room_type_ID', Leader_ID = '$Leader_ID'
                WHERE Room_ID = $Room_ID
            ;");
    }
}
?>