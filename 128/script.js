$(document).ready(function(){       // ensures that by the time the script inside is executed, the browser DOM is fully loaded

    $(window).scroll(function(){                // scroll event
        // sticky navbar on scroll script
        if(this.scrollY > 20){                  // when the user scrolled more than 20px downward
            $('.navbar').addClass("sticky");    // sticky class will be added to navbar; this allows the navbar's style to change (stick to its original position)
        }else{                                  // else
            $('.navbar').removeClass("sticky"); // sticky class will not be added / removed from navbar; this allows the navbar to be at its default style
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){                     // when the user scrolled more than 500px downward
            $('.scroll-up-btn').addClass("show");   // show class will be added to scroll-up-button; this allows the scroll up button to appear
        }else{                                      // else
            $('.scroll-up-btn').removeClass("show");// show class will not be added / removed from navbar; this hides the scroll up button
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){        // when the scroll up button is clicked
        $('html').animate({scrollTop: 0});       // scrolls upward continuously to the top (on its own)
        $('html').css("scrollBehavior", "auto"); // removes the smooth scroll on slide-up button click to make scrolling faster
    });

    // applying again smooth scroll on menu items click
    // without this, when clicking on a section in the navigation bar, after using the scroll up button, the transition won't be smooth
    $('.navbar .menu li a').click(function(){
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){                // when the hamburger menu button is clicked
        $('.navbar .menu').toggleClass("active");   // shows the navigation bar menu
        $('.menu-btn i').toggleClass("active");     // hides the hamburger menu button

    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Travels", "Lifestyle", "Skills", "Foodies", "Pop Culture"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    // owl carousel script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,				// lets the carousel to slide on its own
        autoplayTimeOut: 2000,		// the duration of each slide
        autoplayHoverPause: true,	// pause the carousel when a card is hovered over
        responsive: {				// the number of cards shown given a certain window size
            0:{						// when width is 0 to 599
                items: 1,
                nav: false
            },
            600:{					// when width is 600 to 999
                items: 2,
                nav: false
            },
            1000:{					// when width is 1000+
                items: 3,
                nav: false
            }
        }
    });

    // function validateForm() {
    //     var x = document.forms["web-form"]["fullname"].value;
    //     if (x == "" || x == null){
    //         alert("Uh-oh! Name must be filled out.");
    //         return false;
    //     }
    // }
});