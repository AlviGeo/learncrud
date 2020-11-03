<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                    <form action="../../model/query_author.php" method="POST">
                        <div class="form-group">
                            <label>Author Name</label>
                            <select type="text" name="name" class="form-control" placeholder="Enter Author's Name">
                                <option disabled selected>Choose Author</option>
                                <?php include "../../library/process.php";
                                $row = mysqli_query($mysqli, "SELECT * FROM author") or die(mysqli_error($mysqli));
                                while ($result = $row->fetch_assoc()) : ?>
                                    <option value="<?php echo $result['id']; ?>"><?= $result['name']; ?></option>
                                <?php endwhile; ?>
                            </select>
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