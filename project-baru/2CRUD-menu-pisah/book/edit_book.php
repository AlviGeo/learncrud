<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Edit Pisah</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <?php include './query_book.php';

    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM book WHERE id = '$id'")
        or die(mysqli_error($mysqli));
    while ($book = $data->fetch_assoc()) :
    ?>

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

        <div class="row justify-content-center mt-4">
            <div class="card" style="width: 18rem; color:white; background-color:salmon; ">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <form action="./query_book.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $book['title']; ?>" placeholder="Edit Title">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select type="number" class="form-control" name="author_id" value="<?php echo $book['author']; ?>">
                                <option disabled selected>Choose Author</option>
                                <?php include "../process.php";
                                $list = mysqli_query($mysqli, "SELECT * FROM author") or die(mysqli_error($mysqli));
                                while ($row = $list->fetch_assoc()) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" class="form-control" name="year" value="<?php echo $book['year']; ?>" placeholder="Edit Year">
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input type="text" class="form-control" name="publisher" value="<?php echo $book['publisher']; ?>" placeholder="Edit Publisher">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="<?php echo $book['description']; ?>" placeholder="Edit Description">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Edit Book</button>
                </div>
                </form>
            </div>
        </div>


    <?php endwhile; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>