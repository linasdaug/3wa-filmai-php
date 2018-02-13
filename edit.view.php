<?php include 'header.php'; ?>




<?php if (isset($_GET['upd_id'])) { ?>
<form action="update.php?upd_id=<?=$_GET['upd_id']?>" method="post">
<?php } else { ?>
<form action="save.php" method="post">
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

    };
        $pdo2 = connectToDb();
        $sql2 = 'SELECT * FROM genres';
        $query2 = $pdo2->prepare($sql2);
        $query2->execute();
        $genres = $query2->fetchAll(PDO::FETCH_ASSOC);

        $pdo3 = connectToDb();
        $sql3 = 'SELECT * FROM actors';
        $query3 = $pdo3->prepare($sql3);
        $query3->execute();
        $actors = $query3->fetchAll(PDO::FETCH_ASSOC);


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
        <p style="margin-left: 20px"><?= number_format($edit_movie['rating'], 1, '.', '')?></p>
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
        </select><br>

        <label for="actors">Aktoriai</label><br>
        <select class="" name="actors[]" multiple>
            <?php foreach ($actors as $actor): ?>
                <option value="<?= $actor['actorId'] ?>"><?= $actor['FirstName'], ' ', $actor['LastName'] ?></option>
            <?php endforeach; ?>
        </select>


        <br>
        <button class="mygtukas" type="submit">Siųsti</button>

</div>



</form>
