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
