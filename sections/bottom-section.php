<?php 

include 'head.php';

?>

<section class="bottom-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4">
                
                <a href ="https://www.facebook.com/bronteonline/"><img src="../assets/img/facebook.png" class="centered-img" alt="Facebook"></img></a>
            </div>
            
            <div class="col-lg-4 col-md-4 col-xs-4">
                <a href ="https://www.instagram.com/bronte_london/?hl=en"><img src="../assets/img/instagram.png" class="centered-img" alt="Instagram"></img></a>
            </div>
            
            <div class="col-lg-4 col-md-4 col-xs-4">
                <a href ="https://twitter.com/brontecollege?lang=en"><img src="../assets/img/twitter.png" class="centered-img" alt="Twitter"></img></a>
            </div>
            
        </div>
        
        <h2 class="terms">&copy; Bronte Online 2017 </h2>
        <a href="../sections/terms-conditions.php"><h2 class="terms"> Terms & Conditions </h2></a>
        <a href="#admin-login" data-toggle="modal" data-target="#admin-login"><h2 class="terms"> Admin Login </h2></a>
        <a href="#trader-login" data-toggle="modal" data-target="#trader-login"><h2 class="terms"> Trader Login </h2></a>
        
    </div>
    
    
</section>    

<div class="modal fade" id="admin-login">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Administrator</h4>
        </div>
      <div class="modal-body">
          <form method="POST" action="../admin/adminlogin.php">
        
        		<label for="email">Email address</label>
        		<input type="email" placeholder="Enter email" name="email" required="required"/>
        		<span class="error">* Required </span>
      		 
    		  	<label for="password">Password</label>
    			<input type="password" placeholder="Password" name="password" required="required"/>
    		    <span class="error">* Required </span>
    		     
             <input type="submit" value="Log In" name="submit" class="buynow-button" />
    
        </form>
        
      </div>  
      </div>
    </div>
</div>

<div class="modal fade" id="trader-login">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Trader</h4>
        </div>
      <div class="modal-body">
          <form method="POST" action="../trader/traderlogin.php">
        
        		<label for="email">Email address</label>
        		<input type="email" placeholder="Enter email" name="email" required="required"/>
        		<span class="error">* Required </span>
      		 
    		  	<label for="password">Password</label>
    			<input type="password" placeholder="Password" name="password" required="required"/>
    			<span class="error">* Required </span>
    		 
             <input type="submit" value="Log In" name="submit" class="buynow-button" />
    
        </form>
        
      </div>  
      </div>
    </div>
</div>