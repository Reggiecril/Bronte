
var $document = $(document),
  $element = $('.navbar'),
  navbarDefault = 'navbar';
  navbarTransparent = 'bronte-navbar';
  fadeInDown = 'fadeInDown'; 

$document.scroll(function() {
  if ($document.scrollTop() >= 50) {

    $element.addClass(navbarDefault);
    $element.removeClass(navbarTransparent);
    $element.addClass(fadeInDown);

  } else {

    $element.addClass(navbarTransparent);
    $element.removeClass(navbarDefault);
    $element.removeClass(fadeInDown);
  }

}); 

