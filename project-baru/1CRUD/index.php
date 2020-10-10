<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Book CRUD</title>
    <link rel="stylesheet" href="./styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include 'process.php'; 

        $query = "SELECT * FROM book";
        $rows = $mysqli->query($mysqli);

    ?>
    <div class="container">
        <div class="row" style="margin-top: 70px;">
            <center>
                <h1>Todo List</h1>

            </center>

            <div class="col-md-12 col-md-offset ">
                <table class="table table-striped">
                    <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
                    <button type="button" class="btn btn-default float-right">Print</button>
                    <br><br>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">Modal Header
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="add.php">
                                        <div class="form-group">
                                            <label>Book Title</label>
                                            <input type="text" required name="task" class="form-control">
                                            <label>Author</label>
                                            <input type="text" required name="task" class="form-control">
                                            <label>Year</label>
                                            <input type="text" required name="task" class="form-control">
                                        </div>
                                           <input type="submit" name="send" value="send" class="btn btn-success"> 
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php while($row = $rows->fetch_assoc()):  ?>
   
                                <th scope="row"><?php echo $row['id']?></th>
                                <td class="col-md-4"><?php echo $row['book_title'] ?></td>
                                <td class="col-md-4"><?php echo $row['author'] ?></td>
                                <td class="col-md-4"><?php echo $row['year'] ?></td>
                                <td><a href="" class="btn btn-success">Edit</a></td>
                                <td><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>



    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>