<?php 
    ob_start();

    include_once("database/db_conn.php");

    if(isset($_GET['catalog_id'])){  // to delete
        try{
            $id_katalog = $_GET['catalog_id'];
            $path_gambar = mysqli_fetch_assoc(mysqli_query($connection, "SELECT gambar FROM katalog WHERE id = ".$id_katalog))['gambar'];
            $delete_katalog = mysqli_query($connection, "DELETE FROM katalog WHERE id = ".$id_katalog);
            unlink($path_gambar);
            header("Location:kelola.php");
        } catch(Exception $e){
            $e->getMessage();
        }

    } elseif(isset($_POST['submit-catalog'])){ // to edit
        try{
            $id_katalog = $_POST['catalog_id'];
            $nama_katalog = $_POST['catalog_name'];
            $deskripsi = $_POST['catalog_descriptions'];
            $update_katalog = mysqli_query($connection, "UPDATE katalog SET nama_katalog = '$nama_katalog', deskripsi = '$deskripsi' WHERE id = '$id_katalog'");
            
            if($_FILES['catalog_image']['size'] > 0){
                $path_gambar_old = mysqli_fetch_assoc(mysqli_query($connection, "SELECT gambar FROM katalog WHERE id = ".$id_katalog))['gambar'];
                unlink($path_gambar_old);

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
                                $add_catalog = mysqli_query($connection, "UPDATE katalog SET gambar = '$img_upload_path' WHERE id = '$id_katalog'");
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
                    echo "Terjadi eeror yang tidak diketahui";
                }
            }
            header("Location:kelola.php");
        } catch(Exception $e){
            $e->getMessage();
        }

    } else{ // illegal access
        die('Anda mengakses secara ilegal!');
    }
    ob_end_flush();
?>