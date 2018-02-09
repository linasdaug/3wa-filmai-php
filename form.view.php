

<?php
    include 'functions.php';
    if (isset($_GET['upd_id'])) {
        $id = $_GET['upd_id'];
        $pdo = connectToDb();
        $sql = 'SELECT * FROM movies WHERE id='.$id;
        $query1 = $pdo->prepare($sql);
        $query1->execute();
        $movie = $query->fetchAll(PDO::FETCH_ASSOC);
    }


 ?>


<div class="form-group">

        <h1>Įvesti / atnaujinti filmą</h1><br>
        <label for="title">Pavadinimas</label><br>
        <input type="text" name="title" value="<?=$_GET['title']?>">
        <br>
        <label for="description">Aprašymas</label><br>
        <textarea rows="4" cols="60" type="text" name="description" value="<?=$_GET['description']?>"></textarea>
        <br>
        <label for="length">Trukmė</label><br>
        <input type="number" name="length" value="<?=$_GET['length']?>" step="1">
        <br>
        <label for="year">Metai</label><br>

        <select class="" name="year">
            <?php for ($i=1970; $i <= 2018; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>

        </select>

        <br>
        <label for="rating">Reitingas</label><br>
        <input type="number" name="rating" value="<?=$_GET['rating']?>">
        <br>
        <label for="image">Stop kadras</label><br>
        <input type="file" name="image" value="<?=$_GET['image']?>">
        <br><br>
        <button class="mygtukas" type="submit">Siųsti</button>

</div>
