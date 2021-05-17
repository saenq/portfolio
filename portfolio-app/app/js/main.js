$(function () {

  ///////////////scroll image///////////////

  // let cardImage = $(".card__image");

  // cardImage.on("mousemove", imageScroll);
  // cardImage.on("mouseenter", imageEnter);
  // cardImage.on("mouseleave", imageLeave);

  // function imageScroll(event) {
  //   let image = $(event.currentTarget).find(".card__img");
  //       imageHeight = $(event.currentTarget).height(),
  //       currentHeight = event.offsetY,
  //       pctHeight = Math.round(currentHeight / imageHeight * 100);
  //   image.css({ "object-position": `0 ${pctHeight}%` });
  // }

  // function imageEnter(event) {
  //   let image = $(event.currentTarget).find(".card__img");

  //   setTimeout(() => {
  //     image.css({ "transition" : "object-position 0s" });
  //     console.log("done");
  //   }, 300)
  // }

  // function imageLeave(event) {
  //   let image = $(event.currentTarget).find(".card__img");

  //   image.css({ "object-position": "0 0%", "transition" : "object-position .3s" });
  // }

  ///////////////end scroll image///////////////

  ///////////////anim image///////////////

  let animInterval = null;
  $(".card").on({
    mouseenter: function (event) {
      let img = $(event.currentTarget).find(".card__img");
      img.addClass('card__img--anim');
      animInterval = setInterval(() => {
        img.toggleClass("card__img--anim");
      }, 6000);
    },
    mouseleave: function (event) {
      let img = $(event.currentTarget).find(".card__img");
      img.removeClass('card__img--anim');
      clearInterval(animInterval);
    }
  });

  $(".project__img").on({
    mouseenter: function (event) {
      let img = $(event.currentTarget);
      img.addClass('project__img--anim');
      animInterval = setInterval(() => {
        img.toggleClass("project__img--anim");
      }, 6000);
    },
    mouseleave: function (event) {
      let img = $(event.currentTarget);
      img.removeClass('project__img--anim');
      clearInterval(animInterval);
    }
  });

  ///////////////end anim image///////////////

  ///////////////odometer///////////////

  if ($(".numbers__items").length) {
    function startOdometer(entries) {
      if (entries[0].isIntersecting) {
        let odometer = $(".odometer");
        odometer.each(function () {
          $(this).html($(this).data("odometer"));
        });
        observer.unobserve(numbers);
      }
    }

    var options = {
      threshold: 0.5
    }

    var observer = new IntersectionObserver(startOdometer, options);

    var numbers = document.querySelector('.numbers__items');
    observer.observe(numbers);
  }
  ///////////////end odometer///////////////
});




wow = new WOW(
  {
    mobile: false,
  }
)
wow.init();

if ($("#first-screen__img").length) {
  new Vivus(
    'first-screen__img',
    {
      type: 'oneByOne',
      duration: 400,
    }
  );
}

///////////////slick slider///////////////
function slickify(slider) {
  console.log('slickify');
  slider.slick({
    arrows: false,
    variableWidth: true,
    autoplay: true,
    swipeToSlide: true,
  });
}

if ($(".stack__items").length) {
  let slider = $(".stack__items"),
    sliderHtml = slider.html(),
    maxWidth = "(max-width: 1024px)";

  if (window.matchMedia(maxWidth).matches) {
    slickify(slider);
  }

  $(window).on("resize", function () {
    let windowMatchMedia = window.matchMedia(maxWidth).matches;
    if (windowMatchMedia && !slider.hasClass("slick-initialized")) {
      slickify(slider);
    } else if (!windowMatchMedia && slider.hasClass("slick-initialized")) {
      slider
        .slick('unslick')
        .html(sliderHtml);
    }
  });
}
///////////////end slick slider///////////////

///////////////project slick slider///////////////
console.log($('.project__slider-for-item').length );
if ($('.project__slider-for').length) {
  if($('.project__slider-for-item').length > 3){
    $('.project__slider-for').slick({
      fade: true,
      swipe: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.project__slider-nav',
    });
  
    $('.project__slider-nav').slick({
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.project__slider-for',
      focusOnSelect: true,
      centerMode: true,
      centerPadding: '40px',
    });
  } else {
    $('.project__slider-for').slick({
      fade: true,
      swipe: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.project__slider-nav',
    });
  
    $('.project__slider-nav').slick({
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.project__slider-for',
      focusOnSelect: true,
    });
  }


  // image-zoom
  $(".project__slider-for-item").zoom({
    magnify: 0.6,
  });
}
///////////////end project slick slider///////////////


///////////////feedback popup///////////////

if ($("#feedback-popup").length){
  $(".feedback-popup__btn").magnificPopup({
    type: 'inline',
		preloader: false,
  });
}

///////////////end feedback popup///////////////