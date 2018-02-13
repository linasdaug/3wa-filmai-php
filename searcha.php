<?php
    include 'functions.php';

    if (isset($_POST['search']) && (strlen($_POST['search']) > 0)) {

    $search = $_POST['search'];

    $results = searchActor($search);

    echo json_encode($results);
    // var_dump($res);

} else {
    $results = [];
    echo json_encode($results);
}
?>
