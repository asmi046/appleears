<?php

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


	</div>
</section>

</main>

		<div class="inner">
			<a href="https://appleears.ru" class="content-back__btn btn">На главную</a>
		</div>

<?php get_footer();  