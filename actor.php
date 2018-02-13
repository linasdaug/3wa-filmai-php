<?php


if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
}

include 'functions.php';

$pdo = connectToDb();
$sql = 'SELECT * FROM actors WHERE actorId = '.$aid;

$query = $pdo->prepare($sql);
$query->execute();
$actor = $query->fetch(PDO::FETCH_ASSOC);


$sql2 = 'SELECT id, title, description, year, rating, image, length, genreId FROM movies INNER JOIN moviedetails ON movies.id = moviedetails.movieId WHERE actorId = '.$aid;

$query2 = $pdo->prepare($sql2);
$query2->execute();
$actorsfilms = $query2->fetchAll(PDO::FETCH_ASSOC);




$query3 = $pdo->prepare(

    'SELECT * FROM genres'

);
$query3->execute();
$genres = $query3->fetchAll(PDO::FETCH_ASSOC);



include 'actor.view.php';

 ?>
