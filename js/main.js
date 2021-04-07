$ = jQuery;

$(document).ready(function() {



// Слайдер
$('.slider').slick({
	arrows: false,
	dots: true,
	infinite: true,
	speed: 1000,
	slidesToShow: 1,
	autoplay: true,
	autoplaySpeed: 1800,
	adaptiveHeight: true
});


// Открытие секции Оформить заказ
let buynow = document.querySelector(".specific__buy-now");
let checkout = document.querySelector(".checkout");
if (buynow) {
	buynow.addEventListener("click", function (e) {
		e.preventDefault();
		checkout.classList.toggle("active");
		buynow.classList.toggle("active");
	});
}

 


});