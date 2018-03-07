<?php 
    include '../sections/nav.php';
    
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
           
           <div id="myCarousel" class="carousel slide animated fadeInLeft" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="../assets/img/Carousel-home.png" alt="Home">
                </div>
            
                <div class="item">
                  <a href="../mainPages/butchers.php"><img src="../assets/img/butcher-market.jpg" alt="Butcher"></a>
                  <div class="carousel-caption">
                    <h3 class="carousel-caption-title">Butchers</h3>
                    <p class="carousel-caption-text">Shop the butchers market</p>
                  </div>
                </div>
            
                <div class="item">
                  <img src="../assets/img/fish-market.jpg" alt="Fish">
                </div>
            
                <div class="item">
                  <img src="../assets/img/veg-market.jpg" alt="Vegetable">
                </div>
              </div>
            
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div> 
            
        </div>
        
         <div class="col-lg-6 col-md-6 col-sm-6">
            
            
        </div>
        
    </div>
   <?php
include '../sections/nav.php';
?>
<form method="post" action="">
	<div id="productreview" class="productreview">
			<div id="productreview-header" class="productreview-header">
				<p><strong>RATINGS & REVIEWS</strong></p>
			</div>
			<div id="productreview-new" class="productreview-new">
				<a href="../mainPages/NewReview.php">New Review</a>
			</div>
			<div id="productreviewDetail" class="productreviewDetail">
				<input class="OrderNewest" type="radio" id="OrderNewest" name="OrderNewest" value="NEWEST"/>
				
                <label class = "LabelNewest" for="OrderNewest">NEWEST</label>
                <input class="LabelMostHelpful" type="radio" id="LabelMostHelpful" name="LabelMostHelpful" value="MOST HELPFUL"/>
                <label class = "full" for="LabelMostHelpful">MOST HELPFUL</label>
                <input class="LabelHighestRated" type="radio" id="LabelHighestRated" name="LabelHighestRated" value="HIGHEST RATED"/>
                <label class = "full" for="LabelHighestRated">HIGHEST RATED</label>
                <input class="LabelLowestRated" type="radio" id="LabelLowestRated" name="LabelLowestRated" value="LOWEST RATED"/>
                <label class = "full" for="LabelLowestRated">LOWEST RATED</label>
                <input type="reset" value="Remove All Filters"/>
			</div>
			</div>
</form>
	
<?php 

require_once '../connection/init.php';
if (isset ($_SESSION['query'])){
    $query = $_SESSION['query'];
}else{
       $query= "SELECT * FROM `rating`";
        if (isset($_SESSION['OrderNewest'])){
					$query= "SELECT * FROM `rating` ORDER BY date";

				}
		if (isset($_SESSION['LabelMostHelpful'])){
					$query= "SELECT * FROM `rating` ORDER BY help";

				}
		if (isset($_SESSION['LabelHighestRated'])){
					$query= "SELECT * FROM `rating` ORDER BY rating";

				}
		if (isset($_SESSION['LabelLowestRated'])){
					$query= "SELECT * FROM `rating` ORDER BY rating DESC" ;

				}
}

$results=mysqli_query($connection,$query)  or exit ("Error in query: $query. ".mysqli_query($connection,$query));

while($row=mysqli_fetch_array($results)){

  		include 'Reviewform.php';
}


?>
</div>
<?php 
    include '../sections/bottom-section.php';
    
?>