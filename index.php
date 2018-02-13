<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

include 'functions.php';

$orderIndex = 0;
$orderby = 'id';

if (isset($_GET['sort_id'])) {
    $orderIndex = $_GET['sort_id'];
}

switch ($orderIndex) {
    case 0:
        $orderby = 'id';
        break;
    case 1:
        $orderby = 'title';
        break;
    case 2:
        $orderby = 'year';
        break;
    case 3:
        $orderby = 'length';
        break;
    case 4:
        $orderby = 'rating DESC';
        break;
}



$pdo = connectToDb();
$query = $pdo->prepare
(
    'SELECT count(*) as quantity
     FROM movies'

);
$query->execute();
$q = $query->fetch(PDO::FETCH_ASSOC);
$pageCount = ceil($q['quantity'] / 5);

$pdo = connectToDb();
$pageIndex = 1;
$from = 0;
if (isset($_GET['page'])){
    $pageIndex = $_GET['page'];
    $from = ($pageIndex-1) * 5;
}


$query = $pdo->prepare
(
    'SELECT * FROM movies ORDER BY '.$orderby.' LIMIT 5 OFFSET '.$from

);
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);

$query3 = $pdo->prepare
(
    'SELECT movies.id, actors.actorId, actors.LastName, actors.FirstName FROM movies INNER JOIN moviedetails ON movies.id = moviedetails.movieId INNER JOIN actors ON actors.actorId = moviedetails.actorId'

);
$query3->execute();
$actors = $query3->fetchAll(PDO::FETCH_ASSOC);




$pdo2 = connectToDb();
$query2 = $pdo->prepare
(
    'SELECT * FROM genres'

);
$query2->execute();
$genres = $query2->fetchAll(PDO::FETCH_ASSOC);




include 'index.view.php';

 ?>
