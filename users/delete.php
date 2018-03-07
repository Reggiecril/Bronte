<?php


include '../connection/init.php';

$sql = "DELETE FROM CUSTOMER WHERE EMAIL = '".$_SESSION['authenticatedUser']."'";

if (!mysqli_query($connection,$sql))
{
die('Error: ' . mysqli_error($connection));
}
echo "Record Deleted";
unset($_SESSION['authenticatedUser']);
unset($_SESSION['personalUser']);
header("Location: ../mainPages/index.php");


?>


