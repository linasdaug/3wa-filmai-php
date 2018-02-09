<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="crud.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <div class="container">


        <?php
        $title = $one_movie['title'];
        $description = $one_movie['description'];
        $image = $one_movie['image'];
        $year = $one_movie['year'];
        $rating = $one_movie['rating'];
        $video = $one_movie['video'];


        if ($image == null) {
            $img = "<div class='fakeimage'><i class='far fa-images'></i></div>";
            } else {
            $img = "<img class='img_one' src='img/".$image."'>";
        }

            if (strpos($video, 'youtube') !== false) {
                $str=$video;
                $str=str_replace('watch?v=', 'embed/', $str);
                } else {
                    $str="";
                }
        ?>

        <a class="mygtukas" href="index.php">Grįžti</a>


        <h1 class="one-movie-heading"> <?= $title ?> </h1>
        <div class="screens">
            <p><?= $img ?></p>
            <iframe width="400" height="240" src="<?= $str ?>?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <p><?= $description ?></p><br>
        <p>Metai: <?= $year ?></p>
        <p>Reitingas: <?= $rating ?></p>
        <br>



        <h4><em>Žiūrovų komentarai</em></h4><br>
        <?php


        foreach ($one_movie_comments as $comment):
            if (!($comment['userName']==null)){
            echo "<em>".htmlspecialchars($comment['userName']).":</em> ";
            echo "<span class='comment-time'>".$comment['commentDate']."</span><br>";
            echo "<p class='readercomment'>".$comment['commentText']."</p><br><br>";
            }
        endforeach; ?>





        <div class="comments-block">
            <br>
            <form class="comments" action="addcomment.php?film_id=<?=$one_movie['id']?>" method="post">
                <h4><em>Pridėti komentarą</em></h4><br>
                <label for="username">Vardas:</label><br><br>
                <input type="text" name="username" value=""><br><br>
                <label for="comment_text">Komentaras:</label><br><br>
                <textarea rows="6" cols="100" type="text" name='comment_text'>Jūsų atsiliepimas apie filmą...</textarea><br><br>
                <button class="mygtukas" type="submit">Siųsti</button>

            </form>
        </div>

    </div>
