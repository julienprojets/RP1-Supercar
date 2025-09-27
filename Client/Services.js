$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      center: true, 
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
      smartSpeed: 300,
      responsive: {
          0: { items: 1 },
          600: { items: 2 },
          1000: { items: 3 }
      },
      onTranslated: function(){
        $(".owl-item").removeClass("active"); // Remove active class from all
        $(".owl-item.center").addClass("active"); // Add to the centered one
      }
  });

    // Ensure first slide gets active class on load
    $(".owl-carousel").one("initialized.owl.carousel", function(){
      $(".owl-item.center").addClass("active");
  });

});