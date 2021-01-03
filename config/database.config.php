<?php
class Database
{
    private static $server = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $db_name = "animemaniatics";

    public static function connect()
    {
        try {
            return new PDO("mysql:host=".self::$server.";dbname=".self::$db_name, self::$username, self::$password);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
}
