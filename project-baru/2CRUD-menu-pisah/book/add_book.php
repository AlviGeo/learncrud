<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class="container ">
        <div class="row justify-content-center" style="padding-top: 50px; ">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card ">
                    <h3 class="card-title">Insert Book Data</h3>
                    <form action="./query_book.php" method="POST">
                        <div class="form-group">
                            <label>Book Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Book Title">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select type="number" name="author_id" class="form-control" placeholder="Enter Author's Name">
                                <option disabled selected>Choose Author</option>
                                <?php include "../process.php";
                                $list = mysqli_query($mysqli, "SELECT * FROM author") or die(mysqli_error($mysqli));
                                while ($row = $list->fetch_assoc()) : ?>

                                    <option value="<?php echo $row['id']; ?>"><?= $row['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Book's Year</label>
                            <input type="text" name="year" class="form-control" placeholder="Enter Book's Year">
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input type="text" name="publisher" class="form-control" ; placeholder="Enter Publisher's Name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Write Description">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" name="save_book">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>