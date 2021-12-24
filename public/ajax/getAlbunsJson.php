
<?php

$conn =  pg_connect("host=127.0.0.1 port=5432 dbname=hiphopcenter_final user=postgres password=postgres");

if(isset($_POST['albunsId'])){
    $albumId = $_POST['albunsId'];

    $query= pg_query($conn,"SELECT * FROM albums WHERE id='$albumId'");
    $resultArray = pg_fetch_array($query);
    echo json_encode($resultArray);
}

?>