<?php get_header(); ?>

	<section class="slider">
		<div class="row">
			<div class="large-12 columns">
				<ul data-orbit data-options="bullets: false">	
					<?php 
						query_posts(array('post_type' => 'slider'));
						if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
						<li style="background: url(<?php the_field('background');?>) no-repeat center">
							<div class="row">
								<div class="small-12 columns">
									<?php the_content();?>
								</div>
							</div>
						</li>
					<?php 
						endwhile; endif;
						wp_reset_query();
					?>
				</ul>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="row content-filter">
			<div class="large-12 columns">
				<span>FILMS // </span>
				<form id="filter">
				
				<?php 
					$categories = get_categories();

					foreach ($categories as $category) {
						$html .= '<label for="category-'.$category->slug.'">'.$category->name.'</label><input type="checkbox" checked="checked" id="category-'.$category->slug.'" name="category-'.$category->slug.'" value=".category-'.$category->slug.'">';						
					}
					echo $html;
				?>
					<label for="category-live">Live</label><input type="checkbox" checked="checked" id="category-live" name="category-live" value=".category-live">
				</form>
			</div> <!-- eo columns -->
		</div> <!-- eo content-filter -->
		<?php
			$i = 0;
			query_posts(array('post_type' => 'projects', 'posts_per_page' => -1));
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php if ($i == 0) echo '<div class="row projects">'; ?>
				<article id="<?php the_ID();?>" <?php post_class('large-4 small-6 columns end');?>>
					<a href="<?php the_permalink();?>">
						<figure>
							<?php the_post_thumbnail('thumbnail'); ?>
						</figure>
						<h2><?php the_title(); ?></h2>
						<p class="description"><?php the_field('description'); ?></p>
					</a>
				</article>
				<?php
					if ($i == 2) {
						echo '</div>';
						$i = 0;
					} else {
						$i++;
					}
				?>
			
			<?php 
			endwhile; endif;
			if ($i < 2) echo '</div>';
			wp_reset_query();
		?>
	</section>

	<footer class="row">
		
		<div class="large-4 columns">
			<?php 
				query_posts('page_id=12');
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						the_title();
						the_content();
					endwhile; endif;
				wp_reset_query();
			?>
		</div>
		
		<div class="large-4 columns">
			<p>THIS JUST IN</p>
			<ul id="tweets"></ul>
		</div>
		
		<div class="large-4 columns">
			<?php 
				query_posts('page_id=16');
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						the_title();
						the_content();
					endwhile; endif;
				wp_reset_query();
			?>
		</div>
	
	</footer>
    
<?php get_footer(); ?>