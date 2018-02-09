<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="crud.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>




<?php if (isset($_GET['upd_id'])) { ?>
<form action="update.php?upd_id=<?=$_GET['upd_id']?>" method="post" enctype="multipart/form-data">
<?php } else { ?>
<form action="save.php" method="post" enctype="multipart/form-data">
<?php };?>


<?php
    include 'functions.php';
    if (isset($_GET['upd_id'])) {
        $id = $_GET['upd_id'];
        $pdo = connectToDb();
        $sql = 'SELECT * FROM movies WHERE id='.$id;
        $query = $pdo->prepare($sql);
        $query->execute();
        $edit_movie = $query->fetch(PDO::FETCH_ASSOC);


        $pdo2 = connectToDb();
        $sql2 = 'SELECT * FROM genres';
        $query2 = $pdo2->prepare($sql2);
        $query2->execute();
        $genres = $query2->fetchAll(PDO::FETCH_ASSOC);

    }
 ?>


<div class="form-group">

        <h1>Įvesti / atnaujinti filmą</h1><br>
        <label for="title">Pavadinimas</label><br>
        <input type="text" name="title" value="<?=$edit_movie['title']?>">
        <br>
        <label for="description">Aprašymas</label><br>
        <textarea rows="4" cols="60" type="text" name="description"><?= $edit_movie['description'] ?></textarea>
        <br>
        <label for="length">Trukmė</label><br>
        <input type="number" name="length" value="<?=$edit_movie['length']?>" step="1">
        <br>
        <label for="year">Metai</label><br>

        <select class="" name="year">
            <?php for ($i=1970; $i <= 2018; $i++): ?>
                <option value="<?= $i ?>"
                    <?php
                    if ($i==$edit_movie['year']) {
                        echo ' selected';
                    }
                    ?>
                    ><?= $i ?></option>
            <?php endfor; ?>

        </select>

        <br>
        <label for="rating">Reitingas</label><br>
        <input type="number" name="rating" value="<?=$edit_movie['rating']?>">
        <br>
        <label for="image">Stop kadras</label><br>
        <input type="text" name="image" id="kadras" value="<?=$edit_movie['image']?>">
        <br>
        <label for="video">Video</label><br>
        <input type="text" name="video" value="<?=$edit_movie['video']?>">
        <br>

        <label for="genre">Žanras</label><br>
        <select class="" name="genre">
            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre['genreId'] ?>"
                    <?php if ($genre['genreId'] == $edit_movie['genreId']) {echo " selected";}  ?>
                    ><?= $genre['genre'] ?></option>
            <?php endforeach; ?>
        </select>


        <br>
        <button class="mygtukas" type="submit">Siųsti</button>

</div>



</form>
