function closeOffcanvas() {
  var offcanvasElement = document.getElementById("offcanvasNavbar");
  var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
  if (offcanvas) {
    offcanvas.hide();
  }
}

function openDisclaimer() {
  // Close the offcanvas menu
  closeOffcanvas();

  // Show the disclaimer modal after a small delay to allow the menu to close
  setTimeout(function () {
    var disclaimerModal = new bootstrap.Modal(
      document.getElementById("disclaimer-modal")
    );
    disclaimerModal.show();

    // Add event listener to properly handle modal close
    document
      .getElementById("disclaimer-modal")
      .addEventListener("hidden.bs.modal", function () {
        // Remove the modal backdrop if it exists
        const backdrops = document.getElementsByClassName("modal-backdrop");
        while (backdrops.length > 0) {
          document.body.removeChild(backdrops[0]);
        }
        // Remove the modal-open class from body
        document.body.classList.remove("modal-open");
        // Reset body style
        document.body.style = "";
      });
  }, 300);
}

// Add event listener for the disclaimer menu item
document.addEventListener("DOMContentLoaded", function () {
  // This ensures the click handler is properly set up
  const disclaimerLinks = document.querySelectorAll(".disclaimer-menu-item");
  disclaimerLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      openDisclaimer();
    });
  });

  // Also add the same event listener to the modal's close button
  document
    .getElementById("disclaimer-modal")
    .addEventListener("hidden.bs.modal", function () {
      // Remove the modal backdrop if it exists
      const backdrops = document.getElementsByClassName("modal-backdrop");
      while (backdrops.length > 0) {
        document.body.removeChild(backdrops[0]);
      }
      // Remove the modal-open class from body
      document.body.classList.remove("modal-open");
      // Reset body style
      document.body.style = "";
    });
});

// Scroll effect for navbar
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 100) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// Reveal navbar on load
window.addEventListener("DOMContentLoaded", () => {
  const navbar = document.querySelector(".navbar");
  if (window.innerWidth >= 992) {
    navbar.classList.add("revealed");
  }
});

window.addEventListener("load", () => {
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    navbar.classList.add("revealed");
  }
});

$(document).ready(function () {
  Delete_Cookie("formfilled");
});

window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 100) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

window.addEventListener("DOMContentLoaded", () => {
  const navbar = document.querySelector(".navbar");
  if (window.innerWidth >= 992) {
    navbar.classList.add("revealed");
  }
});
window.addEventListener("load", () => {
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    navbar.classList.add("revealed");
  }
});

window.addEventListener("load", () => {
  const captions = document.querySelectorAll(".animate-caption");
  captions.forEach((caption) => {
    caption.classList.add("revealed");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const input = document.querySelector("#phone");
  window.intlTelInput(input, {
    initialCountry: "in",
    separateDialCode: true,
    utilsScript: "js/utils.js",
  });
});
$(".disclaimer_click").click(function () {
  $("#disclaimer-modal").modal("show");
});

function form_validate(elm) {
  jQuery("#" + elm + " input[type=submit], #" + elm + " button").prop(
    "disabled",
    true
  );
  setTimeout(function () {
    jQuery("#" + elm + " input[type=submit], #" + elm + " button").prop(
      "disabled",
      false
    );
  }, 5000);
  var name = jQuery("#" + elm + ' input[name="fname"]').val();
  var mobileno = jQuery("#" + elm + ' input[name="mobile"]').val();
  var emailid = jQuery("#" + elm + ' input[name="email"]').val();
  var message = jQuery("#" + elm + ' textarea[name="message"]').val();
  var fsource = jQuery("#" + elm + ' input[name="source"]').val();

  var current_url = location.hostname;

  if (name == "") {
    //alert("Please Enter Your Name");
    return false;
  }

  mobileno = mobileno.replace(/[^0-9]/g, "");
  if (mobileno.length != 10) {
    //alert("Please Enter 10 Digit Mobile Number");
    return false;
  }
  var atpos = emailid.indexOf("@");
  var dotpos = emailid.lastIndexOf(".");
  if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= emailid.length) {
    return false;
  }

  if (message == undefined) {
    message = "";
  }
  if (name != "" && mobileno != "") {
    $("#pageloader").fadeIn();
    if (fsource == "Download Brochure") {
      document.getElementById("bro-pdf").click();
    }

    return true;
  }
  return false;
}

function submitForm(elm) {
  document.createElement("form").submit.call(document.getElementById(elm));
}

Fancybox.bind('[data-fancybox="gallery"]', {
  Thumbs: {
    autoStart: true, // show thumbnails on open
  },
  Toolbar: {
    display: [
      "zoom", // zoom in/out
      "slideshow", // start/stop slideshow
      "fullscreen", // full screen
      "download", // download image
      "thumbs", // show thumbnails
      "close", // close button
    ],
  },
  // Optional: enable mouse wheel zoom
  Image: {
    zoom: true,
  },
});

// document.addEventListener("DOMContentLoaded", function () {
//   // Wait 3 seconds
//   setTimeout(function () {
//     var enquiryModal = new bootstrap.Modal(
//       document.getElementById("enquiry-modal")
//     );
//     enquiryModal.show();
//   }, 3000); // 3000ms = 3 seconds
// });

document.addEventListener("DOMContentLoaded", function () {
  // Block modal auto-open on thank you page
  if (window.location.pathname.includes("thank-you")) {
    return; // Do nothing
  }

  // Otherwise, open after 3 seconds
  setTimeout(function () {
    var enquiryModalEl = document.getElementById("enquiry-modal");
    if (enquiryModalEl) {
      var enquiryModal = new bootstrap.Modal(enquiryModalEl);
      enquiryModal.show();
    }
  }, 3000);
});
