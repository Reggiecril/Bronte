<?php 

include '../sections/nav.php';

?>

<div class="container">
    <hr class="line">
            <h2 class="tabs-title"> Contact us </h2>
              <hr class="line">
<form role="form" action="https://formspree.io/matthewjameshowarth@gmail.com" method="post">
    <div class="form-group">
        <label for="c-form-name">
            <span class="label-text">Firstname:</span> 
            <span class="contact-error"></span>
        </label>
        <input type="text" name="first_name" placeholder="Your name..." class="c-form-name form-control" id="c-form-name">
    </div>
    <div class="form-group">
        <label for="c-form-email">
            <span class="label-text">Email:</span> 
            <span class="contact-error"></span>
        </label>
        <input type="text" name="email" placeholder="Your email address..." class="c-form-email form-control" id="c-form-email">
    </div>
    <div class="form-group">
        <label for="c-form-shop">
            <span class="label-text">Shop:</span> 
            <span class="contact-error"></span>
        </label>
        <select name="shop" class="c-form-shop form-control" id="c-form-profession">
            <option value="Your shop...">Your shop...</option>
            <option value="Web design">Butchers</option>
            <option value="SEO">GreenGrochers</option>
            <option value="Marketing">Fishmongers</option>
            <option value="Marketing">Bakery</option>
            <option value="Marketing">Delicatessen</option>
        </select>
    </div>
    <div class="form-group">
        <label for="c-form-message">
            <span class="label-text">Message:</span> 
            <span class="contact-error"></span>
        </label>
        <textarea name="message" placeholder="Message text..." class="c-form-message form-control" id="c-form-message"></textarea>
    </div>
    <button type="submit" value="Submit" class="buynow-button">Send message</button>
</form>
</div>

<?php 

include '../sections/bottom-section.php';
include '../sections/contact-form.php';

//../sections/contact-form.php

?>