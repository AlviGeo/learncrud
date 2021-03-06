<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index of Book</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../assets/navbar.css"> -->
</head>

<body>
    <?php include "./layout/navbar.php"; ?>

    <?php if (isset($_SESSION['msg'])) : ?>
        <div id="message">
            <div class="<?= $_SESSION['msg_type']; ?>success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="container mt-4 ">
            <a href="./book/add_book.php" type="button" class="btn btn-success">Add Book</a>
        </div>
        <br>

        <h3 class="mt-4">Book Table</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author ID</th>
                    <th>Year</th>
                    <th>Publisher</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
    </div>

    <?php
    include "../library/process.php";
    $no = 1;
    ($row = mysqli_query($mysqli, "SELECT * FROM author JOIN book ON author.id=book.author_id "))
        or die(mysqli_error($mysqli));
    while ($result = $row->fetch_assoc()) :
    ?>

        <tr>
            <tbody>
                <td><?php echo $no++; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['year']; ?></td>
                <td><?php echo $result['publisher']; ?></td>
                <td><?php echo $result['description']; ?></td>
                <td>
                    <a href="./book/edit_book.php?edit=<?php echo $result['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="../model/query_book.php?delete=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tbody>
        </tr>
    <?php endwhile; ?>
    </table>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>