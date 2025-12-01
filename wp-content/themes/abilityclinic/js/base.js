let $ = jQuery;
$(document).ready(function () {
  var currentHostname = window.location.hostname;

  function handleLink(link) {
    var linkHostname = link.hostname;

    if (linkHostname !== currentHostname) {
      link.setAttribute("target", "_blank");
    }
  }
  document.querySelectorAll("a").forEach(function (link) {
    handleLink(link);
  });
});

$(function () {
  navCall();
  sliderFit();
  pageNavActive();
  // MobItemView();
  // ImageView();
  get_article();
  arrowstyle();
  check_date();
  sliderLogos();
  setContentHeight();
});

$(function () {
  console.log("Ability Clinic");
});

$(window).on("resize", function () {
  if ($(window).innerWidth() > 1200) {
    $("#navCall").removeClass("is-active");
    $("#navSite")
      .removeClass("position-absolute start-0 top-100 w-100")
      .addClass("d-none");
    $("#navSite .nav").removeClass("flex-column");
  }
});

function arrowstyle() {
  $(".navsite li ul li")
    .find(".arrow")
    .attr("style", "color: #1A356D!important; ");

  // $(".navsite ul li").find(".arrow").addClass("d-xl-none");
}

jQuery(window).load(function () {
  $('video').each(function () {
    if (!$(this).attr('src')) {
      $(this).attr('src', $(this).data('src'));
    }
    if ($(this).hasClass('loading')) {
      $(this).removeClass('loading');
    }
  });
});

function sliderFit() {
  if ($(".partner-icons").length > 0) {
    $(".partner-icons").owlCarousel({
      loop: true,
      margin: 10,
      dots: false,
      nav: false,
      center: false,
      autoplay: true,
      slideTransition: "linear",
      // lazyLoad: true,
      smartSpeed: 3000,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      mouseDrag: false,
      touchDrag: false,
      responsive: {
        0: {
          items: 2,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
      navText: [
        '<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scaleX(-1) scale(1.65217); fill: #fff;"><path d="M857.005,231.479L858.5,230l18.124,18-18.127,18-1.49-1.48L873.638,248Z" transform="translate(-855 -230)"></path></svg>',
        '<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scaleX(1) scale(1.65217); fill: #fff;"><path d="M857.005,231.479L858.5,230l18.124,18-18.127,18-1.49-1.48L873.638,248Z" transform="translate(-855 -230)"></path></svg>',
      ],

    });
  }
}

function navCall() {
  $("#navCall").on("click", function () {
    $(this).toggleClass("is-active");
    $("#navSite").toggleClass("d-none position-absolute start-0 top-100 w-100");
    $("#navSite .nav").toggleClass("flex-column");
  });

  $("#navSite .arrow").on("click", function () {
    $(this).closest(".menu-item-has-children").toggleClass("clicked");
    $(this).parent().siblings(".menu-item-has-children").removeClass("clicked"); //
  });

  $("#menu-item-1733").on("click", function () {
    closeNavCall();
  });
  $("#menu-item-1741").on("click", function () {
    closeNavCall();
  });
  $("#menu-item-22 a").on("click", function () {
    closeNavCall();
  });
  // $("#menu-item-1733").on("click", function () {
  //   closeNavCall();
  // });
  $("#menu-item-3199").on("click", function () {
    closeNavCall();
  });
}

function closeNavCall() {
  if ($(window).innerWidth() < 768) {
    $("#navCall").toggleClass("is-active");
    $("#navSite").toggleClass("d-none position-absolute start-0 top-100 w-100");
    $("#navSite .nav").toggleClass("flex-column");
  }
}

function pageNavActive() {
  $("#navSite .current-menu-item")
    .not("#navSite .current-menu-item:first")
    .removeClass("current-menu-item");
}

// function MobItemView() {
//   var parentMenuItem = $(".menu-item-18");
//   var childItems = parentMenuItem.find(".sub-menu li");
//   $(childItems[0]).find("a").attr("target", "_self");
//   $(childItems[0]).addClass("d-xl-none");
//   $(childItems[1]).addClass("d-xl-none");
// }

function get_article() {
  $(".articles-nav-menu-opt")
    .find("select")
    .change(function () {
      var value = $(this).val();
      window.location.href = value;
    });
}

function CopyArticleLink() {
  const copytext = document.getElementById("article-data-link").innerText;
  navigator.clipboard.writeText(copytext);
}

function ImageView() {
  var img = $("#art-content-doc").find("img");
  img.attr("id", "myImg");

  var modal = $("#artImgModal");
  var modalImg = $("#img01");

  img.on("click", function () {
    modal.css("display", "block");
    modalImg.attr("src", this.src);
  });

  var span = $(".over-close")[0];
  if (span) {
    span.onclick = function () {
      modal.css("display", "none");
    };
  }
}

// $(function () {
//   var ctForm = $("#formsubmit").closest("form")[0];
//   $(ctForm).on("submit", function (event) {
//     event.preventDefault();

//     if (validateForm()) {
//       $.ajax({
//         type: "POST",
//         url: $(this).attr("action"),
//         data: $(this).serialize(),
//         success: function (response) {
//           $(".wpcf7-response-output").css("display", "none");
//           setTimeout(function () {
//             $("#responseModalBody").text(
//               "Thanks! Your message has been sent to Ability Clinic."
//             );
//             $("#responseModal").modal("show");
//           }, 1000);
//           console.log(response);
//         },
//       });
//     } else {
//       console.log("All Fields Required");
//       return false;
//     }
//   });

//   function validateForm() {
//     var isValid = true;

//     $(ctForm)
//       .find(":input.wpcf7-validates-as-required")
//       .each(function () {
//         if (!$(this).val()) {
//           isValid = false;
//           return false;
//         }
//       });

//     return isValid;
//   }
// });

$(function () {
  let pathName = window.location.pathname;
  if (pathName == "/category/neurology/") {
    $("#article-menu-dropdown").val("/category/neurology/");
  }
  if (pathName == "/category/physical-medicine-and-rehabilitation/") {
    $("#article-menu-dropdown").val(
      "/category/physical-medicine-and-rehabilitation/"
    );
  }
  if (pathName == "/category/rheumatology/") {
    $("#article-menu-dropdown").val("/category/rheumatology/");
  }
  if (pathName == "/category/rehabilitation-and-wellness/") {
    $("#article-menu-dropdown").val("/category/rehabilitation-and-wellness/");
  }
  if (pathName == "/articles/") {
    $("#article-menu-dropdown").val("/articles/");
  }
});

$(window).load(function () {
  var IsInViewport = function (el) {
    if (typeof jQuery === "function" && el instanceof jQuery) el = el[0];
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= -150 &&
      rect.left >= 0 &&
      rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) + 150 &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  $(window).scroll(function () {
    $("video").each(function () {
      let getVideoid = $(this).attr("id");
      if (getVideoid !== "hero-video-banner") {
        if (IsInViewport($(this))) {
          $(this)[0].play();
        } else {
          $(this)[0].pause();
        }
      }
    });
  });
});

$(window).on("resize", function () {
  var header = document.getElementById("header");
  if (header) {
    var headerHeight = header.offsetHeight + "px";
    var articleBar = document.getElementsByClassName(
      "article-section-container"
    )[0];
    if (articleBar) {
      articleBar.style.top = headerHeight;
    }
  }
});

$(function () {
  $(".wpcf7-response-output").on("DOMSubtreeModified", function () {
    var text = $(this).text().trim();

    if (text) {
      $("#responseModalBody").text(text);
      $("#responseModal").modal("show");

      $(".wpcf7-response-output").empty();
    }
  });
});

$(function () {
  let currentPage = 1;
  $("#load-more").on("click", function () {
    // $("#load-more").attr("disabled", true);
    category = $(this).attr("data-value");

    load_posts(category);

    // $.ajax({
    //   type: "POST",
    //   url: "/wp-admin/admin-ajax.php",
    //   dataType: "html",
    //   data: {
    //     action: "article_load_more",
    //     paged: currentPage,
    //   },
    //   success: function (response) {
    //     $("#post_article").append(response);
    //   },
    // });
  });
});

/**
 * Original Load POsts
 */

// var ppp = 6;
// var pageNumber = 1;
// function load_posts() {
//   var str =
//     "&pageNumber=" + pageNumber + "&ppp=" + ppp + "&action=more_post_ajax";
//   $.ajax({
//     type: "POST",
//     dataType: "html",
//     url: ajaxarticles.ajaxurl,
//     data: str,
//     success: function (data) {
//       var $data = $(data);
//       if ($data.length) {
//         $("#post_article").append($data);
//         pageNumber++;
//         $("#load-more").attr("disabled", false);
//       } else {
//         $("#load-more").attr("disabled", true);
//       }
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//       $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
//     },
//   });
//   return false;
// }

/**
 * New Load post
 */
var ppp = 6;
var pageNumber = 1;
function load_posts(category) {
  var str =
    "&pageNumber=" +
    pageNumber +
    "&ppp=" +
    ppp +
    "&category=" +
    category +
    "&action=more_post_ajax";

  $.ajax({
    type: "POST",
    dataType: "html",
    url: ajaxarticles.ajaxurl,
    data: str,
    success: function (data) {
      var $data = $(data);
      if ($data.length) {
        $("#post_article").append($data);
        pageNumber++;
        $("#load-more").attr("disabled", false);
      } else {
        $("#load-more").attr("disabled", true);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
    },
  });
  return false;
}

function check_date() {
  let dob_elements = document.querySelectorAll("input[type='date']");
  dob_elements.forEach((dob_el) => {
    if (dob_el) {
      dob_el.addEventListener("change", function () {
        let current_date = new Date();
        let dob_date = new Date(dob_el.value);
        if (dob_date > current_date) {
          $("#responseModalBody").text("Date should be less than current Date");
          $("#responseModal").modal("show");
          dob_el.value = "";
        }
      });
    }
  });
}

$(function () {
  $("marquee")
    .find(".logo-sec")
    .mouseover(function () {
      $(this).closest("marquee").trigger("stop");
    })
    .mouseout(function () {
      $(this).closest("marquee").trigger("start");
    });
});

function pageScroll() {
  let headerHeight = $("#header").outerHeight();
  $("#navSite a").on("click", function () {
    let hashPos = $(this).attr("href").indexOf("#");
    let hashID = $(this).attr("href").slice(hashPos);
    const isFixedHeader = true;
    $("html, body").animate(
      {
        scrollTop: $(hashID).offset().top - headerHeight,
      },
      "normal"
    );
  });
}

$(function () {
  $("#patient-refferal").on("click", function (event) {
    event.preventDefault();
    var paragraphElement = $("#referralpdf");
    var pdfUrl = paragraphElement.text().trim();
    console.log("PDF URL:", pdfUrl);
    var link = $("<a style='display: none;'/>");
    link.attr("href", pdfUrl);
    link.attr("download", "New Referral.pdf");
    $("body").append(link);
    link[0].click();
    link.remove();
  });
});
$(function () {
  $("#pdf_name_refferal").on("click", function (event) {
    event.preventDefault();
    var paragraphElement = $("#referralpdf");
    var pdfUrl = paragraphElement.text().trim();
    console.log("PDF URL:", pdfUrl);
    var link = $("<a style='display: none;'/>");
    link.attr("href", pdfUrl);
    link.attr("download", "New Referral.pdf");
    $("body").append(link);
    link[0].click();
    link.remove();
  });
});

/**smtp  */
$(function () {
  $("#testsend").on("click", function () {
    var data = {
      action: "executeSmtp",
      nonce: ajaxarticles.nonce,
    };

    $.ajax({
      url: ajaxarticles.ajaxurl,
      type: "post",
      data: data,
      success: function (response) {
        console.log("Response:", response);
        if (response.success) {
          console.log("Email sent successfully!");
        } else {
          console.log("Error:", response.error);
        }
      },
      error: function (xhr, status, error) {
        console.log("Error:", error);
      },
    });
  });
});

$(function () {
  $("#articles_Search").on("click", function (event) {
    event.preventDefault();
    $("#load-more").hide();
    let query = $("#query_article").val();
    let nonce = ajaxarticles.nonce;
    console.log(query, "Query");
    $.ajax({
      type: "POST",
      dataType: "json",
      url: ajaxarticles.ajaxurl,
      data: {
        action: "ajax_articles",
        query: query,
        security: nonce,
      },
      success: function (data) {
        $("#post_article").empty();
        data.forEach((elem) => {
          let post = `
            <div class="col-md-6">
              <div class="border h-100">
                <div class="img d-md-flex justify-content-md-center align-items-md-center w-100 order-md-2"
                  style="height: 196px;">
          `;
          if (elem.featured_image) {
            post += `<img src="${elem.featured_image}" alt="Default Image" class="img-fluid h-100 w-100 wrap-image-article p-1" style="object-fit: cover;" />`;
          } else {
            post += `<img src="wp-content/uploads/2024/10/ability-icon.webp" alt="Default Image" class="img-fluid wrap-image-article p-1 h-100 w-100 " style="object-fit: cover;" />`;
          }

          post += `
                </div>
                <div class="p-md-4 order-md-1 p-2 w-100 justify-content-between">
                  <div class="post-content-article mb-md-0 mb-4 overflow-y-hidden">
                    <h2 class="fs-4 fw-bold"><a href="${elem.post_url}">${elem.title}</a></h2>
                    <small class="fw-light d-flex align-items-center mb-3">${elem.content}</small>
                    <small class="fw-bold d-flex align-items-center">
                      <a class="text-decoration-none" style="color: #f97224;" href="${elem.post_url}">Read More &nbsp;&nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          `;
          $("#post_article").append(post);
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(errorThrown, textStatus, jqXHR, "error");
      },
    });
  });
});

// function sliderLogos() {
//   if ($(".partner-icons").length > 0) {
//     $(".partner-icons").owlCarousel({
//       loop: true,
//       margin: 10,
//       dots: false,
//       nav: false,
//       center: true,
//       autoplay: true,
//       slideTransition: "linear",
//       // lazyLoad: true,
//       smartSpeed: 3000,
//       autoplayTimeout: 3000,
//       autoplayHoverPause: true,
//       mouseDrag: false,
//       touchDrag: false,
//       responsive: {
//         0: {
//           items: 2,
//         },
//         600: {
//           items: 3,
//         },
//         1000: {
//           items: 5,
//         },
//       },
//     });
//   }
// }


function setContentHeight() {
  if (window.innerWidth > window.innerHeight) {
    var headerHeight = document.getElementById('header').clientHeight;
    $("#menu-primary-menu .menu-item").on("click", function (e) {

      $(this).siblings().find('a').each(function () {
        let otherhref = $(this).attr('href');

        if (otherhref && otherhref.includes('#')) {
          let otherHash = otherhref.split('#')[1];
          if (otherHash) {
            $("#" + otherHash).css("padding-top", "0px");
          }
        }
      });

      let href = $(this).find('a').attr('href');

      if (href && href.includes('#')) {
        let hash = href.split('#')[1];

        if (hash) {
          let targetElement = $("#" + hash);

          if (targetElement.length) {
            targetElement.css("padding-top", headerHeight + 20 + "px");
          }
        }
      }
    });
  }
}
jQuery(document).ready(function ($) {
  // Create a custom error message element
  let specialtyError = $('<small id="specialtyError" style="color: #dc3232; font-size: 1em; font-weight: normal; display: block;">Please fill out any one of the specialty options.</small>');


  // Function to check and hide default error messages
  function hideDefaultErrorMessage() {
    let dtttt = $('.wpcf7-form-control-wrap[data-name="Specialty"]');
    let stspan = dtttt.find('.wpcf7-not-valid-tip');
    if (stspan.length) {
      stspan.hide(); // Hide the default error message
    }
  }

  // MutationObserver to watch for changes in the form
  let observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      hideDefaultErrorMessage(); // Hide default error when it appears
    });
  });

  // Observe changes in the form for the default error message
  let targetNode = document.querySelector('.wpcf7-form');
  if (targetNode) {
    observer.observe(targetNode, { childList: true, subtree: true });
  }

  // On form submission, check if any checkbox is checked
  $('.wpcf7 form').on('submit', function (event) {
    let isChecked = $('input[name="Specialty[]"]:checked').length > 0;

    let dtttt = $('.wpcf7-form-control-wrap[data-name="Specialty"]');
    hideDefaultErrorMessage(); // Immediately hide default error on form submit

    if (!isChecked) {
      event.preventDefault(); // Prevent form submission
      if (!$('#specialtyError').length) {
        dtttt.append(specialtyError); // Show custom error message if not already shown
      }
    }
  });

  // Remove the custom error message when a checkbox is checked
  $('input[name="Specialty[]"]').on('change', function () {
    let isChecked = $('input[name="Specialty[]"]:checked').length > 0;

    if (isChecked) {
      $('#specialtyError').remove(); // Remove custom error when a checkbox is selected
    }
    else {
      dtttt.append(specialtyError); // Show custom error message if not already shown
    }
  });
});

function sliderLogos() {
  if ($(".insurance-icons").length > 0) {
    $(".insurance-icons").owlCarousel({
      loop: true,
      margin: 0,
      dots: false,
      nav: false,
      center: false,
      autoplay: true,
      slideTransition: "linear",
      // lazyLoad: true,
      smartSpeed: 3000,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      mouseDrag: false,
      touchDrag: false,
      responsive: {
        0: {
          items: 2,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 6,
        },
      },
    });
  }
}

$(document).on('contextmenu', function (event) {
  event.preventDefault();
});
jQuery(document).ready(function () {

  $(".media-section-carousel").owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    nav: true,
    autoplay: false,
    autoplayHoverPause: false,
    mouseDrag: true,
    touchDrag: true,
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
  });

});


// =================  Scroll Animation Content =============

// $(document).on('ready', function () {
//   setContentScroll('.selected-links');
//   setContentScroll('#menu-item-22 a');
// });
// // Add this to your main JS file or in a <script> tag at the bottom of your page
// (function() {
//   // Store the hash if there is one
//   let targetHash = window.location.hash;
  
//   // Function to handle the scrolling with multiple fallback options
//   function scrollToTarget(hash) {
//     if (!hash) return;
    
//     // Clean the hash to ensure it's a valid selector
//     let targetId = hash.replace(/^#/, '');
//     let $target = $('#' + targetId);
    
//     if (!$target.length) return;
    
//     // Get header height with fallback
//     let headerHeight = $('#header').outerHeight() || $('header').outerHeight() || 0;
    
//     // Use requestAnimationFrame for smoother scrolling
//     window.requestAnimationFrame(function() {
//       let targetOffset = $target.offset().top;
//       let scrollTo = targetOffset - headerHeight - 30; // Extra padding
      
//       // Try multiple scrolling methods for compatibility
//       try {
//         // Method 1: jQuery animate with callback to ensure completion
//         $('html, body').animate({
//           scrollTop: scrollTo
//         }, 1000, 'swing', function() {
//           // Double-check position after animation
//           if (Math.abs($(window).scrollTop() - scrollTo) > 50) {
//             // If animation didn't get close enough, try once more with a delay
//             setTimeout(function() {
//               window.scrollTo({
//                 top: scrollTo,
//                 behavior: 'smooth'
//               });
//             }, 200);
//           }
//         });
//       } catch (e) {
//         // Method 2: Fallback to native smooth scrolling
//         window.scrollTo({
//           top: scrollTo,
//           behavior: 'smooth'
//         });
//       }
//     });
//   }
  
//   // Handle hash links on the same page
//   function setupHashLinks() {
//     // Target all potential navigation links that have hash anchors
//     $('a[href*="#"]:not([href="#"])').on('click', function(e) {
//       let href = $(this).attr('href');
      
//       // Check if link is to the same page or has a hash
//       if (href.indexOf('#') !== -1) {
//         let pagePath = href.split('#')[0];
//         let hash = '#' + href.split('#')[1];
        
//         // Only handle if it's the same page or empty path (same page)
//         if (pagePath === '' || pagePath === window.location.pathname) {
//           e.preventDefault();
//           scrollToTarget(hash);
          
//           // Update browser history without reload
//           history.pushState(null, null, hash);
//         }
//       }
//     });
//   }
  
//   // Execute on DOM ready
//   $(document).ready(function() {
//     // Set up click handlers
//     setupHashLinks();
    
//     // If there was a hash in the URL on page load, scroll to it
//     if (targetHash) {
//       // Delay to ensure page is fully rendered
//       setTimeout(function() {
//         scrollToTarget(targetHash);
//       }, 200);
//     }
//   });
  
//   // Also trigger on window load for maximum compatibility
//   $(window).on('load', function() {
//     if (targetHash) {
//       // Retry scrolling after everything is fully loaded
//       setTimeout(function() {
//         scrollToTarget(targetHash);
//       }, 200);
//     }
//   });
// })();
function setContentHeight() {
  if (window.innerWidth > window.innerHeight) {
    var headerHeight = document.getElementById('header').clientHeight;
    $("#menu-primary-menu .menu-item").on("click", function (e) {

      $(this).siblings().find('a').each(function () {
        let otherhref = $(this).attr('href');

        if (otherhref && otherhref.includes('#')) {
          let otherHash = otherhref.split('#')[1];
          if (otherHash) {
            $("#" + otherHash).css("padding-top", "0px");
          }
        }
      });

      let href = $(this).find('a').attr('href');

      if (href && href.includes('#')) {
        let hash = href.split('#')[1];

        if (hash) {
          let targetElement = $("#" + hash);

          if (targetElement.length) {
            targetElement.css("padding-top", headerHeight + 20 + "px");
          }
        }
      }
    });
  }
}

// Referrral form
jQuery(document).ready(function ($) {
  $('#formsubmit').on('click', function (e) {
    let specificRequestRadio = $('.wpcf7-list-item.last input[type="radio"]');

    if (specificRequestRadio.is(':checked')) {
      let val = $('#physician_message').val().trim();

      if (!val) {

        if ($('#physician_message').length) {
          let invalidText = '<span class="wpcf7-not-valid-tip" aria-hidden="true">Please fill out this field.</span>';
          $('#physician_message').parent().append(invalidText);
          e.preventDefault();
        }

      } else {
        $('#physician_message').next('.wpcf7-not-valid-tip').remove();
        $(this).closest('form').submit();
      }
    } else {
      $('#physician_message').next('.wpcf7-not-valid-tip').remove();

    }
  });
});
  $(document).ready(function () {
    var testimonialCarousel = $(".testimonial-section-carousel").owlCarousel({
      loop: true,
      margin: 30,
      dots: true,
      nav: false,
      autoplay: true,
      autoplayHoverPause: true,
      mouseDrag: true,
      touchDrag: true,
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
    });

    // Stop autoplay on user interaction

  });
