<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include "../layout/navbar.php";

    require_once "../../library/process.php";
    $id = $_GET['edit'];
    $row = mysqli_query($mysqli, "SELECT * FROM book WHERE id='$id'")
        or die(mysqli_error($mysqli));
    while ($result = $row->fetch_assoc()) :
    ?>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <div class="card" style="padding: 20px;">
                        <div class="card-title"></div>
                        <form action="../../model/query_book.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $result['title']; ?>" placeholder="Edit Book Here">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author" id="author" class="form-control">
                                    <?php
                                    require_once '../../library/process.php';
                                    $data = $mysqli->query("SELECT * FROM author") or die(mysqli_error(($mysqli)));

                                    while ($authors = $data->fetch_assoc()) :
                                    ?>
                                        <option value="<?= $authors['id'] ?>"> <?= $authors['name'] ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input name="year" class="form-control" value="<?php echo $result['year']; ?>" placeholder="Edit Book's Year">
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <input name="publisher" class="form-control" value="<?php echo $result['publisher']; ?>" placeholder="Edit Publisher's Name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input name="description" class="form-control" value="<?php echo $result['description']; ?>" placeholder="Edit Description">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update_book" class="btn btn-warning">Edit Book</button>
                            </div>

                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="col-md-3"></div>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>