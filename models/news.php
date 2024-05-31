<?php
require_once('connection.php');
class News
{
    public $ID;
    public $Title;
    public $Content;
    public $Date;
    public $Mgr_ID;
    public $Mgr_Lname;
    public $Mgr_Fname;

    public function __construct($ID, $Title, $Content, $Date, $Mgr_ID, $Mgr_Lname, $Mgr_Fname)
    {
        $this->ID = $ID;
        $this->Title = $Title;
        $this->Content = $Content;
        $this->Date = $Date;
        $this->Mgr_ID = $Mgr_ID;
        $this->Mgr_Lname = $Mgr_Lname;
        $this->Mgr_Fname = $Mgr_Fname;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT notification.*, 
                employee.Lname as Mgr_Lname, 
                employee.Fname as Mgr_Fname
            FROM notification
            LEFT JOIN employee ON notification.Mgr_ID = employee.CCCD_number
            ORDER BY date DESC
        ");
        $lnews = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $news)
        {
            $lnews[] = new News(
                $news['ID'],
                $news['Title'],
                $news['Content'],
                $news['Date'],
                $news['Mgr_ID'],
                $news['Mgr_Lname'],
                $news['Mgr_Fname'],
            );
        }
        return $lnews;
    }

    static function getAllShow()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM news WHERE status=1 ORDER BY date DESC");
        $lnews = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $news)
        {
            $lnews[] = new News(
                $news['id'],
                $news['status'],
                $news['date'],
                $news['title'],
                $news['description'],
                $news['content']
            );
        }
        return $lnews;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM news WHERE id = $id");
        $result = $req->fetch_assoc();
        $news = new News(
            $result['id'],
            $result['status'],
            $result['date'],
            $result['title'],
            $result['description'],
            $result['content']
        );
        return $news;
    }

    static function insert($Title, $Content, $Mgr_ID)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            INSERT INTO notification (Title, Content, Date, Mgr_ID)
            VALUES ('$Title', '$Content', CURDATE(), '$Mgr_ID')
            ;");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM notification WHERE id = $id;");
        return $req;
    }

    static function update($id, $title, $content)
    {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE notification 
            SET Content = '$content', Title = '$title', Date = CURDATE()
            WHERE id = $id;
        ");
        return $req;
    }

    static function hide($id)
    {   
        
    }

    static function show($id)
    {
        
    }

    static function recentNews()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 5");
        $lnews = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $news)
        {
            $lnews[] = new News(
                $news['id'],
                $news['status'],
                $news['date'],
                $news['title'],
                $news['description'],
                $news['content']
            );
        }
        return $lnews;
    }
}
?>