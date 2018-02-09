<?php

include 'functions.php';


if (isset($_GET['film_id'])) {
    $movieId = $_GET['film_id'];
    $userName = $_POST['username'];
    $commentText = $_POST['comment_text'];
}

$pdo = connectToDb();
$sql = 'INSERT INTO comments (userName, movieId, commentText) VALUES ("'.$userName.'", "'.$movieId.'", "'.$commentText.'")';
$query = $pdo->prepare($sql);
$query->execute();

echo "Dėkojame, Jūsų komentaras priimtas.";
sleep(2);

header("Refresh:1; url = one_movie.php?one_id=".$movieId);


 ?>
