<?php 

include '../connection/init.php';

session_destroy();

header('location: ../mainPages/index.php');

?>