<?php 
    ob_start();

    include_once("database/db_conn.php");
    
    if(isset($_POST['submit-catalog']) && isset($_FILES['catalog_image'])){

        $nama_katalog = $_POST['catalog_name'];
        $deskripsi_katalog = $_POST['catalog_descriptions'];

        $img_name = $_FILES['catalog_image']['name'];
        $img_size = $_FILES['catalog_image']['size'];
        $tmp_name = $_FILES['catalog_image']['tmp_name'];
        $error = $_FILES['catalog_image']['error'];

        if ($error === 0) {
            if ($img_size > 1024000) {
                echo "Maaf, maksimal ukuran file adalah 1MB";
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("KATEGORI-".$nama_katalog."-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'img/catalog/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    try{
                        $add_catalog = mysqli_query($connection, "INSERT INTO katalog VALUES('', '$nama_katalog', '$deskripsi_katalog', '$img_upload_path');");
                    } catch(Exception $e){
                        $e->getMessage();
                    }

                    unset($_POST);
                    header("Location:kelola.php");
                }else {
                    echo "Mohon gunakan file berekstensi .jpg, .jpeg, atau .png";
                }
            }
        }else {
            echo "Terjadi error yang tidak diketahui";
        }
    } else{
        echo "Terjadi kesalahan saat menerima data...";
    }
    ob_end_flush();
?>