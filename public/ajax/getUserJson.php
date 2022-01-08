
<?php

$conn =  pg_connect("host=127.0.0.1 port=5432 dbname=HipHopCenter user=postgres password=postgres");

if(isset($_POST['userId'])){
    $userId = $_POST['userId'];

    $query= pg_query($conn,"SELECT * FROM users WHERE id='$userId'");
    $resultArray = pg_fetch_array($query);
    echo json_encode($resultArray);
}

?>