<?php
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }

include '../sections/nav.php';

?>


<div class="container">
<h3 class="table-links"> Are You Sure You Would Like To Delete Your Account? </h3>
<img src="../assets/img/leave.jpg" class="centered-img"></img>
<div class="row">
    <div class="col-lg-6 col-md-6">
       <a href="delete.php"><h3 class="table-links"> Yes Delete My Account! </h3></a> 
    </div>
    <div class="col-lg-6 col-md-6">
       <a href="useraccount.php"><h3 class="table-links"> No Keep My Account </h3></a> 
    </div>
</div>
    
</div>

<?php 

include '../sections/bottom-section.php';

?>