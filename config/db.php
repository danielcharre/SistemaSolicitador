<?php 

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "xdb";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(mysqli_connect_error()) {
        echo "Falha ao conectar " . mysqli_connect_error();
    }

    mysqli_set_charset($conn, "utf8mb4");

?>