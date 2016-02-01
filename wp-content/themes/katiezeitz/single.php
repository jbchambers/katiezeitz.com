<?php get_header();?>


	<div id="page-container" class="clearfix">
		<div class="sidebar">
			<?php dynamic_sidebar( 'blog_sidebar' ); ?>
		</div>
		<div class="main-content">
			
			<h1 class="page-title"><?php the_title();?></h1>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<a class="post-title" href="<?php the_permalink();?>"><?php the_title();?></a>
				<p class="post-info">Posted in <?php the_category(',');?> on <?php the_time('F j, Y'); ?></p>
				<?php the_content();?>
							
			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			
		</div>
	</div>


<?php get_footer();?>