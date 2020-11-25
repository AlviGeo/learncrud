<?php
// PHPMailer with SMTP
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../../library/process.php";
require_once "../../vendor/autoload.php";

session_start();

// Sign Up user
if (isset($_POST['register_user'])) {
    $fullname   = $_POST['fullname'];
    $email      = $_POST['email'];
    $created_at = date('Y-m-d H:i:s', time());
    $token      = bin2hex(random_bytes(50));
    $errors     = [];
    $mail       = new PHPMailer(true);

    $message = file_get_contents('../../view/emails/verify_account.php');
    $message = str_replace('%fullname%', $fullname, $message);
    $message = str_replace('%link%', "http://localhost/basicphp/project-baru/4AUTH/view/auth/verify.php?token=" . $token . "&email=" . $email, $message);

    if ($_POST['password'] !== $_POST['password_confirm']) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['msg'] = "Sorry, Your Password doesnt match with password configuration";
        $_SESSION['msg_type'] = "danger";

        header('location:../../view/auth/register.php');
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_confirm = password_hash($_POST['password_confirm'], PASSWORD_DEFAULT);

        $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' LIMIT 1") or die(mysqli_error($mysqli));

        if (mysqli_num_rows($result) === 1) {
            $errors['register_fail'] = "Sorry, Your Email already Registered. Please use another email.";
        }

        if (count($errors) == 0) {
            // send verification email
            $mail->isSMTP();
            $mail->STMTDebug    = 3;
            $mail->Host         = "smtp.gmail.com";
            $mail->SMTPAuth     = true;
            $mail->Username     = "annikageovan@gmail.com";
            $mail->Password     = "";
            $mail->SMTPSecure   = "tsl";
            $mail->Port         = 587;
            $mail->setFrom('annikageovan@gmail.com', 'Alvi');
            $mail->addAddress($email, $fullname);
            $mail->isHTML(true);

            $mail->Subject = 'Someone has something to say about xxx';
            $mail->Body = $message;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if (!$mail->send()) {
                $_SESSION['msg'] = "Failed to send email" . $mail->ErrorInfo;
                $_SESSION['msg_type'] = "alert-danger";

                header('location:../../view/auth/register.php');
                exit();
            }

            $stmt = $mysqli->prepare("INSERT INTO Users SET fullname = ?, email = ?, password = ?, password_confirm = ?, created_at = ? ") or die($mysqli->error);
            $stmt->bind_param('sssss', $fullname, $email, $password, $password_confirm, $created_at);
            $data = $stmt->execute();

            if ($data) {
                $stmt->close();

                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                $_SESSION['msg'] = "Account success registered!";
                $_SESSION['msg_type'] = "alert-success";

                echo "<script>window.location.assign('../../view/auth/login.php')</script>";
                // header('location:../../view/auth/login.php');
                exit();
            } else {
                $errors['register_fail'] = "Database error: Could not register user";
            }
        } else {
            $_SESSION['msg'] = $errors['register_fail'];
            $_SESSION['msg_type'] = 'alert-danger';

            header('location: ../../view/auth/verify.php');
        }
    }
}


// Verify Account
if (isset($_POST['verify_account'])) {
    $token = $_POST['verify_token'];
    $email = $_POST['email'];
    $verify_time = date('Y-m-d H:i:s', time());

    // find user by Email
    $user = $mysqli->query("UPDATE Users SET verify_token = '$token', verified_at ='$verify_time' WHERE email= '$email' LIMIT 1 ") or die($mysqli->error);

    if (!$user) {
        $_SESSION['msg'] = "Sorry, Failed to verify your account";
        $_SESSION['msg_type'] = "alert-danger";

        header('location:../../view/auth/login.php');
    }

    $_SESSION['msg'] = "Successfully Verify your Account";
    $_SESSION['msg_type'] = "alert-success";

    // header('location:../../view/auth/login.php');
}

// Resent verification email
if (isset($_POST['resend_verification'])) {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));
    $mail = new PHPMailer(true);
    $errors = [];

    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' LIMIT 1 ") or die($mysqli->error);

    if (mysqli_num_rows($result) === 1) {
        $user = $result->fetch_assoc();

        $current_year = date("Y");
        $fullname = $user['fullname'];
        $message = file_get_contents('../../view/emails/verify_account.php');
        $message = str_replace('%fullname%', $fullname, $message);
        $message = str_replace('%link%', "http://localhost/basicphp/project-baru/4AUTH/view/auth/verify.php?token=" . $token . "&email=" . $email, $message);

        // send verification email
        $mail->isSMTP();
        $mail->SMTPDebug = 3;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "annikageovan@gmail.com";
        $mail->Password = "";

        // if SMTP requires TLS Encryption then set it
        $mail->SMTPSecure = "tsl";
        //Set TCP Post to connect to
        $mail->Port = 587;
        $mail->setFrom('annikageovan@gmail.com', 'Alvi');
        $mail->addAddress($email, $fullname);
        $mail->isHTML(true);

        $mail->Subject = 'Verify your Account';
        $mail->Body = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            $_SESSION['msg'] = "Failed to send email" . $mail->ErrorInfo;
            $_SESSION['msg_type'] = "alert-danger";

            header('location:../../view/auth/resend_verify.php');
            exit();
        } else {
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['msg'] = "Success Resend Verification Email! Please check your inbox.";
            $_SESSION['msg_type'] = "alert-success";

            echo "<script>window.location.assign('../../view/auth/login.php')</script>";
            exit();
        }
    } else {
        $errors['verify_fail'] = "Sorry, your email doesn't exist in our databases!";
    }

    if (count($errors) > 0) {
        $_SESSION['msg'] = $errors['verify_fail'];
        $_SESSION['msg_type'] = "alert-danger";

        header('location:../../view/auth/resend_verify.php');
    }
}
