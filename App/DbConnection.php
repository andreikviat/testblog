<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 11:16
 */

namespace App;



final class DbConnection
{
    private static $dbh;
    private static $db;


    private  function  __construct()
    {
        $config = (include __DIR__.'/../Configs/dbconfig.php');

        try {
                self::$dbh = new \PDO('mysql:host='.$config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
        } catch (\PDOException $e) {
            echo 'A database connection is not established. ';
        }
    }

    public static function setDbConnection()
    {
        if (!self::$db){
            self::$db = new self();
        } else
        return self::$db;
    }

    public static function getDbh()
    {
        return self::$dbh;
    }

    private function __clone()
    {

    }
}