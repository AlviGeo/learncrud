<?php 

include "";

session_start();

session_destroy();

header('location: ../../library/process.php');


?>