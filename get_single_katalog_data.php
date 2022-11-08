<?php
    require_once("database/db_conn.php");

    $data_katalog = mysqli_query($connection, "SELECT * FROM katalog WHERE id = ".$_POST['id_katalog']);
    $single_katalog_data = mysqli_fetch_assoc($data_katalog);
    echo json_encode($single_katalog_data);
?>