function fileloadname(event){
	document.getElementById("file-path-name").innerHTML = event.target.files[0].name; 
	console.log(event.target.files[0])
}

function number_format () {
	let elements = document.querySelectorAll('.price_formator');
	for (let elem of elements) {
	  elem.dataset.realPrice = elem.innerHTML; 
	  elem.innerHTML = Number(elem.innerHTML).toLocaleString('ru-RU');
	}
  }

//Маска для телефона
  let mascedPhoneElem = document.querySelectorAll('input[type=tel]');
 console.log(mascedPhoneElem); 
  if (mascedPhoneElem != undefined) 
  for (let elem of mascedPhoneElem) { 
	IMask(elem, {
		mask: '+{7}(000)000-00-00',
		lazy: true,  // make placeholder always visible
		placeholderChar: '_'     // defaults to '_'
	});
  }



//-------------------------------------Корзина

let cart = [];
let cartCount = 0;

function cart_recalc () {
	cart = JSON.parse(localStorage.getItem("cart"));
	if (cart == null) cart = [];
	cartCount = 0;
	cartSumm = 0;
	for (let i = 0; i<cart.length; i++){
	  cartCount += Number(cart[i].count);
  
	  cartSumm += Number(cart[i].count) * parseFloat(cart[i].price);
	}
  
	localStorage.setItem("cartcount", cartCount);
	localStorage.setItem("cartsumm", cartSumm);
  
	let elements = document.querySelectorAll('.bascet_counter');
	for (let elem of elements) {
	  elem.innerHTML = cartCount;
	}
  
  }
  
  function add_tocart(elem, countElem) {
	
	  
	  let cartElem = {
		sku: elem.dataset.sku,
		lnk:elem.dataset.lnk,
		price: elem.dataset.price,
		priceold: elem.dataset.oldprice,
		subtotal:elem.dataset.price,
		name: elem.dataset.name,
		count: (countElem == 0)?elem.dataset.count:countElem,
		picture: elem.dataset.picture 
	  };
  
	  if (cart.length == 0)
	  {
		cart.push(cartElem);
	  } else {
		let addet = true;
		for (let i = 0; i<cart.length; i++){
		  if (cart[i].sku == cartElem.sku) {
			cart[i].count++;
			cart[i].subtotal = Number(cart[i].count) * parseFloat(cart[i].price);
			addet = false;
			break;
		  }
		}
  
		if (addet)
		  cart.push(cartElem);
	  }
	  
	  localStorage.setItem("cart", JSON.stringify (cart) );
	  cart_recalc ();
  
	  console.log(cartElem);
  }


  document.addEventListener("DOMContentLoaded", ()=>{ 
	number_format ();
	cart_recalc ();
  });

//-------------------------------------

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
// $('.minus').click(function () {
// 	var $input = $(this).parent().find('input');
// 	var count = parseInt($input.val()) - 1;
// 	count = count < 1 ? 1 : count;
// 	$input.val(count);
// 	$input.change();
// 	return false;
// });
// $('.plus').click(function () {
// 	var $input = $(this).parent().find('input');
// 	$input.val(parseInt($input.val()) + 1);
// 	$input.change();
// 	return false;
// });

$('.checkout__form-btn').click(function(e){  

	e.preventDefault();
	var titleM = $("#checkout-title").html();
	var nameM = $("#form-nameM").val(); 
	var telM = $("#form-telM").val(); 
	var adrrM = $("#form-adrrM").val(); 
	var modelM = $("#form-modelM").val(); 
	var priceM = $(".specific__new-price span").html(); 
	var sideM = jQuery('#form-sideM option:selected').text();
	let prfile = jQuery('#input__file').prop('files');
	var designFile = (prfile != undefined)?prfile[0]:"";

	if (jQuery("#form-nameM").val() == "") {
		jQuery("#form-nameM").css("border","1px solid red");
		return;
	}

	if (jQuery("#form-telM").val() == ""){
		jQuery("#form-telM").css("border","1px solid red");
		return;
	}

	if (jQuery("#form-adrrM").val() == ""){
		jQuery("#form-adrrM").css("border","1px solid red");
		return;
	}

	if (jQuery("#form-modelM").val() == ""){
		jQuery("#form-modelM").css("border","1px solid red");
		return;
	}

	else {
		var params = new FormData();
            params.append('action', 'sendpay');
            params.append('nonce', allAjax.nonce);
			params.append('nameM', nameM);
			params.append('telM', telM);
			params.append('titleM', titleM);
			params.append('adrrM', adrrM);
			params.append('modelM', modelM);
			params.append('sideM', sideM);
			params.append('price', priceM);
			params.append('design', designFile);

			var  jqXHR = jQuery.ajax({      
				url: allAjax.ajaxurl,
				dataType: 'text',
				cache: false,
				contentType: false,
				processData: false,
				data: params, 
				type: 'post'    
			});

		// var  jqXHR = jQuery.post(
		// 	allAjax.ajaxurl,
		// 	params   
		// 	);

				jqXHR.done(function (response) {
					let r = JSON.parse(response);
					console.log(response);
					window.location.href = thencs_page+"?n="+r.n+"&phone="+r.phone+"&adres="+r.adres+"&zn="+r.zn+"&price="+r.price;
				});

            jqXHR.fail(function (response) {
            	alert("Произошла ошибка. Попробуйте позднее."); 
        }); 

     }
});




});