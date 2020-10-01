<?php

session_start();

INCLUDE 'process.php';

$id = 0;
$title = '';
$author = '';
$year = '';
$update = false;

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $mysqli->query(
        "INSERT INTO book(title, author, year) VALUES ('$title', '$author', '$year')"
    ) or die($mysqli->error);

    $_SESSION['message'] = 'Record has been saved';
    $_SESSION['msg_type'] = 'success';

    header('location:index.php');

}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM book WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = 'Record has been saved';
    $_SESSION['msg_type'] = 'success';

    header('location:index.php');

}
// if (isset($_GET['edit'])) {
//     $id = $_GET['edit'];
//     $update = true;
//     ($result = $mysqli->query("SELECT * FROM book WHERE id=$id")) or die($mysqli->error);

//     if ($result->num_rows) {
//         $row = $result->fetch_array();
//         $title = $row['title'];
//         $author = $row['author'];
//         $year = $row['year'];
//     }

// }

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    try{
        $mysqli->query ("UPDATE book SET title='$title', author='$author', year='$year' WHERE id=$id ");
    } catch(Exception $error) {
        echo "Connection to Database error: ". $error->getMessage(); 
    }

    $_SESSION['message'] = 'Record has been updated';
    $_SESSION['msg_type'] = 'warning';

    header('location: index.php');
}

?>