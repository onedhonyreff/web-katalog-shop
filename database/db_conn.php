<?php

$server_name    = 'localhost';
$database       = 'web_katalog';
$username       = 'root';
$pass           = '';

$connection = mysqli_connect($server_name, $username, $pass, $database);

if(!$connection){
    die("Gagal menyambungkan dengan database!. Error : ". mysqli_connect_error());
}

?>