<?php

get_header(); ?>

<main id="primary" class="main"> 

	<section class="content"> 
		<div class="inner">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<div class="red-line"></div>
				<?php the_content();?>
			<?php endwhile;?>
		<?php endif; ?> 

	</div>
</section>

</main>

<?php get_footer(); 