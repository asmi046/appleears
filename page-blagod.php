<?php
/*
Template Name: Шаблон страницы благодарности
WP Post Template: Шаблон страницы благодарности
Template Post Type: page
*/
get_header(); ?>

<main id="primary" class="main"> 

	<section class="content"> 
		<div class="inner">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="header-window__inner">
					<h1><?php the_title();?></h1> 
					<a href="https://appleears.ru" class="header-window__link-back"></a>
				</div>
				<div class="red-line"></div>
				<?php the_content();?>

                

			<?php endwhile;?>
		<?php endif; ?> 

        <script>
				function showSuccessfulPurchase(order) {
                    window.location.href = "<?echo get_bloginfo("url"); ?>";
				}
				
				function showFailurefulPurchase(order) {
					
					console.log(order);
				}

                function payDo() {
                    ipayCheckout({
                        amount:'<?php echo $_REQUEST['price'];?>',
                        currency:'RUB',
                        order_number:'<?php echo $_REQUEST['zn']; ?>',
                        description: 'Оплата заказа: <?php echo $_REQUEST['zn']; ?>, плательщик: <?php echo $_REQUEST['n']; ?> телефон: <?php echo $_REQUEST['phone']; ?> адрес: <?php echo $_REQUEST['adres']; ?>'},
                        function(order) { showSuccessfulPurchase(order) },
                        function(order) { showFailurefulPurchase(order) });
                }
			</script>

                <div class = "sb_pay_btn" onclick="payDo()">
                    <div class ="sb_icon"></div>
                    <div class ="sb_text">Оплатить заказ</div>
                </div>

	</div>
</section>

</main>

		<div class="inner">
			<a href="https://appleears.ru" class="content-back__btn btn">На главную</a>
		</div>

<?php get_footer();  