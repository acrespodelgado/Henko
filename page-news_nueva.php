<?php
/*
Template name: Page - News
*/

get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div id="content-actualidad" role="main" class="content-area">

	<?php include "news.php"; ?>
		
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
