<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 14:01
 */

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        DbConnection::setDbConnection();
        $this->dbh = DbConnection::getDbh();
    }

    public function query($sql, $data, $class)
    {
        $sth = $this->dbh->prepare($sql);
        if ($sth->execute($data)){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } else {
            echo 'Database query error';
        }

    }

    public function execute($sql,$data):bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}