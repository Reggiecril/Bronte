                <div class="product-image" style="text-align:center;">
                <?php
				 echo '<img src="../assets/img/'.escapeOutput($row['IMAGE_FILENAME']).' "width = "30%" height = 50%";/>';
				?>
                </<div>
               
                <h1><strong><?php  echo '&nbsp;'.escapeOutput($row['PRODUCT_NAME']).'<br/>';?></strong></h1>
                <h1 style="color:#0077b3;"><center><?php  
                
	$name=$row["PRODUCT_NAME"];

$query2="SELECT count(id) AS total FROM rating WHERE productName='$name'";
$results=mysqli_query($connection,$query2)  or exit ("Error in query: $query2. ".mysqli_query($connection,$query2));
$resu=mysqli_fetch_array($results);
$value=$resu['total'];

if ($value==0){
	 $rating='<img src="../assets/img/0.PNG" width = "250px" height = "50px" title="No one write reviews"/>';
}else{
$query3="SELECT sum(rating) FROM rating  WHERE productName='$name'";
$results1=mysqli_query($connection,$query3)  or exit ("Error in query: $query3. ".mysqli_query($connection,$query3));
$resu=mysqli_fetch_array($results1);
$sum=$resu['sum(rating)'];
$average=$sum/$value;



if ($average<0.75 and $average>0){
	$rating='<img src="../assets/img/0.5.PNG" width = "250px" height = "50px" title="0.5"/>';
}
if ($average>=0.75 and $average<1.25){
	 $rating='<img src="../assets/img/1.PNG" width = "250px" height = "50px" title="1.0"/>';
}
if ($average>=1.25 and $average<1.75){
	 $rating='<img src="../assets/img/1.5.PNG" width = "250px" height = "50px" title="1.5"/>';
}
if ($average>=1.75 and $average<2.25){
	$rating='<img src="../assets/img/2.PNG" width = "250px" height = "50px" title="2.0"/>';
}
if ($average>=2.25 and $average<2.75){
	$rating= '<img src="../assets/img/2.5.PNG" width = "250px" height = "50px" title="2.5"/>';
}
if ($average>=2.75 and $average<3.25){
	$rating= '<img src="../assets/img/3.PNG" width = "250px" height = "50px" title="3.0"/>';
}
if ($average>=3.25 and $average<3.75){
	$rating='<img src="../assets/img/3.5.PNG" width = "250px" height = "50px" title="3.5"/>';
}
if ($average>=3.75 and $average<4.25){
	 $rating='<img src="../assets/img/4.PNG" width = "250px" height = "50px" title="4.0"/>';
}
if ($average>=4.25 and $average<4.75){
	 $rating='<img src="../assets/img/4.5.PNG" width = "250px" height = "50px" title="4.5"/>';
	
}
if ($average>=4.75){
	 $rating='<img src="../assets/img/5.PNG" width = "250px" height = "50px" title="5.0"/>';
}
}
                echo $rating;?>(<?php echo $value; ?>)</center></h1>
               
				<div style=" width: 80%;height: 250px;padding: 10px;font-size: 20px;margin: 0 auto;	margin-bottom: 40px;border: 2px solid #87909e;border-left:hidden;border-right:hidden;">
				   
				<div  style="text-align: left;">
				<p><strong><em>Type:</em></strong><?php  echo '&nbsp;'.escapeOutput($row['PRODUCT_TYPE']).'<br/>';?></p>
				<div class="col-xs-4" style="float: right;">
				<form method="post" action="../cart/cart.php?action=add&PRODUCT_NAME=<?php echo $row['PRODUCT_NAME']; ?>">
      				<input type="number" class="quantity" name="quantity" value="1" min="0" max="5" size="2" />
      				<input type="submit" value="Add to basket" class="buynow-button" />
      		    </form>	
      		    </div>
				<p><strong><em>Price: </em></strong><?php  echo '£&nbsp;'.escapeOutput($row['PRODUCT_PRICE']).'.00';?></p>
				
				<p><strong><em>Description:</em></strong><?php  echo '&nbsp;'.escapeOutput($row['PRODUCT_DESCRIPTION']).'<br/>';?></p>
				
				<p><strong><em>Allergy_Info:</em></strong><?php  echo '&nbsp;'.escapeOutput($row['ALLERGY_INFO']).'';?></p>
				
				<p><strong><em>Max Order:</em></strong><?php  echo '&nbsp;'.escapeOutput($row['MAX_ORDER']).'';?></p>
			
				</div>
				<div style="color: #0077b3">
				<p><em><?php  if ($row['AVAILABLE_STOCK']==0) {
				    echo 'Sorry! There is no item available.';
				}
				if ($row['AVAILABLE_STOCK']==1) {
				    echo 'Only 1 item available!';
				}
				if ($row['AVAILABLE_STOCK']>=1) {
				    echo '&nbsp;'.escapeOutput($row['AVAILABLE_STOCK']).' items available<br/>' ;
				}
			    ?></em></p>
				</div>
				
				</div>
				<div style="border: 2px double #000;border-radius: 15px;width:80%;margin:0 auto;margin-bottom:40px;"></div>
				<div style="font-size:500%;font-family: 'Palanquin Dark', sans-serif;">
				    <h1><strong>YOU MAY ALSO LIKE</strong></h1>
				</div>
				                        
				<div style="border: 2px double #000;border-radius: 15px;width:80%;margin:0 auto;margin-top:40px;"></div>
				
					<?php
						$type=$row['PRODUCT_TYPE'];
						$product_name=$row['PRODUCT_NAME'];
					
						$query1 = "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE= '$type' AND PRODUCT_NAME!='$product_name' LIMIT 4";
						$result1 = mysqli_query($connection,$query1); 
						if($result1 = $connection->query($query1))
						{
						 while($row = $result1->fetch_assoc())
    					{
    						
    					include "../products/Also like.php";
    					}
						 $result1->free();
						}
						else
						{
    					echo "No results found";
						}
					
						
					?>
		
				</div>
<form method="post" action="">
	<div id="productreview" class="productreview">
			
			<div id="productreview-header" class="productreview-header">
				<p><strong>RATINGS & REVIEWS</strong></p>
			</div>
			<div id="productreview-new" class="productreview-new">
				<a href="../products/NewReview.php?PRODUCT_NAME=<?php echo $product_name; ?>">Add New Review</a>
			</div>
			<div id="productreview-remove" class="productreview-remove">
				<input class="LabelRemove" type="submit" id="LabelRemove" value="Remove All Filters" name="LabelRemove"/>
                <label class = "full" for="LabelRemove">Remove All Filters</label>
			</div>
			
			<div id="productreviewDetail" class="productreviewDetail">
				<input class="OrderNewest" type="submit" id="OrderNewest" name="OrderNewest" value="NEWEST"/>
                <label class = "LabelNewest" for="OrderNewest">NEWEST</label>
                <input class="LabelMostHelpful" type="submit" id="LabelMostHelpful" name="LabelMostHelpful" value="MOST HELPFUL"/>
                <label class = "full" for="LabelMostHelpful">MOST HELPFUL</label>
                <input class="LabelHighestRated" type="submit" id="LabelHighestRated" name="LabelHighestRated" value="HIGHEST RATED"/>
                <label class = "full" for="LabelHighestRated">HIGHEST RATED</label>
                <input class="LabelLowestRated" type="submit" id="LabelLowestRated" name="LabelLowestRated" value="LOWEST RATED"/>
                <label class = "full" for="LabelLowestRated">LOWEST RATED</label>
                
			</div>
	</div>

	
<?php 

include '../connection/init.php';
if (isset ($_SESSION['query'])){
    $query0= $_SESSION['query'];
}else{
    	$query0= "SELECT * FROM `rating` WHERE productName= '$product_name' ";
        if (isset($_POST['OrderNewest'])){
					$query0= "SELECT * FROM `rating` WHERE productName= '$product_name' ORDER BY date DESC";

				}
		if (isset($_POST['LabelMostHelpful'])){
					$query0= "SELECT * FROM `rating` WHERE productName= '$product_name' ORDER BY help";

				}
		if (isset($_POST['LabelHighestRated'])){
					$query0= "SELECT * FROM `rating` WHERE productName= '$product_name' ORDER BY rating DESC";

				}
		if (isset($_POST['LabelLowestRated'])){
					$query0= "SELECT * FROM `rating` WHERE productName= '$product_name' ORDER BY rating" ;

				}
		if (isset($_POST['LabelRemove'])){
					$query0= "SELECT * FROM `rating`";
		}
}

$results1=mysqli_query($connection,$query0)  or exit ("Error in query: $query0. ".mysqli_query($connection,$query0));
	
while($row1=mysqli_fetch_array($results1)){
	
  		include 'Reviewform.php';
}

?>


</div>
</form>
				
				
	            