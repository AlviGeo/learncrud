<?php

$mysqli = new mysqli("localhost", "root", "", "learncrud2") or die(mysqli_error($mysqli));

if (isset($_POST['save_author'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    mysqli_query($mysqli, "INSERT INTO author(name, address, phone) VALUES ('$name', '$address', '$phone') ")
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

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $foto = $_POST['foto'];

    mysqli_query($mysqli, "UPDATE author SET name='$name', alamat='$alamat', phone='$phone', foto='$foto' WHERE id='$id' ");

    $_SESSION['msg'] = "Successfully Updated Author Data";
    $_SESSION['msg'] = "alert alert-";

    header('location: ../index_author.php');
}