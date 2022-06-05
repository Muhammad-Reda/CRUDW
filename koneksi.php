<?php

$dbserver = 'localhost';
$dbname = 'kuliahweb';
$dbuser = 'root';
$dbpassword = '';

$dsn = "mysql:host={$dbserver};dbname={$dbname}";

try{
    $connection = new PDO ($dsn,$dbuser,$dbpassword); 
}catch(Exception $e){
    die("terjadi error: {$e->getMessage()}");
}