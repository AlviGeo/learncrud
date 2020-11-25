<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include "../layout/navbar.php"; ?>

    <?php require_once "../../library/process.php";
    require_once "../../model/auth/register_controller.php";
    $token = $_GET['token'];
    $email = $_GET['email'];

    ?>
    <div class="container-fluid" >
        <div class="row mg-t-30">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="../../model/auth/register_controller.php" method="POST">
                    <div class="card no-border mg-30">
                        <div class="card-body">
                            <h5 class="card-title">Verify Your Account Here</h5>
                            <input type="hidden" name="verify_token" value="<?php echo $token; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <button class="btn btn-danger btn-block" name="verify_account">Verify</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php include "../layout/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>