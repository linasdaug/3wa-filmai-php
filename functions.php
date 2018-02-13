<?php

function connectToDb() {

    $pdo = new PDO('mysql:host=localhost;dbname=filmai', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    return $pdo;

}

function searchMovie($search) {

    $pdo = connectToDb();
    $query = $pdo->prepare("SELECT title, id FROM movies WHERE title LIKE '%{$search}%'");
    $query->execute();
    $results = $query->fetchAll();
    return $results;
}



function searchActor($search) {

    $pdo = connectToDb();
    $query = $pdo->prepare("SELECT FirstName, LastName, actorId FROM actors WHERE (LastName LIKE '%{$search}%') OR (FirstName LIKE '%{$search}%')");
    $query->execute();
    $results = $query->fetchAll();
    return $results;
}

 ?>
