<?php
require_once('connection.php');
class Room
{
    public $Room_ID;
    public $Status;
    public $Bname;
    public $Room_type_ID, $Room_type_name;
    public $Leader_ID, $Leader_Lname, $Leader_Fname;

    public function __construct($Room_ID, $Status, $Bname, $Room_type_ID, $Room_type_name, $Leader_ID, $Leader_Lname, $Leader_Fname)
    {
        $this->Room_ID = $Room_ID;
        $this->Status = $Status;
        $this->Bname = $Bname;
        $this->Room_type_ID = $Room_type_ID;
        $this->Room_type_name = $Room_type_name;
        $this->Leader_ID = $Leader_ID;
        $this->Leader_Lname = $Leader_Lname;
        $this->Leader_Fname = $Leader_Fname;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT room.*, 
                room_type.Room_type_name as Room_type_name, 
                student.Lname as LeaderLname, 
                student.Fname as LeaderFname
            FROM room
            LEFT JOIN student ON room.Leader_ID = student.CCCD_number
            LEFT JOIN room_type ON room.Room_type_ID = room_type.Room_type_ID;
        ");
        $rooms = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $room)
        {
            $rooms[] = new Room(
                $room['Room_ID'],
                $room['Status'],
                $room['Bname'],
                $room['Room_type_ID'],
                $room['Room_type_name'],
                $room['Leader_ID'],
                $room['LeaderLname'],
                $room['LeaderFname'],
            );
        }
        return $rooms;
    }

    static function getAllEmpty()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM room
            LEFT JOIN room_type ON room.Room_type_ID = room_type.Room_type_ID
            WHERE room.student_count < room_type.Max_student;
        ");
        $empty_rooms = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $room)
        {
            $empty_rooms[] = new Room(
                $room['Room_ID'],
                $room['Status'],
                $room['Bname'],
                $room['Room_type_ID'],
                $room['Room_type_name'],
                $room['Leader_ID'],
                NULL, 
                NULL,
            );
        }
        return $empty_rooms;
    }

    static function get($Room_ID)
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT room.*,
                room_type.Room_type_name as Room_type_name,
                student.Lname as LeaderLname,
                student.Fname as LeaderFname
            FROM room
            LEFT JOIN student ON room.Leader_ID = student.CCCD_number
            LEFT JOIN room_type ON room.Room_type_ID = room_type.Room_type_ID
            WHERE room.Room_ID = $Room_ID;
        ");
        $result = $req->fetch_assoc();
        $room = new Room(
            $result['Room_ID'],
            $result['Status'],
            $result['Bname'],
            $result['Room_type_ID'],
            $result['Room_type_name'],
            $result['Leader_ID'],
            $result['LeaderLname'],
            $result['LeaderFname'],
        );
        return $room;
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