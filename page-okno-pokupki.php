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
			<?
			$pict = carbon_get_the_post_meta('offer_picture');
			if($pict) {
				$pictIndex = 0;
				foreach($pict as $item) {
					?>
					<div class="slider__item filter">
						<img src="<?php echo wp_get_attachment_image_src($item['gal_img'], 'full')[0];?>" id = "pict-<? echo empty($item['gal_img_sku'])?$pictIndex:$item['gal_img_sku']; ?>" title = "<? echo $item['gal_img_alt']; ?>" alt="<? echo $item['gal_img_alt']; ?>">
					</div> 
					<?
					if ( $imgTm == 0) 
						$imgTm = wp_get_attachment_image_src($item['gal_img'], 'full')[0];
					$pictIndex++;
				}
			}
			?>
		</div>
	</section>


	<section class="pay-section">
		<div class="inner">
			<div class="specific__price d-flex">
				<div class="specific__new-price"><span><?echo $mprice = carbon_get_post_meta(get_the_ID(),"offer_price"); ?></span> ₽</div>
				<div class="specific__old-price"><span><?echo $mpriceold = carbon_get_post_meta(get_the_ID(),"offer_old_price"); ?></span> ₽</div>
			</div>

			<div class="specific__act d-flex">
				<button class="specific__basket okno-btn" onclick = "add_tocart(this, 0); return false;"
				data-price = "<? echo $mprice?>"
                data-sku = "<? echo carbon_get_post_meta(get_the_ID(),"offer_sku")?>"
                data-oldprice = "<? echo $mpriceold; ?>"
                data-lnk = "<? echo  get_the_permalink(get_the_ID());?>"
                data-name = "<? echo  get_the_title();?>"
                data-count = "1"
                data-picture = "<?echo $imgTm;?>"

				>В корзину</button>
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
				<?echo carbon_get_post_meta(get_the_ID(),"specifications"); ?>
			</div>
		</div>
	</section>

	<section class="equipment">
		<div class="inner">
			<h2>Комплектация</h2>
			<div class="red-line"></div>
			<?echo carbon_get_post_meta(get_the_ID(),"equipment"); ?>
		</div>
	</section>


</main>

<?php get_footer(); ?> 