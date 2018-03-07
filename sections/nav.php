<?php 
 
//Varibles for the form validation
session_start();

include 'head.php';
include '../connection/init.php';
include 'footer.php';




?>


<!-- HEADER -->    
<header>
    
<nav class="navbar navbar-default navbar-fixed-top bronte-navbar animated fadeInDown">
  <div class="container">
  <div class="navbar-header pull-left">
    <a class="navbar-brand" href="../mainPages/index.php">Bronte Online </a>
          
        </div>
        <!-- 'Sticky' (non-collapsing) right-side menu item(s) -->
       <div class="navbar-header pull-right" id="#navbar">
          <ul class="nav navbar-nav pull-left">
            <!-- This works well for static text, like a username -->
            <li class="pull-left"><a href="../cart/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
           
          </ul>

          <!-- Required bootstrap placeholder for the collapsed menu -->
          <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        
        
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shops <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../mainPages/butchers.php">Butchers</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="../mainPages/greengrocers.php">Greengrocers</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="../mainPages/fishmongers.php">Fishmongers</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="../mainPages/bakery.php">Bakery</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="../mainPages/delicatessen.php">Delicatessen</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../mainPages/shop.php">All Shops</a></li>
              </ul>
            </li>
            <li><a href="../mainPages/contact.php">Contact Us</a></li>
            <li><a href="../mainPages/aboutus.php">About Us</a></li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
               <?php
                
                if (isset($_SESSION['authenticatedUser'])) {
                  
                  echo '<li><a href="../users/useraccount.php"> '.$_SESSION['personalUser']. ' <span class="glyphicon glyphicon-user"></span></a></li>';
                  echo '<li><a href="../login/logout.php">Logout <span class="glyphicon glyphicon-share"></span></a></li>';
                  
                } else {
                  
                
                  echo '<li><a href="#login" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user"></span></a></li>';
                  
                } 
               ?>
            
          </ul>
         </div>
        </div>
    </nav>
   

</header>
<!-- END OF HEADER --> 



<!-- MODALS -->
<div class="modal fade" id="login">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Log-in to Bronte</h4>
        </div>
      <div class="modal-body">
          <form method="POST" id="#loginForm" action="../login/login.php">
        
        		<label for="email">Email address:</label>
        		<input type="email" placeholder="Enter email" name="email" required="required"/>
        		<span class="error">* Required</span>
      		 
    		  	<label for="password">Password:</label>
    			  <input type="password" placeholder="Password" name="password" required="required"/>
    			  <span class="error">* Required</span>
    			  
    		 
            <input type="submit" name="submit" class="buynow-button" />
    
        </form>
        
      </div>  
      <div class="modal-footer">
          <a href="#sign-up" data-toggle="modal" data-target="#sign-up"><h2 class="getaccount"> Not Got An Account?</h2></a>
          <a href="#sign-up" data-toggle="modal" data-target="#sign-up" class="signup-button">Sign-up Now</a>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="sign-up">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Sign-up to Bronte</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="../sign-up/sign-up.php" autocomplete="off">
                        
                        <label for="CUSTOMER_FIRSTNAME">First Name:</label>
                        <input type="text" name="CUSTOMER_FIRSTNAME" placeholder="First Name" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="CUSTOMER_SURNAME">Surname:</label>
                        <input type="text" name="CUSTOMER_SURNAME" placeholder="Surname" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="PHONE_NUMBER">Phone Number: </label>
                        <input type="tel" pattern="^\d{11}" name="PHONE_NUMBER" placeholder="07123456789" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="ADDRESS">Address:</label>
                        <input type="text" name="ADDRESS" placeholder="Address" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="POSTCODE">Post Code:</label>
                        <input type="text" name="POSTCODE" placeholder="Postcode" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="EMAIL"> Email:</label>
                        <input type="email" name="EMAIL" placeholder="Email" autocomplete="off" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="PASSWORD">Password:</label>
                        <input type="password" name="PASSWORD" placeholder="Password" autocomplete="off" required="required" /> 
                        <span class="error">* Required </span>
                        

                        <input type="submit" value="Submit" name="Submit" class="buynow-button"  />
                       
                    </form>
         
         
        </div>
        <div class="modal-footer">
          <a href="#login-up" data-toggle="modal" data-target="#login-up"><h2 class="getaccount"> Already Got An Account?</h2></a>
          <a href="#login" data-toggle="modal" data-target="#login" class="signup-button">Log In</a>
        </div>
      </div>
    </div>
</div>

<!-- END OF MODALS -->