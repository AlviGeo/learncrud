<?php

include "../library/process.php";


if (isset($_POST['save_book'])) {
    // The path to store the uploaded image
    $target = __DIR__ . "/Images/";

    // Check file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // The path to store the uploaded images
    $picture = $_FILES['photo']['name'];

    // get the file 
    $x         = explode('.', $picture);
    $extension = strtolower(end($x));
    
    // check images size
    $image_size = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];

    // get others data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $photo = $_FILES['photo'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    if (in_array($extension, $file_extension) === true) {
        if ($image_size < 1044070) {
            move_uploaded_file($file_tmp, $target . $picture);

            // Insert data
            $query = mysqli_query($mysqli, "INSERT INTO book(title, author_id, year, photo, publisher, description) VALUES('$title', '$author', '$year', '$picture', '$publisher', '$description') ") or die(mysqli_error($mysqli));

            if ($query) {
                $_SESSION['message']    = 'Success saved author to DB';
                $_SESSION['msg_type']   = 'success';
            } else {
                $_SESSION['message']    = 'Failed to saved author to DB';
                $_SESSION['msg_type']   = 'danger';
            }
        } else {
            $_SESSION['message']    = 'Images Size is too big !';
            $_SESSION['msg_type']   = 'warning';
        }
    } else {
        $_SESSION['message']    = 'File extension is not allowed';
        $_SESSION['msg_type']   = 'warning';
    }

    header("location: ../view/index.php");
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

    if (in_array($extension, $file_extension) === true) {
        if ($image_size < 1044070) {
            move_uploaded_file($file_tmp, $target . $picture);
        } else {
        }
    } else {
    }
    // $_SESSION['msg'] = 'Succesfully Edited The Menu';
    // $_SESSION['msg_type'] = 'warning';

    header('location: ../View/book/book_index.php');
}
