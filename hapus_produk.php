<?php
    ob_start();
    require_once("database/db_conn.php");
    $id_produk = $_GET['id_produk'];
    if(mysqli_query($connection, "DELETE FROM produk WHERE id = ".$id_produk)){
        $get_all_product = mysqli_query($connection, "SELECT * FROM foto_produk WHERE id_produk IS NULL");
        while($data_photo = mysqli_fetch_array($get_all_product)){
            unlink($data_photo['path']);
        }
        mysqli_query($connection, "DELETE FROM foto_produk WHERE id_produk IS NULL");
    }

    header("Location:kelola.php");
    ob_end_flush();
?>