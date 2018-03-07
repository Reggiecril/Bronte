	<?php 
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }
include '../sections/nav.php';

require_once '../login/login.php'
?> 

	<form method="post" action="../sections/InsertReview.php?PRODUCT_NAME=<?php echo $name;?>">
	<div id="review" class="review">
			<div id="review-header" class="review-header">
				<p><strong>WRITE YOUR REVIEW</strong></p>
			</div>
		
			<div id="ReviewDetail" class="ReviewDetail">
				<div style="display:none;">
				<input class="NewReviewName" type="text" id="NewReviewName" name="Username" value="<?php $query = "SELECT * FROM CUSTOMER WHERE EMAIL = '".$_SESSION['authenticatedUser']."'";
			
				$result = mysqli_query($connection,$query);
				 while($row = $result->fetch_assoc()){
				 	$firstname=$row['CUSTOMER_FIRSTNAME'];$surname=$row['CUSTOMER_SURNAME'];
				 	
				 	echo $firstname,$surname;
				 }?>" />
				 
				<input class="NewReviewProductName" type="text" id="NewReviewProductName" name="productName" value="<?php $productName=$_GET['PRODUCT_NAME'];echo $productName;?>" />
				</div>
			<div id="Rating" class="Rating">
				<div id="RatingID" class="RatingID">
					<label for="StarRating">
						<span id="LabelRatingID" class="ReviewLeftSide LabelRatingID">
						Overall rating
						
						<span class="RequiredFieldIndicator">*</span>
						</span> 
						</label>
				</div>


                    <div class="ReviewRightSide rating-stars">

    				<fieldset id='rating' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>

                    </fieldset>
					</div>
			</div>
			
			<div id="Recommend" class="Recommend">
				<div id="RecommendID" class="RecommendID">
					<label for="ButtonRecommendID">
						<span id="LabelRecommendID" class="ReviewLeftSide LabelRecommendID">
						Do you recommend this product?
						<span class="RequiredFieldIndicator">*</span>
						</span>
					</label>
					
						
					
				</div>
				<div id="ButtonRecommend" class="ReviewRightSide ButtonRecommend">
				
					<input type="radio" id="ButtonRecommendYes" class="ButtonRecommendYes" name="Recommend" value="Yes" >
					<label id="ButtonRecomendLabelYes" class="ButtonRecomendLabelYes" for="ButtonRecommendYes">Yes</label>
				
				
					<input type="radio" id="ButtonRecommendNo" class="ButtonRecommendNo" name="Recommend" value="No">
					<label id="ButtonRecomendLabelNo" class="ButtonRecomendLabelNo" for="ButtonRecommendNo">No</label>
			
				</div>
			</div>
			<div id="Review" class="Review">
				<div id="ReviewID" class="ReviewID">
					<label for="TextareaReviewID">
						<span id="LabelReviewID" class="ReviewLeftSide LabelReviewID">
							Review
							<span class="RequiredFieldIndicator">*</span>
						</span>
					</label>
				</div>

				<div id="ReviewTextareaDetail" class="ReviewRightSide ReviewTextareaDetail">
					<textarea name="ReviewTextarea" rows="2" cols="40" placeholder="Some Advice or Good Reviews"></textarea>
				</div>
			</div>
			<div id="Opinion" class="Opinion">
				<div id="OpinionID" class="OpinionID">
					<label for="InputOpinionID">
						<span id="LabelOpinionID" class="ReviewLeftSide LabelOpinionID" >
							Your opinion in one sentence
						</span>
					</label>
				</div>
				<div id="OpinionInputDetail" class="ReviewRightSide OpinionInputDetail">
					<input type="text" name="Opinion" value="" placeholder="Example:Best Purchase ever"	>
				</div>
				
			</div>
			<div id="Photo" class="Photo">
				<div id="PhotoID" class="PhotoID">
					<label for="ChoicePhoto">
						<span id="LabelOpinionID" class="ReviewLeftSide LabelOpinionID">
							Add Photo
						</span>
					</label>
				</div>
				<div id="PhotoUpload" class="ReviewRightSide PhotoUpload">
				<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<div style="width: 750px"></div>
				
			</div>
				<div style="color:red;text-align:center;">
    		<?php 
				if (isset($_SESSION['errorcheck'])){
						echo $_SESSION['errorcheck'];
						}			
				?>
    	</div>	
		</div>	
    
    		
    		
			<div id="ReviewSubmit" class="ReviewSubmit">
			<input type="submit" value="Review Submit" name="WriteReviewSubmit">
			</div>
			

	</form>
	<?php
	include '../sections/bottom-section.php';
	?>