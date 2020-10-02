<?php

session_start();

include '../library/process.php';

if (isset($_POST['save_author'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    try {
        mysqli_query($mysqli, "INSERT INTO author (name, alamat, no_hp) VALUES('$name', '$address', '$phone') ");
    } catch (Exception $error) {
        echo "failed to saved data!" . $error;
    }

    // Alert messages
    $_SESSION['message']  = 'Record has been saved!';
    $_SESSION['msg_type'] = 'success';

    // Redirect to homepages
    header("location: ../view/index.php");
}
