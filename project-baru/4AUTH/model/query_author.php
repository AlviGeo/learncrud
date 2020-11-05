<?php 
session_start();

include "../library/process.php";

if(isset($_POST['add_author'])) {
    // PHOTO
    $target = __DIR__."/Images";
    $files_extension = array('png', 'jpg', 'jpeg');
    $picture = $_FILES['photo']['name'];
    $x = explode('.', $picture);
    $extension = strtolower(end($x));

    $image_size = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];

    // POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];

    if (in_array($extension, $files_extension) === true) {
        if ($image_size < 1044070) {
            move_uploaded_file($file_tmp, $target . $picture);

            $query = mysqli_query($mysqli, "INSERT INTO author(name, address, phone, photo) VALUES('$name', '$address', '$phone', '$photo')")
            or die(mysqli_error($mysqli));

            if ($query) {
                $_SESSION['msg'] = "Successfully Added Data into Databases";
                $_SESSION['msg_type'] = "alert alert-";
            } else {
                $_SESSION['msg'] = "Failed to saved author to DB";
                $_SESSION['msg_type'] = "alert alert-";
            }
        } else {
            $_SESSION['msg'] = "File extension is not allowed";
            $_SESSION['msg_type'] = "alert alert";
        }
        header('location:../view/index_author.php');
    }
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
    $photo = $_GET['photo'];

    mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id'")
                or die(mysqli_error($mysqli));

    header('location:../view/index_author.php');
}

if(isset($_POST['update_author'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];

    mysqli_query($mysqli, "UPDATE author SET name='$name', address='$address', phone='$phone', photo='$photo' WHERE id='$id'")
            or die(mysqli_error($mysqli));

    $_SESSION['msg'] = "Successfully Updated Author Data";
    $_SESSION['msg_type'] = "alert alert-";

    header('location:../view/index_author.php'); 
}
