<?php

include 'functions.php';

$pdo = connectToDb();


if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $sql = "DELETE FROM movies WHERE id=".$id;
}

$query = $pdo->prepare($sql);
$query->execute();

header("Refresh:1; url = index.php");


 ?>
