<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include "../layout/navbar.php";

    require_once "../../library/process.php";
    $id = $_GET['edit'];
    $row = mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id' ");
    while ($result = $row->fetch_assoc()) :
    ?>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-title"></div>
                        <form action="../../model/query_author.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>" placeholder="Edit Author Name">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $result['address']; ?>" placeholder="Edit Author Address">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" value="<?php echo $result['phone']; ?>" placeholder="Edit Author Phone">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" value="<?php echo $result['photo']; ?>" placeholder="Edit Author Photo">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update_author" class="btn btn-warning">Edit Author</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="col-md-2"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>