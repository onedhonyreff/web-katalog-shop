<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Web Katalog Batik</title>
    </head>
    <body>
        <?php
            $current_keyword = '';
            if(isset($_POST['keyword'])){
                $current_keyword = $_POST['keyword'];
            }

            $id_katalog = 0;
            if(isset($_GET['katalog'])){
                $id_katalog = $_GET['katalog'];
            }
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="img/component/logo.png" width="120px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mt-lg-0 mt-3">
                    <li class="nav-item mx-lg-3 active">
                        <a class="nav-link" href="index.php">
                            Beranda
                            <div class="nav-active-indicator" style="width: 100%; height:2px; background-color: antiquewhite"></div>
                        </a>
                    </li>
                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="kelola.php">Kelola</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-lg-5" method="post" name="cari-produk" action="index.php#katalog">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari apa?" aria-label="Search" name="keyword" value="<?= $current_keyword ?>">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </div>
        </nav>

        <div class="jumbo-tron d-flex justify-content-end align-items-center p-lg-5 p-md-4 p-3" style="margin-top: 60px;">
            <div class="jumbo-tron-content p-lg-5 p-md-3 p-sm-2">
                <center>
                    <img src="img/component/logo.png" alt="">
                    <p class="mt-lg-5 mt-md-4 mt-sm-3 mt-2">INGIN <span class="shading">TAMPIL</span> STYLISH DENGAN KEARIFAN <span class="shading">LOKAL</span>?</p>
                    <a href="#katalog" class="btn btn-outline-dark btn-sm">Belanja Sekarang</a>
                </center>
            </div>      
        </div>

        <div class="strip p-lg-2 p-lg-2 p-lg-2 p-1 d-flex justify-content-center">
            <span>100% Produk buatan Indonesia | Kualitas super | Harga terjangkau</span>
        </div>

        <div class="d-flex justify-content-center p-2 mt-lg-4 mt-md-4 mt-sm-2 mt-2" id="katalog">
            <span class="catalog-title">Katalog Produk</span>
        </div>

        <div class="table-responsive px-lg-4 px-md-3 px-sm-2 px-1 py-lg-3 py-md-3 py-sm-2 py-1">
            <table class="table catalog-table">
                <tr>
                    <td class="px-1" style="border: none !important;">
                        <a href="index.php#katalog">
                            <center>
                                <div class="card catalog-card bg-light p-lg-3 p-md-3 p-sm-3 p-2">
                                    <center>
                                        <div class="img-container">
                                            <img src="img/component/all.png" alt="">
                                        </div>
                                    </center>
                                    <p class="text-dark">All</p>
                                </div>
                                <?= $id_katalog == 0 ? '<div class="selected-catalog mt-1 bg-primary"></div>' : '';?>
                            </center>
                        </a>
                    </td>
                <?php

                    include_once('database/db_conn.php');
                    $data_katalog = mysqli_query($connection, "SELECT * FROM katalog");
                    while($katalog = mysqli_fetch_array($data_katalog)){
                ?>
                    <td class="px-1" style="border: none !important;">
                        <a href="index.php?katalog=<?= $katalog['id'] ?>#katalog">
                            <center>
                                <div class="card catalog-card bg-light p-lg-3 p-md-3 p-sm-3 p-2">
                                    <center>
                                        <div class="img-container">
                                            <img src="<?= $katalog['gambar'] ?>" alt="">
                                        </div>
                                    </center>
                                    <p class="text-dark"><?= $katalog['nama_katalog'] ?></p>
                                </div>
                                <!-- <div class="selected-catalog mt-1 bg-primary"></div> -->
                                <?= $id_katalog == $katalog['id'] ? '<div class="selected-catalog mt-1 bg-primary"></div>' : '';?>
                            </center>
                        </a>
                    </td>
                <?php
                    }
                ?>
                </tr>
            </table>
        </div>
        <?php
            $data_produk = null;
            if(isset($_POST['keyword'])){
                $data_produk = mysqli_query($connection, "SELECT * FROM produk WHERE nama_produk LIKE '%".$_POST['keyword']."%'");
            } else{
                if($id_katalog != 0){
                    $data_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id_katalog = ".$id_katalog);
                } else{
                    $data_produk = mysqli_query($connection, "SELECT * FROM produk");
                }
            }
        ?>
        <div class="row p-lg-3 p-md-3 p-sm-2 p-2 mx-0 mb-4 w-100 bg-light">
            <?php
                if(mysqli_num_rows($data_produk) > 0){
                    while($data = mysqli_fetch_array($data_produk)){
                        $product_image = '';
                        $data_product_image = mysqli_query($connection, "SELECT * FROM foto_produk WHERE id_produk = ".$data['id']);
                        while($mProduct_image = mysqli_fetch_array($data_product_image)){
                            $product_image = $mProduct_image['path'];
                            break;
                        }
            ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 p-lg-2 p-md-2 p-sm-2 p-1">
                <div class="card product-card my-lg-2 my-md-2 my-sm-1 my-1">
                    <div class="tail-photo">
                        <img src="<?= $product_image ?>" alt="">
                    </div>
                    <div class="p-3">
                        <div class="w-100 d-flex flex-column">
                            <div style="height: 50px;">
                                <span class="tail-text mb-2"><?= $data['nama_produk'] ?></span>
                            </div>
                            <span class="tail-text mb-2 text-success">Rp. <?= number_format($data['harga'], 0, ',', '.') ?></span>
                        </div>
                        <a href="detail_produk.php?id_produk=<?= $data['id'] ?>" class="mt-lg-0 btn btn-outline-dark btn-sm" style="width: 100%;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else{
            ?>
            <div class="w-100 d-flex justify-content-center m-5">
                <span class="no-data">Oops... No data found!</span>
            </div>
            <?php
                }
            ?>
        </div>

        <?php
            include_once("view_component/footer.php");
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/33e5fe568a.js" crossorigin="anonymous"></script>
    </body>
</html>