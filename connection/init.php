<?php

session_start(); 

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "c3470912";


$connection = mysqli_connect($hostname, $username, $password, $databasename) or exit ("Unable to connect to the databse");
//$connection = mysqli_connect('localhost','teamproject','','Bronte');
//Connect to Oracle databse
//$connection = oci_connect('c3452809', 'hello' , 'HUGO.AET.LEEDSBECKETT.AC.UK');

   
 ?>  