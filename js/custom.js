AOS.init({
  easing: "ease-out-back",
});
// Splitting();

jQuery(document).ready(function ($) {
  Delete_Cookie("formfilled");
  $(".price-click").click(function () {
    $("#price-modal").modal("show");
  });
  $(".i-am").click(function () {
    $("#enquiry-modal").modal("show");
  });
  $(".floor-click").click(function () {
    $("#floor-modal").modal("show");
  });

  $(".gallery-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 25,
    autoplay: true,
    autoplayTimeout: 4000,
    smartSpeed: 2500,
    autoplayHoverPause: true,
    nav: false,
    dots: false,
    navText: ["<img src='images/left.png'>", "<img src='images/right.png'>"],
    responsive: {
      0: {
        items: 1,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 2,
        loop: true,
        autoplay: true,
      },
    },
  });

  $(".video-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 25,
    autoplay: true,
    autoplayTimeout: 4000,
    smartSpeed: 2500,
    autoplayHoverPause: true,
    nav: false,
    dots: false,
    navText: ["<img src='images/left.png'>", "<img src='images/right.png'>"],
    responsive: {
      0: {
        items: 1,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 2,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 3,
        loop: true,
        autoplay: true,
      }
    },
  });
});



jQuery(document).ready(function ($) {
  // Add smooth scrolling to all links
  $(".m-link").on("click", function (event) {
    $(".btn-close").click();

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      var extraSpace = 50;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area

      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top - extraSpace,
        },
        800,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          // window.location.hash = hash;
        }
      );
    } // End if
  });
});
