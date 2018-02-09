<?php

include 'functions.php';

$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['year'];
$length = $_POST['length'];
$rating = $_POST['rating'];
$image = $_POST['image'];
$video = $_POST['video'];


//failas
//
// var_dump($_FILES["image"]);
// die();
//
// $target_dir = "img/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     };
// $image = $_FILES["image"]["name"];




//failo pabaiga


$pdo = connectToDb();

$sql = 'INSERT INTO movies (title, description, year, length, rating, image, video) VALUES ("'.$title.'", "'.$description.'", "'.$year.'", "'.$length.'", "'.$rating.'", "'.$image.'", "'.$video.'")';



$query1 = $pdo->prepare($sql);
$query1->execute();


header("Refresh:1; url = index.php");




?>
