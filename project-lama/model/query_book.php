<?php

session_start();

include '../library/process.php';

if (isset($_POST['save_book'])) {
    $target = __DIR__ . "/Images/";
    echo "masuk";
    echo $target;

    // $title = $_POST['title'];
    // $author = $_POST['author'];
    // $year = $_POST['year'];
    // $photo = $_FILES['photo'];
    // $publisher = $_POST['publisher'];
    // $description = $_POST['description'];

    // try {
    //     mysqli_query($mysqli, "INSERT INTO book (title, author, year, photo, publisher, description) VALUES('$title', '$author_id', '$year' , '$photo', '$publisher', '$description') ");
    // } catch (Exception $error) {
    //     echo "failed to saved data!" . $error;
    // }

    // Alert messages
    // $_SESSION['message']  = 'Record has been saved!';
    // $_SESSION['msg_type'] = 'success';

    // Redirect to homepages
    // header("location: ../view/index_author.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id");

    header('location: ../view/book/book_index.php');
}

if (isset($_POST['edit_book'])) {
    $id = $_POST['id'];
    $name = $_POST['title'];
    $address = $_POST['author_id'];
    $year = $_POST['year'];
    $photo = $_POST['photo'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];
    mysqli_query(
        $mysqli,
        "UPDATE book SET id='$id', title='$title', year='$year', photo='$photo', publisher='$publisher', description='$description' WHERE id=$id"
    ) or die(mysqli_error($mysqli));
    // $_SESSION['msg'] = 'Succesfully Edited The Menu';
    // $_SESSION['msg_type'] = 'warning';

    header('location: ../View/book/book_index.php');
}
