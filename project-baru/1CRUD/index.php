<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Book CRUD</title>
    <link rel="stylesheet" href="./styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include "./Query.php";  ?>

    <!-- TABLE -->
    <div class="container">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div id="message">
                <div class="alert <?= $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Publisher</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "process.php";
                ($list = mysqli_query($mysqli, "SELECT * FROM book")) or
                    die($mysqli->error);
                while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author_id']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="index.php?edit_book=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="Query.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete this?');" class="btn btn-danger"> Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card ">
                    <?php include "./alert.php"; ?>
                    <h3 class="card-title">Insert Book Data</h3>
                    <form action="./Query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label>Book Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Book Title">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="number" name="author_id" class="form-control" value="<?php echo $author_id; ?>" placeholder="Enter Author's Name">
                        </div>
                        <div class="form-group">
                            <label>Book's Year</label>
                            <input type="text" name="year" class="form-control" value="<?php echo $year ?>" placeholder="Enter Book's Year">
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input type="text" name="publisher" class="form-control" value="<?php echo $publisher; ?>" placeholder="Enter Publisher's Name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $description; ?>" placeholder="Write Description">
                        </div>
                        <div class="form-group">
                            <?php if ($update == true) : ?>
                                <button type="submit" class="btn btn-info" name="update">Update</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-info" name="save_book">Save</button>
                            <?php endif; ?>
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