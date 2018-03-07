<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';

//Gather id from $_GET[]
$id = $_GET['id'];

//Construct DELETE query to remove record where WHERE id provided equals the id in the table
$query = "DELETE FROM TRADER WHERE TRADER_ID = '$id'";


//run $query
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

// check to see if any rows were affected
if (mysqli_affected_rows($connection) > 0) {

      //If yes , return to calling page(stored in the server variables)
      header("Location: ../admintrader.php");

} else {
      // print error message
      echo "Error in query: $query. " . mysqli_error($connection);
      
}		
?>
