<?php

include 'functions.php';

$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['year'];
$length = $_POST['length'];
$rating = $_POST['rating'];
$image = $_POST['image'];
$video = $_POST['video'];
$genreId = $_POST['genre'];

$pdo = connectToDb();

$sql = 'INSERT INTO movies (title, description, year, length, rating, image, video, genreId) VALUES ("'.$title.'", "'.$description.'", "'.$year.'", "'.$length.'", "'.$rating.'", "'.$image.'", "'.$video.'", "'.$genreId.'")';



$query = $pdo->prepare($sql);
$query->execute();


header("Refresh:1; url = index.php");




?>
