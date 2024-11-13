jQuery(document).ready(function ($) {
//   $(".owl-carousel").owlCarousel();

  $("#team-network-carousel").owlCarousel({
    items: 2,
    itemsDesktop: [1000, 3],
    itemsDesktopSmall: [979, 2],
    itemsTablet: [768, 2],
    itemsMobile: [650, 1],
    pagination: true,
    autoPlay: true,
  });
});
