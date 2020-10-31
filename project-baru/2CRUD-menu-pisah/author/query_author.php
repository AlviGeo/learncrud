<?php

$mysqli = new mysqli("localhost", "root", "", "learncrud2") or die(mysqli_error($mysqli));

if (isset($_POST['save_author'])) {
    $nama = $_POST['nama'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    mysqli_query($mysqli, "INSERT INTO author(nama, address, phone_number) VALUES ('$nama', '$address', '$phone_number') ")
        or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Succesfully Added to Databases";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../index_author.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id");

    $_SESSION['msg'] = "Successfully Deleted Menu";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../index_author.php');
}

if (isset($_GET['update_author'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

    mysqli_query($mysqli, "UPDATE author SET nama='$nama', alamat='$alamat', no_hp='$no_hp', foto='$foto' WHERE id='$id' ");

    $_SESSION['msg'] = "Successfully Updated Author Data";
    $_SESSION['msg'] = "alert alert-";

    header('location: ../index_author.php');
}