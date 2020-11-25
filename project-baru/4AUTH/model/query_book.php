<?php
session_start();

include "../library/process.php";

if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query($mysqli, "INSERT INTO book(title, author_id, year, publisher, description) VALUES('$title', '$author', '$year', '$publisher', '$description')")
        or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Added Book Data into Databases";
    $_SESSION['msg_type'] = "alert-success";

    header('location:../view/index_book.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id ")
        or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Deleted Data From Databases";
    $_SESSION['msg_type'] = "alert-success";

    header('location:../view/index_book.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $title = $_GET['title'];
    $author_id = $_GET['author_id'];
    $year = $_GET['year'];
    $publisher = $_GET['publisher'];
    $description = $_GET['description'];

    mysqli_query($mysqli, "SELECT * FROM book WHERE id='$id'")
        or die(mysqli_error($mysqli));
}

if (isset($_POST['update_book'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query($mysqli, "UPDATE book SET title='$title', author_id='$author', year='$year', publisher='$publisher', description='$description' WHERE id='$id'")
        or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Updated Book Data into Databases";
    $_SESSION['msg_type'] = "alert-success";

    header('location:../view/index_book.php');
}
