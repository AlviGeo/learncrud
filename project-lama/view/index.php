<?php
session_start();
?>

<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?= $_SESSION['msg_type']; ?> ">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- cara pertama -->
    <!-- <link rel="stylesheet" href="../library/css/style.php"> -->
    <link rel="stylesheet" href="../assets/css/styleSheet.css">


    <title>Simple CRUD with Join Table</title>
</head>

<body>
    <?php require_once '../library/process.php' ?>

    <div class="container">
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container">
        <h2>Simple CRUD with Join Table</h2>
        <br>
        <a href="../view/author/add_author.php">Add Author</a>
        <a href="../view/book/add_book.php">Add Book</a>
        <br>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../library/process.php";
                $no = 1;
                $row = $mysqli->query("SELECT * FROM author JOIN book ON book.author_id = author.id")
                    or die($mysqli->error);
                while ($result = $row->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><img src="<?php echo "../model/Images/" . $result['photo']; ?>" style="width: 50px; height: 50px" alt=""></td>
                        <td><?php echo $result['title']; ?></td>
                        <td><?php echo $result['description']; ?></td>
                        <td><?php echo $result['year']; ?></td>
                        <td><?php echo $result['publisher']; ?></td>
                        <td><?php echo $result['nama']; ?></td>
                        <td>
                            <a href="edit_book.php?edit=<?php echo $result['id']; ?>" class="btn btn-info">Edit </a>
                            <a href="../model/query.php?delete=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="row">
            <h3>Table Inner Join</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Publisher</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../library/process.php";
                    $no = 1;
                    $row = $mysqli->query("SELECT * FROM author INNER JOIN book ON author.id = book.author_id")
                        or die($mysqli->error);
                    print_r($row->fetch_assoc());
                    while ($result = $row->fetch_assoc()) :
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><img src="<?php echo "../model/Images/" . $result['photo']; ?>" style="width: 50px; height: 50px" alt=""></td>
                            <td><?php echo $result['title']; ?></td>
                            <td><?php echo $result['description']; ?></td>
                            <td><?php echo $result['year']; ?></td>
                            <td><?php echo $result['publisher']; ?></td>
                            <td><?php echo $result['nama']; ?></td>
                            <td>
                                <a href="edit_book.php?edit=<?php echo $result['id']; ?>" class="btn btn-info">Edit </a>
                                <a href="../model/query.php?delete=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</body>

</html>