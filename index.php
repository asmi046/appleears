<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="main">
	<section class="about-section">
		<div class="inner">
			<h2 class="section-title"><? echo carbon_get_theme_option("index_title"); ?></h2> 
			<div class="decor-line"></div>
			<div><? echo carbon_get_theme_option("index_subtitle"); ?></div>
		</div>
	</section>
	<section class="accessories-section">  
		<div class="inner">
			<h2 class="section-title">
				Дополнительные аксесуары 
			</h2>
			<div class="decor-line"></div>
			<div class="accs-box">
				<div class="row">
					<div class="accs__wr">
						<div class="accs">
							<div class="accs__viz">
								<div class="accs__viz__sale">Sale</div>
								<img src="<?php echo get_template_directory_uri();?>/img/accs-img-1.jpg" alt="Чехол для AirPods cиликоновый" class="spacer db accs__viz__img">
								<h3 class="accs__viz__caption">Чехол для AirPods cиликоновый</h3>
								<div class="decor-line"></div>
								<p>
									Защитят ваши наушники от царапин и повреждений, добавят индивидуальности.
								</p>
								<a href="<?php echo get_permalink(29);?>" class="btn">Купить</a>
							</div>
						</div>
					</div>
					<div class="accs__wr">
						<div class="accs">
							<div class="accs__viz"> 
								<img src="<?php echo get_template_directory_uri();?>/img/accs-img-2.jpg" alt="Гидрогелиевая пленка" class="spacer db accs__viz__img">
								<h3 class="accs__viz__caption">Гидрогелиевая пленка</h3>
								<div class="decor-line"></div>
								<p>
									Защитят ваши наушники от царапин и повреждений, добавят индивидуальности.
								</p>
								<a href="<?php echo get_permalink(33);?>" class="btn">Купить</a>
							</div>
						</div>
					</div>
					<div class="accs__wr">
						<div class="accs">
							<div class="accs__viz"> 
								<img src="<?php echo get_template_directory_uri();?>/img/accs-img-3.png" alt="Чехлы с индивидуальным дизайном" class="spacer db accs__viz__img">
								<h3 class="accs__viz__caption">Чехлы с индивидуальным дизайном</h3>
								<div class="decor-line"></div>
								<p>
									Изготавливается на прозрачном или черном чехле на любую модель смартфона.
								</p>
								<a href="<?php echo get_permalink(37);?>" class="btn">Купить</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="reviews-section">
		<div class="inner">
			<h2 class="section-title">Отзывы</h2>
			<div class="decor-line"></div>
			<div class="reviews__sl">
				<?	$revsl = carbon_get_theme_option('reviews_complex');
				if($revsl) {
					$revslIndex = 0;
					foreach($revsl as $itemsSl) {   
						?>
						<div class="reviews__sl__wr">
							<div class="review">
								<div class="review__viz">
									<div class="review__viz__avatar cover" style="background-image: url(<?php echo wp_get_attachment_image_src($itemsSl['reviews_img'], 'full')[0];?>);"></div>
									<div class="review__viz__author">
										<span class="review__viz__author__name"><? echo $itemsSl['reviews_title']; ?></span>    
										<a href="<? echo $itemsSl['reviews_link']; ?>" class="db">ссылка на отзыв</a>
									</div>
									<div class="review__viz__q">
										<p><? echo $itemsSl['reviews_text']; ?></p>
									</div> 
								</div>
							</div>
						</div>
						<?
						$revslIndex++;  
					}
				}
				?>
			</div>
		</div>
	</section>
	<section class="instraction-section">
		<div class="inner">
			<h2 class="section-title">
				Оплата и доставка
			</h2>
			<div class="decor-line"></div>
			<div class="instraction__block">
				<p>
					Все товары представленные на нашем сайте мы доставляем  в любую точку Российской федерации по средствам Почты России. 
				</p>
				<a href="<?php echo get_permalink(17);?>" class="btn">Подробнее</a>
			</div>    
			<div class="instraction__block">
				<p>
					Оплатить наши товары можно онлайн при помощи любой пластиковой карты стандарта Visa MasterCard, Мир
				</p>
				<a href="<?php echo get_permalink(20);?>" class="btn">Подробнее</a>
			</div> 
		</div>
	</section>
</main>

<?php get_footer(); ?> 