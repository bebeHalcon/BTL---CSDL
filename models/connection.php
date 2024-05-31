<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class DB
{
    public static $instance = NULL;
    public static function getInstance($user="root", $password="") 
    {
        if (isset($_SESSION["user"]) && isset($_SESSION["password"])) {
            $user = $_SESSION["user"];
            $password = $_SESSION["password"];
        }
        if (!isset(self::$instance)) 
        {
            try {
                self::$instance = mysqli_connect("127.0.0.1", $user, $password, "chetcom");
            } catch (mysqli_sql_exception $e) {
                $instance = NULL;
                return 0;
            }
        }
        return self::$instance;
    }
}
