<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../assets/css/add_author.css"> -->
</head>

<body>
    <?php include "../layout/navbar.php"; ?>

    <div class="container">
        <div class="row justify-content-center" style="padding-top: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title"></div>
                    <form action="../../model/query_author.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Author Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Author's Name">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" cols="30" rows="10" class="form-control" placeholder="Enter Author's Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control" placeholder="Enter Author's Photo">
                        </div>
                        <div class="form-group">
                            <button type="submmit" name="add_author" class="btn btn-success">Add Author</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>