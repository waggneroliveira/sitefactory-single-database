// Preloader JS

function preloader_fade() {
  $("#preloader").fadeOut('slow');
}

$(document).ready(function () {
  window.setTimeout("preloader_fade();", 500); //call fade in .5 seconds
}
)

// Number Count
let counter_find = document.querySelector('#counter');
if (typeof (counter_find) != 'undefined' && counter_find != null) {
  window.addEventListener('scroll', function () {
    var element = document.querySelector('#counter');
    var position = element.getBoundingClientRect();

    // checking whether fully visible
    if (position.top >= 0 && position.bottom <= window.innerHeight) {
      $('.counter-value').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        },

          {

            duration: 2000,
            easing: 'swing',
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
              //alert('finished');
            }

          });
      });
    }

    if (position.top < window.innerHeight && position.bottom >= 0) {
      //console.log('Element is partially visible in screen');
    } else {
      //console.log('Element is not visible');
      $('.counter-value').each(function () {
        var $this = $(this),
          countTo = 0;
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        },

          {

            duration: 100,
            easing: 'swing',
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
              //alert('finished');
            }

          });
      });
    }
  });
}
