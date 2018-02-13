


    <?php include 'header.php' ?>

<body>
    <div class="container">


        <?php
        $title = $one_movie['title'];
        $description = $one_movie['description'];
        $image = $one_movie['image'];
        $year = $one_movie['year'];
        $rating = $one_movie['rating'];
        $video = $one_movie['video'];
        $votes = $one_movie['numOfVotes'];

        $actors = $one_movie_actors;

        if ($image == null) {
            $img = "<div class='fakeimage-one_movie'><i class='far fa-images'></i></div>";
            } else {
            $img = "<img class='img_one' src='img/".$image."'>";
        }

            if (strpos($video, 'youtube') !== false) {
                $str=$video;
                $str=str_replace('watch?v=', 'embed/', $str);
                } else {
                    $str=null;
                }
        ?>




        <h1 class="one-movie-heading"> <?= $title ?> </h1>
        <div class="screens">
            <p><?= $img ?></p>

            <?php  if (strpos($video, 'youtube') == false): ?>
                    <div class='fakeimage-one_movie'><i class='far fa-images'></i></div>
            <?php     else:   ?>
                    <iframe width="400" height="240" src="<?= $str ?>?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <?php    endif  ?>


        </div>
        <p><?= $description ?></p>
        <?php
            $str_actors = 'Vaidina:';
            foreach ($actors as $actor) {
                $str_actors = $str_actors.' <a href=actor.php?aid='.$actor["actorId"].'>'.$actor['FirstName'].' '.$actor['LastName'].'</a>,';
            }
            $str_actors = substr($str_actors, 0, -1).'.';
         ?>

         <p><?= $str_actors ?></p>

        <p>Metai: <?= $year ?></p>
        <p>Reitingas: <?= number_format($rating, 1, '.', '') ?></p><p class='votes'> (balsavo: <?= $votes ?>) </p>
        <br>



        <form class="" action="voting.php?v_id=<?=$one_movie['id']?>&rating=<?= $rating ?>&votesCount=<?=$votes?>"method="post">
            <label for="vote">Jūsų reitingas: </label>
            <input type="number" name="vote" value="<?= number_format($rating, 1, '.', '') ?>" step="1" min="1" max="10"> </input>
            <button type="submit" name="button">Balsuoti</button>
        </form>


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
