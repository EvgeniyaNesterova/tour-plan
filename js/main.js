var hotelSlider = new Swiper('.hotel-slider', {
  // Optional parameters
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.hotel-slider__button--next',
    prevEl: '.hotel-slider__button--prev',
  },
  
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
});
var reviewsSlider = new Swiper('.reviews-slider', {
  // Optional parameters
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.reviews-slider__button--next',
    prevEl: '.reviews-slider__button--prev',
  },
  
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
});
// $(window).scroll(function() {

//   var st = $(this).scrollTop();
//   console.log(st); 
// });

var menuButton = document.querySelector(".menu-button");
menuButton.addEventListener("click", function () {
  console.log('Клик по кнопке меню');
  document.querySelector(".navbar-menu").classList.toggle('navbar-menu--visible');
});
