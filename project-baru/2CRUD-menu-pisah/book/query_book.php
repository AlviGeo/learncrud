<?php
include "../process.php";

if (isset($_POST['save_book'])) {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query(
        $mysqli,
        "INSERT INTO book (title, author_id, year, publisher, description) VALUES ('$title', '$author_id', '$year', '$publisher', '$description')"
    ) or die(mysqli_error($mysqli));

    $_SESSION['msg'] = 'Successfully Added New Menu';
    $_SESSION['msg_type'] = 'alert-success';

    header('location:index.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id");

    $_SESSION['msg'] = "Successfully Deleted Menu";
    $_SESSION['msg_type'] = "alert-danger";

    header('location:index.php');
}

// edit = menampilkan form update

// if (isset($_GET['edit_book'])) {
//     $id = $_GET['edit_book'];
//     $update = true;
//     $result = mysqli_query($mysqli, "SELECT * FROM book WHERE id=$id");

//     if ($result->num_rows) {
//         $row = $result->fetch_array();
//         $title = $row['title'];
//         $author_id = $row['author_id'];
//         $year = $row['year'];
//         $publisher = $row['publisher'];
//         $description = $row['description'];
//     }
// }

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    mysqli_query($mysqli, "UPDATE book SET title='$title', author_id='$author_id', year='year', publisher='$publisher', description='$description' WHERE id=$id");

    $_SESSION['msg'] = "Successfully Updated the Book";
    $_SESSION['msg_type'] = "alert-warning";

    header('location:./index.php');
}
