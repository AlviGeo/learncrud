<?php

session_start();

include '../library/process.php';

if (isset($_POST['save_author'])) {
    // The path to srgtore the uploaded image
    $target         = __DIR__ . "/Images/";

    // Check file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // The path to store the uploaded images
    $picture        = $_FILES['images']['name'];
    // print_r($picture);
    // get the file extension
    $x              = explode('.', $picture);
    $extension      = strtolower(end($x));
    // check images size
    $image_size     = $_FILES['images']['size'];
    $file_tmp       = $_FILES['images']['tmp_name'];


    // get others data
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

    if (in_array($extension, $file_extension) === true) {
        if ($image_size < 1044070) {
            move_uploaded_file($file_tmp, $target . $picture);

            // Insert data to DB
            $query = mysqli_query($mysqli, "INSERT INTO author(nama, alamat, no_hp, foto) VALUES('$nama', '$alamat', '$no_hp', '$foto') ") or die(mysqli_error($mysqli));

            if ($query) {
                $_SESSION['message']    = 'Success saved author to DB';
                $_SESSION['msg_type']   = 'success';
            } else {
                $_SESSION['message']    = 'Failed to saved author to DB';
                $_SESSION['msg_type']   = 'danger';
            }   
        } else {
            $_SESSION['message']    = 'Images Size is too big !';
            $_SESSION['msg_type']   = 'warning';
        }
    } else {
        $_SESSION['message']    = 'File extension is not allowed';
        $_SESSION['msg_type']   = 'warning';
    }

    // Redirect to homepages
    header("location: ../view/index_author.php");
}



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id");

    header('location: ../view/index_author.php');
}

if (isset($_POST['edit_author'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    mysqli_query(
        $mysqli,
        "UPDATE author SET nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id=$id"
    ) or die(mysqli_error($mysqli));
    // $_SESSION['msg'] = 'Succesfully Edited The Menu';
    // $_SESSION['msg_type'] = 'warning';

    header('location: ../View/author/author_index.php');
}

if (isset($_POST['update_author'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

    mysqli_query($mysqli, "UPDATE author SET nama='$nama', alamat='$alamat', no_hp='$no_hp', foto='$foto'")
            or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Edited Author Data";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../view/index_author.php');
}