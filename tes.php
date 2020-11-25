<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <p class="tx-bold mg-b-0 tx-danger">
            <?php echo $_SESSION['name'] ?>
        </p>
    </a>
    <div class="dropdown-menu dropdown-menu-right" id="dropdownMenuButton">
        <a type="button" class="dropdown-item" data-toggle="modal" data-target="#modalLogOut">Logout</a>
    </div>
</li>