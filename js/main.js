$(document).ready(function () {
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

var menuButton = $(".menu-button");
menuButton.on("click", function () {
  $(".navbar-menu").toggleClass("navbar-menu--visible");
});

var modalButton = $("[data-toggle=modal]");
var closeModalButton = $(".modal__close");
modalButton.on('click', openModal);
closeModalButton.on('click', closeModal);
  
function openModal() {
  var modalOverlay = $('.modal__overlay');
  var modalDialog = $('.modal__dialog');
  modalOverlay.addClass('modal__overlay--visible');
  modalDialog.addClass('modal__dialog--visible');
}
function closeModal(event) {
  event.preventDefault();
  var modalOverlay = $('.modal__overlay');
  var modalDialog = $('.modal__dialog');
  modalOverlay.removeClass('modal__overlay--visible');
  modalDialog.removeClass('modal__dialog--visible');
}
var modalOverlay = $('.modal__overlay');
var modalDialog = $('.modal__dialog');
$(document).keydown(function(e) {
    // ESCAPE key pressed
    if (e.keyCode == 27) {
        modalOverlay.removeClass('modal__overlay--visible');
        modalDialog.removeClass('modal__dialog--visible');
    }
});
});
