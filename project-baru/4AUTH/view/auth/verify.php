<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
<div class="container">
        <div class="row mg-b-10">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <form action="../../model/auth/login_controller.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Please input your Fullname here." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Please enter ypur email">
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Please enter ypur password">
                    </div>
                    <div class="form-group">
                        <label for="email">Password Confirmation</label>
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Enter Password Confirmation">
                    </div>
                    <div class="form-group mg-t-50">
                        <button class="btn btn-danger btn-block" name="register_user" id="register_user">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>