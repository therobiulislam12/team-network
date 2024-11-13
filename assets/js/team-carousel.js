jQuery(document).ready(function ($) {
  $(".owl-carousel").owlCarousel({
    loop: true, // infinite loop
    margin: 10, // gap
    nav: false, // navigation
    dots: true, // dots
    slideBy: 1, // how many slide once time
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
    autoplay:true, // on autoplay
    autoplayTimeout:2000, // timeout ime
    autoplayHoverPause:true // pause play on hover
  });
});
