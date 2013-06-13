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