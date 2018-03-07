<?php 
    include '../sections/nav.php';
    ?>
        <video poster="../assets/video/star1.PNG" autoplay="true" loop>
        <source src="../assets/video/advertisement.mp4" type="video/mp4">

        </video>

<section class="about-us-section">
    <div class="about-us-container">
      
        
        
       <div class="col-lg-12 col-md-12 col-xs-12">
          
          <img src="../assets/img/Carousel-home.png" alt="Home-image" class="centered-img hidden-xs">
          <img src="../assets/img/Bronte-logo.png" alt="Logo" class="centered-img hidden-lg hidden-md hidden-sm">
          
        </div>
    </div>

<div id="wrapper">
  <div id="left-side">
  <ul>
    <li class="strategy active">
    
    Strategy  
    </li>
    <li class="members">
    
    Members
    </li>
    <li class="location">
    
    Location
    </li>
    <li class="history">
    
    History
    </li>
  </ul>
  </div>

  <div id="border">
  <div id="line" class="one"></div>
  </div>

  <div id="right-side">
  <div id="first" class="active">
   

    <h1>Our Strategy</h1>

    <p>There are six priorities ahead for the business as we rebuild the company by defining and strengthening the brand:</p>

    <p>Be more competitive -To be more competitive means helping customers make every penny go further, saving them money on the everyday items they want and need. We use our expertise as food makers and shopkeepers to ensure that our own brand products offer the best possible quality at the best possible price.</p>

    <p>Serve our customers better - We listen to our customers and make changes across the business that are lead by what they tell us. We are always improving what we offer shoppers, and work hard to make the right colleagues available in the right place at the right time.</p>

    <p>Find local solutions - We want to deliver those solutions that benefit each store’s community. That could be anything from stocking locally produced food favourites to creating a filter lane in to a petrol station that best suits the nearby traffic flow. If we listen to what our local customers want it becomes meaningful at a national level.</p>

    <p>Develop popular and useful services - Our aim is to offer customers a one-stop-shop and give them more of what they want on a shopping trip. We continue to refresh what our stores and cafés offer and install practical services that shoppers appreciate, like key cutting, mobile phone repair stations and pick-up points that are compatible with leading online retailers.</p>

    <p>Simplify and speed up - We continue to simplify and speed up, building a culture based on teamwork with a clear and consistent way of working. We aim to be cost conscious and create a leaner, efficient business that's more responsive to customers.</p>

    <p>Make the core supermarkets strong again - We continue to refit and refresh our stores and cafés, incorporating ideas that have been suggested by customers and staff. Our ‘Fresh Look’ is helping improve the shopping trip and demonstrate just how much we care about the food we sell and make ourselves. Market Street and the craft skills of colleagues make Bronte different and are truly valued by customers.</p>

  </div>
  <div id="second">
  

    <h1>Our Members</h1>
    <p><strong>Jake</strong>-------Website Design</p>
    <p><strong>Saira</strong>-------Database</p>
    <p><strong>Sitch</strong>-------Database</p>
    <p><strong>Matthew</strong>-------Website and Database Design</p>
    <p><strong>Reggie</strong>-------Website Design</p>
    
  </div>
  <div id="third">
   
    <div class="about-us-location">
    <h1>Our Location</h1>
    </div>
    <div></div>
    <div class="about-us-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2009.0678715314737!2d-1.5917076037393858!3d53.82606347434702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb68f2e28a4adb62a!2sLeeds+Beckett+University-+Bront%C3%AB+Hall!5e0!3m2!1szh-CN!2suk!4v1493458257924" width="500" height="450" frameborder="0" style="border:2px double #000; border-radius: 10px;" allowfullscreen></iframe>
    </div>
  </div>
  <div id="fourth">
   

    <h1>Our History</h1>

    <p><strong>2017</strong>-----Bronte was established. It had 5 members to operate and kinds of food provided. </p>

  </div>
  </div>
</div>



<script src='../js/about us.js'></script>


<script>$('.strategy').click(function () {
  $('.strategy').addClass('active');
  $('.strategy > .icon').addClass('active');
  $('.members').removeClass('active');
  $('.location').removeClass('active');
  $('.history').removeClass('active');
  $('.members > .icon').removeClass('active');
  $('.location > .icon').removeClass('active');
  $('.history > .icon').removeClass('active');
  $('#line').addClass('one');
  $('#line').removeClass('two');
  $('#line').removeClass('three');
  $('#line').removeClass('four');
});
$('.members').click(function () {
  $('.members').addClass('active');
  $('.members > .icon').addClass('active');
  $('.strategy').removeClass('active');
  $('.location').removeClass('active');
  $('.history').removeClass('active');
  $('.strategy > .icon').removeClass('active');
  $('.location > .icon').removeClass('active');
  $('.history > .icon').removeClass('active');
  $('#line').addClass('two');
  $('#line').removeClass('one');
  $('#line').removeClass('three');
  $('#line').removeClass('four');
});
$('.location').click(function () {
  $('.location').addClass('active');
  $('.location > .icon').addClass('active');
  $('.members').removeClass('active');
  $('.strategy').removeClass('active');
  $('.history').removeClass('active');
  $('.members > .icon').removeClass('active');
  $('.strategy > .icon').removeClass('active');
  $('.history > .icon').removeClass('active');
  $('#line').addClass('three');
  $('#line').removeClass('two');
  $('#line').removeClass('one');
  $('#line').removeClass('four');
});
$('.history').click(function () {
  $('.history').addClass('active');
  $('.history > .icon').addClass('active');
  $('.members').removeClass('active');
  $('.location').removeClass('active');
  $('.strategy').removeClass('active');
  $('.members > .icon').removeClass('active');
  $('.location > .icon').removeClass('active');
  $('.strategy > .icon').removeClass('active');
  $('#line').addClass('four');
  $('#line').removeClass('two');
  $('#line').removeClass('three');
  $('#line').removeClass('one');
});
$('.strategy').click(function () {
  $('#first').addClass('active');
  $('#second').removeClass('active');
  $('#third').removeClass('active');
  $('#fourth').removeClass('active');
});
$('.members').click(function () {
  $('#first').removeClass('active');
  $('#second').addClass('active');
  $('#third').removeClass('active');
  $('#fourth').removeClass('active');
});
$('.location').click(function () {
  $('#first').removeClass('active');
  $('#second').removeClass('active');
  $('#third').addClass('active');
  $('#fourth').removeClass('active');
});
$('.history').click(function () {
  $('#first').removeClass('active');
  $('#second').removeClass('active');
  $('#third').removeClass('active');
  $('#fourth').addClass('active');
});</script>



</section>

<?php 
 
  include '../sections/bottom-section.php'; 
 
?>