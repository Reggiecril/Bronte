
				
			<div id="AllReviews" class="AllReviews">
				<div id="AllReviews-star" class="AllReviews-star">
				
				<?php
				
        	
        		if($row1['rating']=='5') {
        				 echo ' <img src="../assets/img/star5.PNG" width = "170px" height = "30px"/>';	 
        			}
        		if($row1['rating']=='4') {
        				 echo '<img src="../assets/img/star4.PNG" width = "170px" height = "30px"/>';	 
        			}
        		if($row1['rating']=='3') {
        				 echo '<img src="../assets/img/star3.PNG" width = "170px" height = "30px"/>';	 
        			}
        		if($row1['rating']=='2') {
        				 echo '<img src="../assets/img/star2.PNG" width = "170px" height = "30px"/>';
        			}
        		if($row1['rating']=='1') {
        				 echo '<img src="../assets/img/star1.PNG" width = "170px" height = "30px"/>';			 
        			}
        		
					?>
				</div>
				<div id="AllReviews-date" class="AllReviews-date">
				
					<?php
					 echo ''.$row1['date'].'';
					
					
				
					?>
				</div>
				<div id="AllReviews-opinion" class="AllReviews-opinion">
					<strong>
					<?php
					if ($row1['opinion']=='') {
						echo'';
					}else{	
						
					 echo ''.$row1['opinion'].'';
					}
					
				
					?></strong>
				</div>
				<div id="AllReviews-review" class="AllReviews-review">
					<?php
					echo ''.$row1['review'].''
					?>
				</div>
					<?php
					if ($row1['photo']=='') {
						echo '';
					}else{
						
					echo '<img src="../assets/img/'.$row1['photo'].'" width="250px" height="250px"></img>';
					 }
					?>
				<div id="AllReviews-recommend" class="AllReviews-recommend">
					<?php
					if ($row['recommend']=='yes'){
						echo '<img src="../assets/img/greensignal.png" class="centeredimg" width="20px" height="20px"></img>';
						echo "     I recommend this product";
					}
					if ($row['recommend']=='no'){
						echo '<img src="../assets/img/redsignal.png" class="centeredimg" width="20px" height="20px">';
						echo "     I don't recommend this product";
					}
					?>
				</div>
				<div id="AllReviews-username" class="AllReviews-username">
					<strong><?php
					echo ''.$row1['username'].'';
					?>
					</strong>
				</div>
				<div id="AllReviews-helpful" class="AllReviews-helpful">
					<div style="display:inline-block;">
					<p>Was this review helpful?</p>
					
					</div>
					<div style="display:inline-block;float:right;">
					<a href="#" >Yes(0)</a>  <a href="#" >NO(0)</a>
					</div>
				</div>
				
			</div>


