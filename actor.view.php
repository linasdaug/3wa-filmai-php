<?php

include 'header.php';


 ?>

<div class="container">

    <div class="actorinfo clearfix">

        <h1 class="one-movie-heading"><?= $actor['FirstName']?> <?=$actor['LastName']?></h1>
        <img src="img/<?=$actor['actorPhoto']?>" alt="" style="float: left; margin-right: 20px">
        <p><?=$actor['description']?></p>

    </div>
     <h3> Vaidino filmuose: </h3>

             <table class="standard-table">

                 <thead>
                     <tr>
                         <!-- <th class="centered">id</th> -->
                         <th <?php if ($orderIndex == 1){echo "class='checked'";} ?> ><a href="index.php?sort_id=1">Pavadinimas</a></th>
                         <th class="centered<?php if ($orderIndex == 2){echo ' checked';}?>"><a href="index.php?sort_id=2">Metai</a></th>
                         <th class="centered<?php if ($orderIndex == 3){echo ' checked';}?>"><a href="index.php?sort_id=3">Trukmė, min</a></th>
                         <th>Aprašymas</th>
                         <th class="centered<?php if ($orderIndex == 4){echo ' checked';}?>"><a href="index.php?sort_id=4">Reitingas</a></th>
                         <th class="centered">Stop kadras</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach($actorsfilms as $movie): ?>
                         <tr>

                             <td><a href="one_movie.php?one_id=<?=$movie['id']?>"><strong><?= $movie['title'] ?></strong></a>

                                 <?php
                                 $gen = "";
                                 foreach ($genres as $genre) {
                                     if ($movie['genreId'] == $genre['genreId']) {
                                         $gen = $genre['genre'];
                                     }
                                 }
                                 ?>
                                 <br><span class='td-genre'><?= $gen ?></span></td>

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
                             <td class="centered"><?= number_format($movie['rating'], 1, '.', '') ?></td>

                         <?php
                             if ($movie['image'] == null) {
                                 $img = "<div class='fakeimage'><i class='far fa-images'></i></div>";
                             } else {
                                 $img = "<img src='img/".$movie['image']."'>";
                             }
                          ?>

                             <td><?= $img ?></td>


                         </tr>
                     <?php endforeach ?>



                 </tbody>
             </table>





</div>
