<?php

include "../../library/process.php";

session_start();

if (isset($_POST['login_user'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $link_address = "../../view/auth/resend_verify.php";
    $errors = [];

    $query = $mysqli->query("SELECT * FROM Users WHERE email='$email' LIMIT 1") or die($mysqli->error);

    if (mysqli_num_rows($query) == 1) {

        $user = $query->fetch_assoc();

        if ($user['verify_token'] == null) {
            $_SESSION['msg'] = "Please Verify your account first!" . "Have not receive email yet? <a href='" . $link_address . "'>Send Verification email. </a>";
            $_SESSION['msg_type'] = "alert-danger";

            header('location:../../view/auth/login.php');
        } else {
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['name'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['msg'] = "Login Success! Welcome Back.";
                $_SESSION['msg_type'] = "alert-success";

                header("location: ../../view/landing/index.php");
                exit();
            } else {
                $errors['login_fail'] = "Sorry, Your Password is Wrong";
            }
        }
    } else {
        $errors['login_fail'] = "Sorry You Havent Create an Email.";
    }

    if (count($errors) > 0) {
        $_SESSION['msg'] = $errors['login_fail'];
        $_SESSION['msg_type'] = "alert-danger";

        // header('location:../../view/auth/login.php');
    }
}
