<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Edit Pisah</title>
</head>

<body>
    <?php
    require_once 'process.php';
    $id = $_GET['edit'];
    $data = mysqli_query($mysqli, "SELECT * FROM book WHERE id = '$id'");
    while ($menu = $data->fetch_assoc()) :
    ?>
        

    <div class="container">
        <div class="card-title">
            <h2>Edit Data</h2>
            <form action="query.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $menu['id']; ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title Name</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $menu['title']; ?>" placeholder="Enter Title Book">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Author</label>
                        <input type="text" class="form-control" name="author" value="<?php echo $menu['author']; ?>" $placeholder="Enter Author's Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Year</label>
                        <input type="text" class="form-control" name="year" value="<?php echo $menu['year']; ?>" placeholder="Enter Your Year">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="index.php">Back</a>
                    
            </form>
        </div>
        <?php endwhile; ?>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>