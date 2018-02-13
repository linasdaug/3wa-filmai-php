<?php


error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');



if (isset($_GET['one_id'])) {
    $id = $_GET['one_id'];
} else {
    $id = 1;
}


include 'functions.php';

$pdo = connectToDb();
$sql = 'SELECT * FROM movies WHERE id = '.$id;

$query = $pdo->prepare($sql);
$query->execute();
$one_movie = $query->fetch(PDO::FETCH_ASSOC);



$pdo2 = connectToDb();
$sql2 = 'SELECT * FROM comments WHERE movieId = '.$id;

$query2 = $pdo->prepare($sql2);
$query2->execute();
$one_movie_comments = $query2->fetchAll(PDO::FETCH_ASSOC);


$pdo3 = connectToDb();
$sql3 = 'SELECT actors.FirstName, actors.LastName, actors.actorId FROM actors INNER JOIN moviedetails ON actors.actorId = moviedetails.actorId WHERE moviedetails.movieId = '.$id;

$query3 = $pdo3->prepare($sql3);
$query3->execute();
$one_movie_actors = $query3->fetchall(PDO::FETCH_ASSOC);


include 'one_movie.view.php';
