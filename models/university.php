<?php
require_once('connection.php');
class University
{
    public $Uni_ID;
    public $Name;

    public function __construct($Uni_ID, $Name)
    {
        $this->Uni_ID = $Uni_ID;
        $this->Name = $Name;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM university
        ");
        $universities = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $university)
        {
            $universities[] = new University(
                $university['Uni_ID'],
                $university['Name'],
            );
        }
        return $universities;
    }
}
?>