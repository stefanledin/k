<?php get_header(); ?>
	
	<div class="row">
	
		<div class="large-12 columns">
			<?php if ( have_posts() )  : while(have_posts()) : the_post(); ?>
			
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

				<dl>
					
					<dt>K: </dt>
					<dd><?php the_field('k');?></dd>

					<dt>Agency: </dt>
					<dd><?php the_field('agency'); ?></dd>

					<dt>Production: </dt>
					<dd><?php the_field('production'); ?></dd>

				</dl>
				
				<a href="<?php bloginfo('url');?>">«Head back to the movies</a>

			<?php endwhile; endif; ?>
		</div>

	</div>

<?php get_footer(); ?>