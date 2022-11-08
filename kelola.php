<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Halaman Pengelolaan</title>
    </head>
    <body>
        <?php
            include_once('database/db_conn.php');

            $current_manage_filter = '';
            $current_manage_seacrh = '';
            if(!isset($_POST['view_all'])){
                $current_manage_filter = isset($_POST['manage_filter']) ? $_POST['manage_filter'] : '';
                $current_manage_seacrh = isset($_POST['manage_search']) ? $_POST['manage_search'] : '';
            }
            
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
                    <li class="nav-item active mx-lg-3">
                        <a class="nav-link" href="kelola.php">
                            Kelola
                            <div class="nav-active-indicator" style="width: 100%; height:2px; background-color: antiquewhite"></div>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-lg-5" method="post" name="cari-produk" action="index.php#katalog">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari apa?" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </div>
        </nav>

        <div class="py-5 bg-light" style="margin-top: 60px; min-height: 330px;">
            <div class="py-3 mb-4 bg-light">
                <center class="container">
                    <h4 class="manage-divider">Kelola Kategori</h4>
                </cent>
            </div>
            <div class="container">
                <div class="row px-2">
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3 p-1">
                        <div class="card manage-catalog-card add_catagory_card p-lg-3 p-md-3 p-sm-4 p-4 w-100 d-flex flex-column" type="button" data-toggle="modal" data-target="#exampleModal">
                            <center>
                                <div class="manage-img-container mb-2">
                                    <img src="img/component/add_catalog.png" class="mb-2" alt="">
                                </div>
                                <p class="mb-0">Tambah Katalog</p>
                            </center>
                        </div>
                    </div>
                    <?php
                        $data_katalog = mysqli_query($connection, "SELECT * FROM katalog ORDER BY id DESC");
                        while($data = mysqli_fetch_array($data_katalog)){
                    ?>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3 p-1">
                        <div class="card manage-catalog-card content_catagory_card p-lg-3 p-md-3 p-sm-4 p-4 w-100 d-flex flex-column" data-id="<?= $data['id'] ?>"  type="button" data-toggle="modal" data-target="#exampleModal">
                            <center>
                                <div class="manage-img-container mb-2">
                                    <img src="<?= $data['gambar'] ?>" alt="">
                                </div>
                                <p class="mb-0"><?= $data['nama_katalog'] ?></p>
                            </center>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="py-3 my-4 bg-light">
                <center class="container">
                    <h4 class="manage-divider">Kelola Produk</h4>
                </center>
            </div>
            <div class="container">
                <div class="d-flex flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row justify-content-between my-3">
                    <div class="d-flex justify-content-center my-2">
                        <a href="tambah_produk.php" class="btn btn-dark btn-sm mx-auto">Tambah Produk</a>    
                    </div>
                    <form method="post" name="cari-produk" action="kelola.php" class="d-flex flex-column flex-sm-column flex-md-row flex-lg-row w-100 justify-content-end">
                        <div class="d-flex mx-lg-1 mx-md-1 mx-sm-auto mx-auto my-2">
                            <label for="inputState" class="mr-2">Filter</label>
                            <div class="form-inline mr-2">
                                <select id="inputState" class="form-control form-control-sm" name="manage_filter">
                                    <option value="nama" <?= $current_manage_filter == "nama" ? 'selected' : '' ?>>Nama</option> 
                                    <option value="deskripsi" <?= $current_manage_filter == "deskripsi" ? 'selected' : '' ?>>Deskripsi</option>
                                    <option value="kategori" <?= $current_manage_filter == "kategori" ? 'selected' : '' ?>>Kategori</option>
                                    <option value="harga" <?= $current_manage_filter == "harga" ? 'selected' : '' ?>>Harga</option>
                                    <option value="stok" <?= $current_manage_filter == "stok" ? 'selected' : '' ?>>Stok</option>
                                </select>
                            </div>
                            <div class="form-inline">
                                <input class="form-control form-control-sm" type="search" name="manage_search" placeholder="Cari produk" aria-label="Search" value="<?= $current_manage_seacrh ?>">
                            </div>
                        </div>
                        <div class="d-flex ml-lg-1 ml-md-1 ml-sm-0 ml-0 mx-lg-0 mx-md-0 mx-sm-auto mx-auto my-2">
                            <button class="btn btn-dark btn-sm mr-2" type="submit">Terapkan</button>
                            <button class="btn btn-dark btn-sm mx-auto" type="submit" name="view_all">Tampilkan Semua</button>
                        </div>
                    </form>
                </div>
    
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th style="width: 30px;"><div class="data-product-header">No</div></th>
                                <th style="width: 250px;"><div class="data-product-header">Nama Produk</div></th>
                                <th style="width: 350px;"><div class="data-product-header">Deskripsi</div></th>
                                <th style="width: 180px;"><div class="data-product-header">Kategori</div></th>
                                <th style="width: 100px;"><div class="data-product-header">Harga</div></th>
                                <th style="width: 80px;"><div class="data-product-header">Stok</div></th>
                                <th style="width: 130px;"><div class="data-product-header">Aksi</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($current_manage_seacrh != ''){
                                    if($current_manage_filter == "nama"){
                                        $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id WHERE produk.nama_produk LIKE '%".$current_manage_seacrh."%' ORDER BY produk.id DESC");
                                    } elseif($current_manage_filter == "kategori"){
                                        $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id WHERE katalog.nama_katalog LIKE '%".$current_manage_seacrh."%' ORDER BY produk.id DESC");
                                    } elseif($current_manage_filter == "deskripsi"){
                                        $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id WHERE produk.deskripsi LIKE '%".$current_manage_seacrh."%' ORDER BY produk.id DESC");
                                    } elseif($current_manage_filter == "harga"){
                                        $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id WHERE produk.harga LIKE '%".$current_manage_seacrh."%' ORDER BY produk.harga ASC");
                                    } elseif($current_manage_filter == "stok"){
                                        $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id WHERE produk.stok LIKE '%".$current_manage_seacrh."%' ORDER BY produk.stok ASC");
                                    }
                                } else{
                                    $data_produk = mysqli_query($connection, "SELECT produk.*, katalog.nama_katalog FROM produk LEFT JOIN katalog ON produk.id_katalog = katalog.id ORDER BY produk.id DESC");
                                }
                                $count = 0;
                                while($data = mysqli_fetch_array($data_produk)){
                                    $count++;
                            ?>
                            <tr>
                                <td style="width: 30px;"><div class="data-product-column"><?= $count."." ?></div></td>
                                <td style="width: 250px;"><div class="data-product-column"><?= $data['nama_produk'] ?></div></td>
                                <td style="width: 350px;"><div class="data-product-column"><?= $data['deskripsi'] ?></div></td>
                                <td style="width: 180px;"><div class="data-product-column"><?= $data['nama_katalog'] ?></div></td>
                                <td style="width: 100px;"><div class="data-product-column"><?= $data['harga'] ?></div></td>
                                <td style="width: 80px;"><div class="data-product-column"><?= $data['stok'] ?></div></td>
                                <td style="width: 130px;">
                                    <div class="d-flex">
                                        <a href="edit_produk.php?id_produk=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm ml-1" onclick="delete_product_confirmation(<?= $data['id'] ?>)">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                                mysqli_close($connection);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
            include_once("view_component/footer.php");
        ?>

        <!-- Modal Kategori-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kategoriModalLabel">Tambah Data Katalog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-kategori">
                        <form action="tambah_katalog.php" method="post" enctype="multipart/form-data" name="form_add_catalog">
                        <input type="hidden" name="catalog_id" id="id-kategori">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama-kategori" name="catalog_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Beri nama kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
                                <textarea class="form-control" id="deskripsi-kategori" name="catalog_descriptions" id="exampleFormControlTextarea1" rows="2" placeholder="Beri deskripsi kategori"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="upload-catalog-image" id="form-catalog-image-label">Gambar Kategori</label><br>
                                <input type="file" name="catalog_image" id="upload-catalog-image" accept="image/png, image/gif, image/jpeg" style="cursor: pointer" required>
                            </div>
                            <div class="w-25 mx-auto">
                                <img src="" style="display:none; width: 100%" id="catalog-image-preview">
                            </div>
                    </div>
                    <div class="modal-footer modal-footer-kategori">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-secondary-submit" onclick="delete_catalog_confirmation(catalog_id.value)">Hapus Kategori</button>
                        <button type="submit" class="btn btn-primary btn-primary-submit" name="submit-catalog">Tambah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/33e5fe568a.js" crossorigin="anonymous"></script>

        <script>
            function delete_catalog_confirmation(idKatalog){
                if(confirm('Apakah anda ingin menghapus kategori ini?')){
                    window.location.href = 'edit_katalog.php?catalog_id=' + idKatalog;
                }
            }

            function delete_product_confirmation(idProduk){
                if(confirm('Apakah anda ingin menghapus produk ini?')){
                    window.location.href = 'hapus_produk.php?id_produk=' + idProduk;
                }
            }

            $(document).ready(function(){
                $('#upload-catalog-image').change( function(event) {
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    $('#catalog-image-preview').fadeIn("fast").attr('src', tmppath);
                });
    
                $('.add_catagory_card').on('click', function(){
                    $('#kategoriModalLabel').html('Tambah Data Kategori');
                    $('.modal-footer-kategori .btn-secondary-submit').hide();
                    $('.modal-footer-kategori .btn-primary-submit').html('Tambah Kategori');
                    $('#form-catalog-image-label').html('Gambar Kategori');
                    $('#upload-catalog-image').prop('required', true);
                    $('.modal-body-kategori form').attr('action', 'http://localhost/freeclass_eduwork/tugas_web_katalog/tambah_katalog.php');
                        
                    $('#id-kategori').val('');
                    $('#nama-kategori').val('');
                    $('#deskripsi-kategori').val('');
                    $('#catalog-image-preview').fadeIn("fast").attr('src', '');
                });
    
                $('.content_catagory_card').on('click', function(){
                    $('#kategoriModalLabel').html('Edit Data Kategori');
                    $('.modal-footer-kategori .btn-secondary-submit').show();
                    $('.modal-footer-kategori .btn-primary-submit').html('Edit Kategori');
                    $('#form-catalog-image-label').html('Gambar Kategori *(opsional saat perubahan data)');
                    $('#upload-catalog-image').prop('required', false);
                    $('.modal-body-kategori form').attr('action', 'http://localhost/freeclass_eduwork/tugas_web_katalog/edit_katalog.php');
    
                    const id = $(this).data('id');
                    console.log(id);
        
                    $(function () {
                        $.ajax({
                            url: 'http://localhost/freeclass_eduwork/tugas_web_katalog/get_single_katalog_data.php',
                            cache : false,
                            data: {id_katalog: id},
                            method: 'post',
                            dataType: 'json',
                            success: function(data) {
                                $('#id-kategori').val(data.id);
                                $('#nama-kategori').val(data.nama_katalog);
                                $('#deskripsi-kategori').val(data.deskripsi);
                                $('#catalog-image-preview').fadeIn("fast").attr('src', 'http://localhost/freeclass_eduwork/tugas_web_katalog/' + data.gambar);
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>