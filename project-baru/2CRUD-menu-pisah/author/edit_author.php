<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include "./query_author.php";
    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM author where id='$id'")
        or die(mysqli_error($mysqli));
    while ($author = $data->fetch_assoc()) : ?>

        <div class="container">
            <?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert <?= $_SESSION['msg_type']; ?>">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <form action="./query_author.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <div class="form-group">
                                <label>Author Name</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea id="address" rows="4" cols="50" name="address" value="<?php echo $data['address']; ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <?php endwhile; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>