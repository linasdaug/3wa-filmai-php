<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="crud.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <section>


        <table class="standard-table">
            <caption>Filmai</caption>
            <thead>
                <tr>
                    <!-- <th class="centered">id</th> -->
                    <th <?php if ($orderIndex == 1){echo "class='checked'";} ?> ><a href="index.php?sort_id=1">Pavadinimas</a></th>
                    <th class="centered<?php if ($orderIndex == 2){echo ' checked';}?>"><a href="index.php?sort_id=2">Metai</a></th>
                    <th class="centered<?php if ($orderIndex == 3){echo ' checked';}?>"><a href="index.php?sort_id=3">Trukmė, min</a></th>
                    <th>Aprašymas</th>
                    <th class="centered<?php if ($orderIndex == 4){echo ' checked';}?>"><a href="index.php?sort_id=4">Reitingas</a></th>
                    <th class="centered">Stop kadras</th>
                    <!-- <th class="centered">Video</th> -->
                    <th><a class="mygtukas" href="create.php">Pridėti naują</a><th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($movies as $movie): ?>
                    <tr>

                        <td><strong><?= $movie['title'] ?></strong></td>
                        <td class="centered"><?=  $movie['year']?></td>
                        <td class="centered"><?= $movie['length'] ?></td>
                        <?php
                            $description = $movie['description'];
                            $words = explode(" ", $description, 20);
                            if (count($words) == 20) {
                            $words[19] = " ... <a href='one_movie.php?one_id=".$movie['id']."'>daugiau</a>";
                            };
                            $description = implode(" ", $words);

                            if (isset($_GET['fulldescription'])) {
                                    $full_id = $_GET['fulldescription'];
                                    if ($full_id == $movie['id']) {
                                        $description = $movie['description'];
                                        };
                                    };

                         ?>

                        <td><?= $description ?>  </td>
                        <td class="centered"><?= $movie['rating'] ?></td>

                    <?php
                        if ($movie['image'] == null) {
                            $img = "<div class='fakeimage'><i class='far fa-images'></i></div>";
                        } else {
                            $img = "<img src='img/".$movie['image']."'>";
                        }
                     ?>

                        <td><?= $img ?></td>


                        <!-- <td><iframe width="200" height="120" src="<?= $str ?>?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td> -->
                        <td class="mygtuku-laikiklis">
                            <a class="mazas" href="delete.php?del_id=<?=$movie['id']?> ">Ištrinti</a>
                            <a class="mazas" href="edit.view.php?upd_id=<?=$movie['id']?> ">Atnaujinti</a>
                            <a class="mazas" href="one_movie.php?one_id=<?=$movie['id']?> ">Komentuoti</a>
                        </td>

                    </tr>
                <?php endforeach ?>



            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i=1; $i<=$pageCount; $i++): ?>
                <a href="index.php?page=<?= $i?>&sort_id=<?= $orderIndex ?>"
                    <<?php if ($pageIndex == $i) {echo " class='active'";} ?>><?= $i?>
                </a>
            <?php endfor ?>

        </div>


    </section>
</body>
</html>
