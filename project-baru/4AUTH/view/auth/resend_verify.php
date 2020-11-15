<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Verify</title>
</head>
<body>
    <?php include "../../model/auth/register_controller.php"; ?>
    <?php include "../../helper/response.php"; ?>
    <?php include "../layout/header.php"; ?>
    <div class="container">
        <div class="row mg-b-10">
            <div class="col-md-3"></div>
            <div class="col-md-5">
            <h4>Want to resent verification mail?</h4>
            <p>Input your email below, we will send you an email to verify your account </p>
            <form action="../../model/auth/register_controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email Address><span class="tx-danger"></span></label>
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
</body>
</html>