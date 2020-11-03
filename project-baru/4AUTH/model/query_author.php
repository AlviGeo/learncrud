<?php 
session_start();

include "../library/process.php";

if(isset($_POST['add_author'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    mysqli_query($mysqli, "INSERT INTO author(name, address, phone) VALUES('$name', '$address', '$phone')")
            or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Added Data into Databases";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../view/index_author.php');
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id")
            or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Deleted Author Data from Database";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../view/index_author.php');
}

if(isset($_GET['edit_author'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];

    mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id'")
                or die(mysqli_error($mysqli));

    header('location:../view/index_author.php');
}

if(isset($_POST['update_author'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    mysqli_query($mysqli, "UPDATE author SET name='$name', address='$address', phone='$phone'")
            or die(mysqli_error($mysqli));
    $_SESSION['msg'] = "Successfully Updated Author Data";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../view/index_author.php'); 
}


?>