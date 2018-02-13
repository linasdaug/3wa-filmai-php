<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="crud.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

<div class="galva">

        <section class="headerbar">
            <div class="logo">
                <h2><a href="index.php"><i class="fa fa-film" aria-hidden="true"></i></a></h2>
            </div>
            <div class="promo">
                <h1>Auksinė kolekcija</h1>
                <p>Filmai, kurie veža</p>
            </div>
            <div class="searchbox">
                <?php echo "<p><em>Šiandien " . date("Y-m-d") . "</em></p><br>"; ?>

                <label for="name">Paieška pagal filmą</label><br>
                <input id="search_films" type="text" name="name" value="" placeholder="">
                <div id="search_results" class=""></div>

                <label for="name">Paieška pagal aktorių</label><br>
                <input id="search_actors" type="text" name="actors" value="" placeholder="">
                <div id="search_actors_results" class=""></div>


            </div>
        </section>

</div>

<script type="text/javascript">
    $('#search_films').keyup(function() {
        var search = $('#search_films').val();
        $("#search_results").empty();
            $.ajax({
            type: 'POST',
            url: 'search.php',
            dataType: 'json',
            data: {'search': search},
            // contentType: 'application/json; charset=utf-8',

            success: function (data) {

                let newul = $("<ul class='search-results-list'></ul>");

                for (var i = 0; i < data.length; i++) {
                    console.log(data[i].title);
                    let newan = $("<a href=''></a>").text(data[i].title);
                    newan.attr("href", "one_movie.php?one_id=" + data[i].id);
                    let newli = $("<li class='search_results_list_item'></li>");
                    newan.appendTo(newli);
                    newli.appendTo(newul);
                };
                newul.appendTo("#search_results");
            },
            error: function(data) {
                console.log('error ' + data);
            }
        });
    });


    $('#search_actors').keyup(function() {
        var search = $('#search_actors').val();
        console.log(search);
        $("#search_actors_results").empty();
            $.ajax({
            type: 'POST',
            url: 'searcha.php',
            dataType: 'json',
            data: {'search': search},
            success: function (data) {
                console.log(data);
                let newul = $("<ul class='search-results-list-actors'></ul>");

                for (var i = 0; i < data.length; i++) {

                    let newan = $("<a href=''></a>").text(data[i].FirstName + ' ' + data[i].LastName);
                    newan.attr("href", "actor.php?aid=" + data[i].actorId);
                    let newli = $("<li class='search_results_list_item'></li>");
                    newan.appendTo(newli);
                    newli.appendTo(newul);

                };
                newul.appendTo("#search_actors_results");
            },
            error: function(data) {
                // console.log('klaida');
            }
        });
    })



</script>
