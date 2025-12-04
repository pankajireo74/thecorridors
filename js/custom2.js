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

// Lightweight Levenshtein distance for short email domains
function domainDistance(a, b) {
  a = (a || "").toLowerCase();
  b = (b || "").toLowerCase();
  if (a === b) return 0;
  var m = a.length;
  var n = b.length;
  if (m === 0) return n;
  if (n === 0) return m;
  var dp = [];
  for (var i = 0; i <= m; i++) {
    dp[i] = [i];
  }
  for (var j = 1; j <= n; j++) {
    dp[0][j] = j;
  }
  for (var i2 = 1; i2 <= m; i2++) {
    for (var j2 = 1; j2 <= n; j2++) {
      var cost = a[i2 - 1] === b[j2 - 1] ? 0 : 1;
      dp[i2][j2] = Math.min(
        dp[i2 - 1][j2] + 1,
        dp[i2][j2 - 1] + 1,
        dp[i2 - 1][j2 - 1] + cost
      );
    }
  }
  return dp[m][n];
}

function form_validate(elm) {
  // Basic front-end validation + submit throttling (existing behaviour)
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

  var $form = jQuery("#" + elm);
  var name = ($form.find('input[name="fname"]').val() || "").trim();
  var mobileno = ($form.find('input[name="mobile"]').val() || "").trim();
  var emailid = ($form.find('input[name="email"]').val() || "").trim();
  var message = $form.find('textarea[name="message"]').val();
  var fsource = $form.find('input[name="source"]').val();

  if (!name) {
    return false;
  }

  // Normalise mobile: keep digits only (basic client-side check; server does strict checks)
  mobileno = (mobileno || "").replace(/[^0-9]/g, "");
  if (mobileno.length !== 10) {
    return false;
  }

  if (emailid) {
    // Lowercase + basic regex email validation (client-side only; backend re-validates)
    emailid = emailid.toLowerCase();
    var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
    if (!emailRegex.test(emailid)) {
      return false;
    }

    // Soft warning: common domain typo detection (gmail.com, yahoo.com, etc.)
    var parts = emailid.split("@");
    if (parts.length === 2) {
      var domain = parts[1];
      var commonDomains = [
        "gmail.com",
        "yahoo.com",
        "yahoo.co.in",
        "hotmail.com",
        "outlook.com",
        "live.com",
        "msn.com",
        "icloud.com",
        "rediffmail.com"
      ];

      for (var i = 0; i < commonDomains.length; i++) {
        var genuine = commonDomains[i];
        if (domain !== genuine && domainDistance(domain, genuine) === 1) {
          // Only prompt once per page load to avoid annoyance
          if (!window.__EMAIL_DOMAIN_TYPO_CONFIRMED__) {
            var msg =
              "Your email domain is '" +
              domain +
              "', did you mean '" +
              genuine +
              "'?\n\n" +
              "If this is a typo, click Cancel to fix it.\n" +
              "If it is correct, click OK to submit anyway.";
            var proceed = window.confirm(msg);
            if (!proceed) {
              return false; // Let user correct the email
            }
            window.__EMAIL_DOMAIN_TYPO_CONFIRMED__ = true;
          }
          break;
        }
      }
    }
  }

  if (typeof message === "undefined") {
    message = "";
  }

  if (name !== "" && mobileno !== "") {
    $("#pageloader").fadeIn();
    if (fsource === "Download Brochure") {
      var broPdf = document.getElementById("bro-pdf");
      if (broPdf) {
        broPdf.click();
      }
    }

    // Integrate Google reCAPTCHA v3 (Invisible)
    if (
      typeof grecaptcha !== "undefined" &&
      typeof window.RECAPTCHA_SITE_KEY !== "undefined" &&
      window.RECAPTCHA_SITE_KEY
    ) {
      grecaptcha.ready(function () {
        grecaptcha
          .execute(window.RECAPTCHA_SITE_KEY, { action: "submit" })
          .then(function (token) {
            // Try to find an existing hidden input for this form
            var tokenInput =
              $form.find('input[name="recaptcha_token"]').get(0) || null;

            if (!tokenInput) {
              tokenInput = document.createElement("input");
              tokenInput.type = "hidden";
              tokenInput.name = "recaptcha_token";
              $form.get(0).appendChild(tokenInput);
            }

            tokenInput.value = token;

            // Submit the form programmatically after token is set
            $form.get(0).submit();
          });
      });

      // Prevent default submit; we will submit after token is set
      return false;
    }

    // Fallback: if reCAPTCHA is not configured/loaded, behave as before
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
