<?php ob_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Tambah Produk</title>
    </head>
    <body class="body-add-update-product">
        <?php
            include_once('database/db_conn.php');
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="img/component/logo.png" width="120px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mt-lg-0 mt-3">
                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="index.php">Beranda</a>
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

        <div class="py-5 bg-light" style="margin-top: 60px; min-height: 330px;">

            <div class="container">
                <div class="card">
                    <form action="tambah_produk.php" method="post"  enctype="multipart/form-data" name="form_add_product">
                        <center>
                            <h3 class="mb-4 p-3 bg-info text-light">Tambah Data Produk</h3>
                        </center>
                        <div class="m-4">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Beri Nama Produk" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea class="form-control" rows="6" name="product_descriptions" placeholder="Beri Deskripsi Produk" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Kategori Produk</label>
                                        <select class="form-control" name="product_catalog" required>
                                            <option value="">-- Pilih --</option>
                                            <?php
                                                $data_kategori = mysqli_query($connection, "SELECT * FROM katalog");
                                                while($data = mysqli_fetch_array($data_kategori)){
                                            ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['nama_katalog'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Harga Produk</label>
                                        <input type="number" class="form-control" name="product_price" min="0" oninput="validity.valid||(value='');" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Stok Produk</label>
                                        <input type="number" class="form-control" name="product_stock" min="0" oninput="validity.valid||(value='');" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                    for($i=1; $i<=6; $i++){
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Gambar <?= $i ?><?= $i == 1 ? " <span class='text-danger'>(*Wajib - max 1MB)</span>" : " <span class='text-success'>(*Opsional - max 1MB)</span>" ?></label>
                                        <div class="d-flex justify-content-between">
                                            <input type="file" class="form-control-file" name="product_image_<?= $i ?>" id="product_image_<?= $i ?>" accept="image/png, image/gif, image/jpeg" style="cursor: pointer" <?= $i == 1 ? "required" : "" ?>>
                                            <button type="button" class="btn btn-sm btn-outline-danger" id="clear_image_<?= $i ?>" style="display: none;">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="d-flex justify-content-center">
                                <?php
                                    for($i=1; $i<=6; $i++){
                                ?>
                                <div class="add_product_image_container_preview p-2 my-lg-4 my-md-3 my-sm-2 my-1" id="add_product_image_container_preview_<?= $i ?>" style="display: none;">
                                    <img src="" alt="" id="add_product_image_preview_<?= $i ?>">
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="dropdown-divider mb-3"></div>
                            <div class="d-flex">
                                <a href="kelola.php" class="btn btn-secondary mr-2">Batal</a>
                                <button type="submit" name="add_product" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include_once("view_component/footer.php");
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/33e5fe568a.js" crossorigin="anonymous"></script>

        <script>
            $('#clear_image_1').on('click', function(){
                $('#clear_image_1').hide();
                $('#product_image_1').val(null);
                $('#add_product_image_preview_1').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_1').hide();
            });
            $('#clear_image_2').on('click', function(){
                $('#clear_image_2').hide();
                $('#product_image_2').val(null);
                $('#add_product_image_preview_2').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_2').hide();
            });
            $('#clear_image_3').on('click', function(){
                $('#clear_image_3').hide();
                $('#product_image_3').val(null);
                $('#add_product_image_preview_3').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_3').hide();
            });
            $('#clear_image_4').on('click', function(){
                $('#clear_image_4').hide();
                $('#product_image_4').val(null);
                $('#add_product_image_preview_4').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_4').hide();
            });
            $('#clear_image_5').on('click', function(){
                $('#clear_image_5').hide();
                $('#product_image_5').val(null);
                $('#add_product_image_preview_5').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_5').hide();
            });
            $('#clear_image_6').on('click', function(){
                $('#clear_image_6').hide();
                $('#product_image_6').val(null);
                $('#add_product_image_preview_6').fadeIn("fast").attr('src', '');
                $('#add_product_image_container_preview_6').hide();
            });

            $('#product_image_1').change( function(event) {
                $('#clear_image_1').show();
                $('#add_product_image_container_preview_1').show();
                $('#add_product_image_preview_1').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });
            $('#product_image_2').change( function(event) {
                $('#clear_image_2').show();
                $('#add_product_image_container_preview_2').show();
                $('#add_product_image_preview_2').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });
            $('#product_image_3').change( function(event) {
                $('#clear_image_3').show();
                $('#add_product_image_container_preview_3').show();
                $('#add_product_image_preview_3').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });
            $('#product_image_4').change( function(event) {
                $('#clear_image_4').show();
                $('#add_product_image_container_preview_4').show();
                $('#add_product_image_preview_4').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });
            $('#product_image_5').change( function(event) {
                $('#clear_image_5').show();
                $('#add_product_image_container_preview_5').show();
                $('#add_product_image_preview_5').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });
            $('#product_image_6').change( function(event) {
                $('#clear_image_6').show();
                $('#add_product_image_container_preview_6').show();
                $('#add_product_image_preview_6').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            });

        </script>
        
    </body>
</html>

<?php

    function upload_product_image($conn, $file, $id_produk){
        $img_name = $file['name'];
        $img_size = $file['size'];
        $tmp_name = $file['tmp_name'];
        $error = $file['error'];

        if ($error === 0) {
            if($img_size > 0){
                if ($img_size > 1024000) {
                    echo "Maaf, maksimal ukuran file adalah 1MB";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("PRODUCT-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'img/product/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        try{
                            mysqli_query($conn, "INSERT INTO foto_produk VALUES('', '$id_produk', '$img_upload_path');");
                        } catch(Exception $e){
                            $e->getMessage();
                        }
                    }else {
                        echo "Mohon gunakan file berekstensi .jpg, .jpeg, atau .png";
                    }
                }
            }
        }
    }

    if(isset($_POST['add_product'])){
        unset($_POST['add_product']);
        $nama = $_POST['product_name'];
        $deskripsi = $_POST['product_descriptions'];
        $kategori = $_POST['product_catalog'];
        $harga = $_POST['product_price'];
        $stok = $_POST['product_stock'];

        try{
            $insert_produk = mysqli_query($connection, "INSERT INTO produk VALUES ('', '$kategori', '$nama', '$deskripsi', '$harga', '$stok')");
            $product_id = mysqli_insert_id($connection);
            upload_product_image($connection, $_FILES['product_image_1'], $product_id);
            upload_product_image($connection, $_FILES['product_image_2'], $product_id);
            upload_product_image($connection, $_FILES['product_image_3'], $product_id);
            upload_product_image($connection, $_FILES['product_image_4'], $product_id);
            upload_product_image($connection, $_FILES['product_image_5'], $product_id);
            upload_product_image($connection, $_FILES['product_image_6'], $product_id);

            header("Location:kelola.php");
        } catch(Exception $e){
            $e->getMessage();
        }
    }

    mysqli_close($connection);
    ob_end_flush();
?>