<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Detail Produk</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="img/component/logo.png" width="120px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mt-lg-0 mt-3">
                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="index.php">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="kelola.php">Kelola</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-lg-5" method="post" name="cari-produk" action="index.php#katalog">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari apa?" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </div>
        </nav>

        <?php
            include_once('database/db_conn.php');
            $data_produk = mysqli_fetch_assoc(mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog  FROM produk JOIN katalog ON produk.id_katalog = katalog.id where produk.id = ".$_GET['id_produk']));
            $first_foto = mysqli_query($connection, "SELECT * FROM foto_produk where id_produk = ".$_GET['id_produk']." LIMIT 1");
            $data_foto = mysqli_query($connection, "SELECT * FROM foto_produk where id_produk = ".$_GET['id_produk']);
        ?>

        <div class="container p-5" style="margin-top: 50px;">
            <a href="javascript:history.back()" class="btn btn-outline-dark"><span>Kembali</span></a>
            <div class="row mx-auto product-detail mt-3">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="w-100 product-photo-frame">
                        <img src="<?= mysqli_fetch_assoc($first_foto)['path'] ?>" alt="" class="w-100" id="main-product-photo">
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <?php
                            while($foto = mysqli_fetch_array($data_foto)){
                        ?>
                        <div class="image-preview-option mx-1 my-3">
                            <img src="<?= $foto['path'] ?>" alt="" onclick="switchImage(`<?= $foto['path'] ?>`)">
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <span class="product-name"><?= $data_produk['nama_produk'] ?></span>
                    <div class="my-3">
                        <span class="price-detail">Kategori : <?= $data_produk['nama_katalog'] ?></span>
                    </div>
                    <div class="my-3">
                        <span class="price-detail">Harga : Rp. <?= number_format($data_produk['harga'], 0, ',', '.') ?></span>
                    </div>
                    <div class="my-3">
                        <span class="price-detail">Stok : <?= $data_produk['stok'] ?></span>
                    </div>
                    <form>
                        <div class="form-group my-5">
                            <label for="exampleInputEmail1">Kuantitas</label>
                            <input type="number" class="form-control col-6" name="test_name" min="1" max="<?= $data_produk['stok'] ?>" value="1" oninput="validity.valid||(value='1');" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-outline-dark w-100 mb-lg-0 mb-md-0 mb-sm-0 mb-2">Tambah Ke Keranjang</button>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-dark w-100"><i class="fas fa-heart" style="font-size: 1em;"></i></button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-dark w-100">Beli Sekarang</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="py-4 px-lg-3 px-md-2 px-sm-1 px-0 mx-auto product-detail">
                <h3 class="price-detail">Deskripsi Produk</h3>
                <p class="product-description mt-4"><?= nl2br($data_produk['deskripsi']) ?></p>
            </div>
        </div>

        <?php
            include_once("view_component/footer.php");
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/33e5fe568a.js" crossorigin="anonymous"></script>

        <script>
            function switchImage(path){
                document.getElementById("main-product-photo").src=path;
            }
        </script>
    </body>
</html>