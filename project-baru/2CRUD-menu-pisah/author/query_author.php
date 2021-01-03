<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "learncrud2") or die(mysqli_error($mysqli));

if (isset($_POST['save_author'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];
    mysqli_query($mysqli, "INSERT INTO author(name, address, phone, photo) VALUES ('$name', '$address', '$phone', '$photo')")
        or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Succesfully Added to Databases";
    $_SESSION['type'] = "alert-success";

    header('location:../index_author.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id");

    $_SESSION['message'] = "Successfully Deleted Menu";
    $_SESSION['type'] = "alert-success";

    header('location:../index_author.php');
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];
    // $foto = $_POST['foto'];

    mysqli_query($mysqli, "UPDATE author SET name='$name', address='$address', phone='$phone', photo='$photo'WHERE id='$id'");

    $_SESSION['message'] = "Successfully Updated Author Data";
    $_SESSION['type'] = "alert-success";

    header('location: ../index_author.php');
}
