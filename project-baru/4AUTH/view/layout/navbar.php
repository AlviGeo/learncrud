<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mg-b-30">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="" alt="">
        </a>
        <h2 style="font-family: courier; color: white" class="mg-t-10">Alvi Library</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../view/dashboard.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="../view/index_book.php" class="nav-link">Book</a>
                </li>
                <li class="nav-item">
                    <a href="../view/index_author.php" class="nav-link">Author</a>
                </li>
                <?php if (isset($_SESSION['role'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <span class="tx-bold mg-b-0 tx-danger"><?php echo $_SESSION['name'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="dropdownMenuButton">
                            <a type="button" class="dropdown-item" data-toggle="modal" data-target="#modalLogOut">Logout</a>
                        </div>
                    </li>


                <?php else : ?>
                    <li class="nav-item">
                        <a href="../view/auth/login.php" class="nav-link">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php include "../assets/component/modalLogout.php"; ?>