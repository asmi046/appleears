<?php get_header();

/*
Template Name: Шаблон окно покупки
WP Post Template: Шаблон окно покупки
Template Post Type: page
*/

?>

<?php get_template_part('template-parts/header-okno-pokupki');?>

<main class="main">

	<section class="slider-section"> 
		<div class="slider">
			<div class="slider__item filter">
				<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
			</div> 

			<div class="slider__item">
				<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
			</div>

			<div class="slider__item"> 
				<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
			</div>
		</div>
	</section>


	<section class="pay-section">
		<div class="inner">
			<div class="specific__price d-flex">
				<div class="specific__new-price">2600 Р</div>
				<div class="specific__old-price"> 4500 Р</div>
			</div>

			<div class="specific__act d-flex">
				<button class="specific__basket okno-btn">В корзину</button>
				<button class="specific__buy-now okno-btn">Купить сейчас</button>
			</div>
		</div>
	</section>

	<section class="checkout">
		<div class="inner">
			<form class="checkout__form" action="#">
				<input type="text" name="name" placeholder="ФИО" class="checkout__form-input input">
				<input type="tel" name="tel" placeholder="Телефон" class="checkout__form-input input">
				<input type="text" name="adress" placeholder="Адрес доставки" class="checkout__form-input input">
				<button class="checkout__form-btn">Оформить заказ</button>
			</form>
		</div>
	</section>

	<section class="specific">
		<div class="inner">
			<div class="specific__technic-block">
				<h2>Технические характеристики</h2>
				<div class="red-line"></div>
				<ul>
					<li>Автоматическое включение и подключение к устройству</li>
					<li>Простая настройка для работы с любыми устройствами Apple6</li>
					<li>Быстрый доступ к Siri: достаточно сказать «Привет, Siri» или настроить доступ двойным касанием</li>
					<li>Двойное касание для начала воспроизведения или переключения	на следующий трек</li>
					<li>Быстрая подзарядка в футляре</li>
					<li>Футляр можно заряжать с помощью устройств для беспроводной зарядки или через разъём Lightning</li>
					<li>Высокое качество звучания музыки и голоса</li>
					<li>Моментальное переключение с одного устройства на другое</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="equipment">
		<div class="inner">
			<h2>Комплектация</h2>
			<div class="red-line"></div>
			<ul>
				<li>AirPods</li>
				<li>Беспроводной зарядный футляр</li>
				<li>Кабель Lightning/USB‑A</li>
				<li>Документация</li>
			</ul>
		</div>
	</section>


</main>

<?php get_footer(); ?> 