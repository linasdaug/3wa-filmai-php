<?php

function connectToDb() {


    $pdo = new PDO('mysql:host=localhost;dbname=filmai', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    return $pdo;



}

 ?>
