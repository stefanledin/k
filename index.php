<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />

	<script src="<?php bloginfo('template_directory');?>/javascripts/vendor/custom.modernizr.js"></script>

	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>

	<header class="row">
		<div class="large-12 columns">
			<div class="logo">
				<a href="<?php bloginfo('url');?>">
					<img src="<?php bloginfo('template_directory');?>/images/logo.png" alt="K is for Kristoffer Berglund" title="K is for Kristoffer Berglund">
				</a>
			</div>
		</div>
	</header>

	<section class="slider">
		<div class="row">
			<div class="large-6 large-offset-3 columns">
				<ul data-orbit>
					<li>
						<img src="http://lorempixum.com/470/300" />
						<div class="orbit-caption">...</div>
					</li>
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
			query_posts(array('post_type' => 'projects'));
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php if ($i == 0) echo '<div class="row">'; ?>
				<article id="<?php the_ID();?>" <?php post_class('large-4 columns');?>>
					<figure>
						<?php the_post_thumbnail('thumbnail'); ?>
					</figure>
					<h2><?php the_title(); ?></h2>
					<?php wpautop(the_field('description')); ?>
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
		<div class="row">
			<article id="6" class="post-6 projects type-projects status-publish hentry category-commercials large-4 columns">
				<figure>
					<img src="http://localhost:8888/k/wp-content/uploads/2013/03/closer-297x165.jpg" class="attachment-thumbnail wp-post-image" alt="Closer">					</figure>
				<h2>Closer</h2>
				A TVC for Rally Sweden 2013
			</article>
			<article id="6" class="post-6 projects type-projects status-publish hentry category-live large-4 columns">
				<figure>
					<img src="http://localhost:8888/k/wp-content/uploads/2013/03/closer-297x165.jpg" class="attachment-thumbnail wp-post-image" alt="Closer">					</figure>
				<h2>Closer</h2>
				A TVC for Rally Sweden 2013
			</article>
			<article id="6" class="post-6 projects type-projects status-publish hentry category-commercials large-4 columns">
				<figure>
					<img src="http://localhost:8888/k/wp-content/uploads/2013/03/closer-297x165.jpg" class="attachment-thumbnail wp-post-image" alt="Closer">					</figure>
				<h2>Closer</h2>
				A TVC for Rally Sweden 2013
			</article>
		</div>
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
			<p>Tweets</p>
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
    
	<?php wp_footer(); ?>
</body>
</html>
