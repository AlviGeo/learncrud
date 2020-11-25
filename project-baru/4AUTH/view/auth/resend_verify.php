<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Resend Verify</title>
</head>

<body>
    <?php include "../../model/auth/register_controller.php"; ?>
    <?php include "../../helper/response.php"; ?>
    <?php include "../layout/navbar.php"; ?>
    <div class="container">
        <div class="row mg-b-10">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <h4>Want to resent verification mail?</h4>
                <p>Input your email below, we will send you an email to verify your account </p>
                <form action="../../model/auth/register_controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email Address<span class="tx-danger"></span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Please input your email here." required>
                    </div>
                    <div class="form-group mg-t-50">
                        <button class="btn btn-danger btn-block" name="resend_verification" id="resent_verification">Send Verification Email</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php include "../layout/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>