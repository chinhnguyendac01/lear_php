<?php
namespace App;
use \PDO;
class DBB
{
    private static $dbHost;
    private static $dbUser;
    private static $dbPass;
    private static $dbName;
    private static $charset;
    private static $dbResult = null;
    public static $dbConnect = null;

    public function __construct()
    {
        self::$dbHost = 'localhost:3307';
        self::$dbUser = 'root';
        self::$dbPass = '';
        self::$dbName = 'ngay3';
        self::$charset = 'utf8';
    }
    public static function connection()
    {
        $DB = new DBB();

        try {
            self::$dbConnect = new PDO(
                'mysql:host=' . self::$dbHost . ';dbname=' . self::$dbName .';charset = '.self::$charset ,
                self::$dbUser,
                self::$dbPass
            );
         
            self::$dbConnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbConnect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$dbConnect->setAttribute(PDO::ATTR_STRINGIFY_FETCHES,false);

        } catch (\PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
        return self::$dbConnect;
    }

    // public static function query($sql, $array = [])
    // {
    //     self::connection();
    //     self::$dbResult = DBB::$dbConnect->prepare($sql);
    //     self::$dbResult->execute($array);

    //     return self::$dbResult;
    // }

    // public static function getOne()
    // {

    //     return self::$dbResult->fetch(PDO::FETCH_BOTH);
    // }

    // public static function getAll()
    // {       
        
    //     return self::$dbResult->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,DBB::class);
    // }

    
}
