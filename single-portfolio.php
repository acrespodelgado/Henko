<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single portfolio-single page-wrapper">
	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','portfolio') ); ?>
</div>

<?php get_footer();
