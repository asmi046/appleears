
<?php

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

	<main id="primary" class="main page site-main"> 

		<section class="content"> 
			<div class="container">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
					<?php the_content();?>
					<?php endwhile;?>
				<?php endif; ?> 

			</div>
		</section>
	</main>

<?php get_footer();