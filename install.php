<?php
$config = (include __DIR__.'/Configs/dbconfig.php');

if (!file_exists(__DIR__.'/blog.sql'))
{
    echo 'There is no file with data';
    die;
}
$queries = explode(';', file_get_contents(__DIR__.'/blog.sql'));
try{
    $dbh = new PDO('mysql:host='.$config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
} catch (\PDOException $e) {
    echo 'A database connection is not established. Check /Configs/dbconfig.php';
}
foreach ($queries as $query){
    $dbh->query($query);
}
header ('location: http://' . $_SERVER['SERVER_NAME'].'/index.php');