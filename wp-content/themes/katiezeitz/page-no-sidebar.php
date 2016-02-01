<?php
/*
 * Template Name: No Sidebar
 * Description: Full Width Page w/o a sidebar
 */
 ?>

<?php get_header();?>


	<div id="page-container" class="clearfix">
		<div class="main-content full-width">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<h1 class="page-title"><?php the_title();?></h1>
				<?php the_content();?>
							
			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
	</div>


<?php get_footer();?>