<?php

if (isset($_POST['v_id'])) {
    $vote = $_POST['v_id'];
}

$vote = $_POST['vote'];
$id = $_GET['v_id'];
$oldRating = $_GET['rating'];
$votesCount = $_GET['votesCount'];


$newRating = ($oldRating*$votesCount + $vote) / ($votesCount + 1);
$votesCount++;

include 'functions.php';

$pdo = connectToDb();

$sql = 'UPDATE movies SET rating="'.$newRating.'", numOfVotes="'.$votesCount.'" WHERE id='.$id.';';


$query = $pdo->prepare($sql);
$query->execute();


header("Refresh:1; url = one_movie.php?one_id=".$id);



 ?>
