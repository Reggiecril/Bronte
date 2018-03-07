<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../mainPages/index.php");
 }

include '../sections/head.php';

?>
<div class="container">
          <hr class="line">
            <h2 class="tabs-title"> Administrator </h2>
              <hr class="line">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <a href="adminbutcher.php"><img src="../assets/img/butchers.jpg" alt="Buthchers" class="centered-img" title="Butchers"></a>
                      <a href="adminbutcher.php"><div class="caption">
                          <p>Butchers</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <a href="adminfishmongers.php"><img src="../assets/img/fishmonger.jpg" alt="Fishmonger" class="centered-img" title="Fishmongers"></a>
                      <a href="adminfishmongers.php"><div class="caption">
                          <p>Fishmongers</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="image-text text-center">
                     <a href="admingreengrocers.php"><img src="../assets/img/greengrochers.jpg" alt="Greengrocers"class="centered-img" title="Greengrocers"></a>
                      <a href="admingreengrocers.php"><div class="caption">
                          <p>Greengrocers</p>
                      </div></a>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="image-text text-center">
                     <a href="admindelicatessen.php"><img src="../assets/img/delicatessen.jpg" alt="Delicatessen" class="centered-img"title="Delicatessen"></a>
                      <a href="admindelicatessen.php"><div class="caption">
                          <p>Delicatessen</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <a href="adminbakery.php"><img src="../assets/img/bakery.jpg" alt="Bakery" class="centered-img" title="Bakery"></a>
                      <a href="adminbakery.php"><div class="caption">
                          <p>Bakery</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <a href="admintrader.php"><img src="../assets/img/traders.png" alt="Trader" class="centered-img" title="Trader"></a>
                      
                  </div>
                </div>
            </div>
            <hr class="line">
            <a href="../login/logout.php"><h2 class="tabs-title"> Logout </h2></a>
              <hr class="line">
         </div>
         