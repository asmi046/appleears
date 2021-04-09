$ = jQuery;

$(document).ready(function() {



// Слайдер
$('.slider-pay').slick({ 
	arrows: false,
	dots: true,
	infinite: true,
	speed: 1000,
	slidesToShow: 1,
	autoplay: true,
	autoplaySpeed: 1800,
	adaptiveHeight: true 
});


// Слайдер с отзывами
    $('.reviews__sl').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
				adaptiveHeight: true,
        responsive: [
            {
                
                breakpoint: 750,
                settings: {  
                     slidesToShow: 1,
                    arrows: true,
                }
            },
            {
                breakpoint: 380,
                settings: { 
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
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

// Выбо колличества
$('.minus').click(function () {
	var $input = $(this).parent().find('input');
	var count = parseInt($input.val()) - 1;
	count = count < 1 ? 1 : count;
	$input.val(count);
	$input.change();
	return false;
});
$('.plus').click(function () {
	var $input = $(this).parent().find('input');
	$input.val(parseInt($input.val()) + 1);
	$input.change();
	return false;
});


});