<?php 
include "./process.php";

$id = 0;
$title = "";
$author = "";
$year = "";
$publisher = "";
$description = "";
$update = false;

if (isset($_POST['save_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query(
        $mysqli,
        "INSERT INTO book (title, author, year, publisher, description) VALUES ('$title', '$author', '$year', '$publisher', '$description')"
    );  
    header('location:index.php');
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id");
    header('location:index.php');
}

// edit = menampilkan form update
if(isset($_GET['edit_book'])) {
    $id = $_GET['edit_book'];

    mysqli_query($mysqli, "SELECT * FROM book WHERE id=$id");

    if($result->num_rows) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $author = $row['author'];
        $year = $row['year'];
        $publisher = $row['publisher'];
        $description = $row['description'];
    }
}

if (isset($_POST['udate'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query($mysqli, "UPDATE book SET title='$title', author='$author', year='year', publisher='$publisher', description='$description'");
    header('location:./index.php');
}