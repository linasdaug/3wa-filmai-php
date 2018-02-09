<?php

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
$one_movie_comments = $query2->fetchall(PDO::FETCH_ASSOC);




include 'one_movie.view.php';
