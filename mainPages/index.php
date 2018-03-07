<?php 
    include '../sections/nav.php';
    
?> 

<!-- WELCOME SECTION --> 
<section class="welcome-section">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12 col-md-12 col-xs-12">
          
          <img src="../assets/img/Carousel-home.png" alt="Home-image" class="centered-img hidden-xs">
          <img src="../assets/img/Bronte-logo.png" alt="Logo" class="centered-img hidden-lg hidden-md hidden-sm">
          
        </div>
        
      </div>
    </div>
    <div class="container">
          <hr class="line">
            <h2 class="tabs-title"> Shop By Shop </h2>
              <hr class="line">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <a href="butchers.php"><img src="../assets/img/butchers.jpg" alt="Buthchers" class="centered-img" title="Butchers"></a>
                      <a href="butchers.php"><div class="caption">
                          <p>Butchers</p>
                      </div></a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <img src="../assets/img/fishmonger.jpg" alt="Fishmonger" class="centered-img" title="Fishmongers">
                      <a href="fishmongers.php"><div class="caption">
                          <p>Fishmongers</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="image-text text-center">
                     <img src="../assets/img/greengrochers.jpg" alt="Greengrocers"class="centered-img" title="Greengrocers">
                      <a href="greengrocers.php"><div class="caption">
                          <p>Greengrocers</p>
                      </div></a>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="image-text text-center">
                     <img src="../assets/img/delicatessen.jpg" alt="Delicatessen" class="centered-img"title="Delicatessen">
                      <a href="delicatessen.php"><div class="caption">
                          <p>Delicatessen</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                    <img src="../assets/img/bakery.jpg" alt="Bakery" class="centered-img" title="Bakery">
                      <a href="bakery.php"><div class="caption">
                          <p>Bakery</p>
                      </div></a>
                  </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="image-text text-center">
                     <a href="shop.php"><img src="../assets/img/All Shops.png" alt="All Shops" class="centered-img" title="All Shops"></a>
                  </div>
                </div>
            </div>
         </div>
</section>
<!-- END OF WELCOME SECTION --> 
    
<?php 
 
  include '../sections/bottom-section.php'; 
 
?>