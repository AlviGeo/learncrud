<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include "../layout/navbar.php"; ?>

    <div class="container">
        <div class="row justify-content-center" style="padding-top: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title"></div>
                    <form action="../../model/query_book.php" method="POST">
                        <div class="form-group">
                            <label>Book Title</label>
                            <select type="text" name="title" class="form-control" placeholder="Enter Book's Title">
                                <option disabled selected>Choose Title</option>
                                <?php include "../../library/process.php";
                                $row = mysqli_query($mysqli, "SELECT * FROM book") or die(mysqli_error($mysqli));
                                while ($result = $row->fetch_assoc()) : ?>
                                    <option value="<?php echo $result['id']; ?>"><?= $result['title']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ID Author</label>
                            <input type="number" name="author_id" cols="30" rows="10" class="form-control" placeholder="Enter Author's ID"></input>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <input type="number" name="year" class="form-control" placeholder="Enter Book's Year">
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Enter Publisher">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea row="4" cols="50" type="text" name="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submmit" name="add_book" class="btn btn-success">Add Author</button>
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