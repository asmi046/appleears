<?php get_header();

/*
Template Name: Шаблон страницы корзина
WP Post Template: Шаблон окно покупки
Template Post Type: page
*/

?>

<main class="main main-basket">

	<section class="basket-section">
		<div class="inner">
			<h1><?php the_title();?></h1>
			<div class="red-line"></div>

			<div class="basket-section__col d-flex">
				
				<div class="product__block d-flex">
					<div class="product__img">
						<img src="<?php echo get_template_directory_uri();?>/img/product-01.jpg" alt="">
					</div>
					<div class="product__choice d-flex">
						<h3>Air Pods 2 (Реплика)</h3>
						<a href="#" class="product__close"></a>
						<div class="number d-flex">
							<span class="minus">-</span>
							<input id="pageNumeric" type="text" value="1" size="5">
							<span class="plus">+</span>
						</div>
						<div class="product__price-block d-flex">
							<div class="product__price-new">2600 Р</div>
							<div class="product__price-old">4500 Р</div>
						</div>
					</div>
				</div>

				<div class="product__block d-flex">
					<div class="product__img">
						<img src="<?php echo get_template_directory_uri();?>/img/product-02.jpg" alt="">
					</div>
					<div class="product__choice d-flex">
						<h3>Гидрогелевая пленка</h3>
						<a href="#" class="product__close"></a>
						<div class="number d-flex">
							<span class="minus">-</span>
							<input id="pageNumeric" type="text" value="1" size="5">
							<span class="plus">+</span>
						</div>
						<div class="product__price-block d-flex">
							<div class="product__price-new">700 Р</div>
							<div class="product__price-old">1500 Р</div>
						</div>
					</div>
				</div>

				<div class="basket-section__total">Итого: <span>3300</span> Р</div>

			</div>

		</div>
	</section>

	<section class="basket-form">
		<div class="inner">
			<h2>Оформить заказ</h2>
			<div class="red-line"></div>
			<form class="checkout__form" action="#">
				<input type="text" name="name" placeholder="ФИО" class="checkout__form-input input">
				<input type="tel" name="tel" placeholder="Телефон" class="checkout__form-input input">
				<input type="text" name="adress" placeholder="Адрес доставки" class="checkout__form-input input">
				<input type="text" name="text" placeholder="Модель устройства" class="checkout__form-input input">
				<input type="text" name="text" placeholder="Сторона" class="checkout__form-input input">
				<input type="text" name="text" placeholder="Фото дизайна чехла" class="checkout__form-input input">
				<button class="checkout__form-btn">Оформить заказ</button>
			</form>
		</div>
	</section>

</main>
<?php get_footer(); ?> 