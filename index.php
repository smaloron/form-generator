<?php
require "vendor/autoload.php";


use dbGenerator\DbTableFactory;
use dbGenerator\FormGenerator;


$pdo = new PDO(
    "mysql:host=localhost;dbname=formation_cda_2022;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$resultset = $pdo->query("SHOW TABLES");
$rows = $resultset->fetchAll(PDO::FETCH_COLUMN);
$resultset = null;

$factory = new DbTableFactory($pdo);

foreach($rows as $item) {  
    $table = $factory->makeTable($item);
    $generator = new FormGenerator($table);
    echo $generator->save();
}


