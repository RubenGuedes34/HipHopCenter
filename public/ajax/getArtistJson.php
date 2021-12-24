
<?php

$conn =  pg_connect("host=127.0.0.1 port=5432 dbname=HipHopCenter user=postgres password=postgres");

if(isset($_POST['artistId'])){
    $artistId = $_POST['artistId'];

    $query= pg_query($conn,"SELECT * FROM artists WHERE id='$artistId'");
    $resultArray = pg_fetch_array($query);
    echo json_encode($resultArray);
}

?>