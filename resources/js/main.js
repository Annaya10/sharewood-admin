$(document).ready(function() {
    
    /*========== Toggle ==========*/
    $(document).on('click', '.toggle', function() {
        $(".toggle").toggleClass("active");
		$("html").toggleClass("flow");
		$("[nav]").toggleClass("active");
    });
    if ($(window).width() <= 1024) {
        $(document).on('click', '.drop a', function(e) {
            e.stopPropagation();
            var $this = $(this).parents('.drop').children('.sub');
            $('.sub').not($this).removeClass('active');
            var $parent = $(this).parent('.drop');
            $parent.children('.sub').toggleClass('active');
        });
        $(document).on('click', '.sub', function(e) {
            e.stopPropagation();
        });
        $(document).on('click', function() {
            $('.sub').removeClass('active');
        });
    }
    
        var offSet = $('body').offset().top;
        var offSet = offSet + 50;
        $(window).scroll(function() {
            var scrollPos = $(window).scrollTop();
            if (scrollPos >= offSet) {
               $('header').addClass('fix'); 
            } else {
                $('header').removeClass('fix'); 
            }
        });

       
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };
    
        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];
    
            if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
            }
    
            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
    
            var that = this;
            var delta = 200 - Math.random() * 100;
    
            if (this.isDeleting) { delta /= 2; }
    
            if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
            }
    
            setTimeout(function() {
            that.tick();
            }, delta);
        };
    
        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                  new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
    
    
    Resources
    
        

});


$(document).ready(function () {
    $('.marker').hover(
        function () {
            // On mouseover
            const region = $(this).data('regin');
            $(`a[data-regin="${region}"]`).addClass('highlight');
        },
        function () {
            // On mouseout
            const region = $(this).data('regin');
            $(`a[data-regin="${region}"]`).removeClass('highlight');
        }
    );
});

$(document).ready(function () {
    $('.map_flex_dv .col .inner a').hover(
        function () {
            // On mouseover
            const region = $(this).data('regin');
            $(`.marker[data-regin="${region}"]`).addClass('active');
        },
        function () {
            // On mouseout
            const region = $(this).data('regin');
            $(`.marker[data-regin="${region}"]`).removeClass('active');
        }
    );
});

/*========== Popup ==========*/
$(document).on("click", ".pop_btn", function () {
    var popUp = $(this).data("popup");
    $("body").addClass("flow");
    $(".popup[data-popup= " + popUp + "]").fadeIn();
  });
  $(document).on("click", ".x_btn", function () {
    var popUp = $(this).parents(".popup").data("popup");
    $("body").removeClass("flow");

    $(".popup[data-popup= " + popUp + "]").fadeOut();
  });

function textAreaAdjust(o) {
    o.style.height = '1px';
    o.style.height = (25 + o.scrollHeight) + 'px';
}

// smooth scroling effect================
// $("html").easeScroll({
//     stepSize: 40,
//     arrowScroll: 40
// });

/*========== Page Loader ==========*/
$(window).on('load', function() {
    $('.loader').delay(700).fadeOut();
    $('#pageloader').delay(1200).fadeOut('slow');
});

