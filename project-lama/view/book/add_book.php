<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Add Book Pisah</title>
</head>

<body>
    <div class="row justify-content-center " style="background-color: pink">
        <form action="../../model/query_book.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Book Title">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <select name="author" id="author" class="form-control">
                    <option disabled selected>Select Author</option>
                    <?php
                    include "../../library/process.php";
                    $data = $mysqli->query("SELECT * FROM author") or die(mysqli_error($mysqli));

                    while ($authors = $data->fetch_assoc()) :
                    ?>
                        <option value="<?= $authors['id'] ?>"><?= $authors['nama'] ?> </option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" placeholder="Enter Author Year">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control" placeholder="Enter Author Photo">
            </div>
            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="publisher" class="form-control" placeholder="Enter Author Publisher">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Author Description">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="save_book">Save</button>
            </div>
            </input>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>
</body>

</html>