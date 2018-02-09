<?php

include 'functions.php';
$id = $_GET['upd_id'];

$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['year'];
$length = $_POST['length'];
$rating = $_POST['rating'];
$image = $_POST['image'];
$video = $_POST['video'];
$genreId = $_POST['genre'];


echo $genre;

$pdo = connectToDb();

$sql = 'UPDATE movies SET title="'.$title.'", description="'.$description.'", year="'.$year.'", length="'.$length.'", rating="'.$rating.'", image ="'.$image.'", video="'.$video.'", genreId="'.$genreId.'" WHERE id='.$id.';';




$query1 = $pdo->prepare($sql);
$query1->execute();


header("Refresh:1; url = index.php");




?>
