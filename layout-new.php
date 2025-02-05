<?php
	do_action('flatsome_before_blog');
?>

<?php if(get_field('imagen-interior')) : ?>
	<div class="background-img" style="background:url('<?php the_field('imagen-interior'); ?>')"></div>
<?php endif; ?>

<div class="row align-center mt-4">
	<div class="large-12 col">
		<?php if(get_field('fecha')) : ?>
			<h2><?php the_field('fecha'); ?></h2>
		<?php endif; ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if(get_field('subtitulo')) : ?>
			<ul><li><h3><?php the_field( 'subtitulo' ); ?></h3></li></ul>
		<?php endif; ?>
		<?php echo the_content(); ?>
		<br>
		<?php if(get_field( 'nota_de_prensa' )) : ?>
			<a href="<?php the_field( 'nota_de_prensa' ); ?>" class="green" target="_blank" download>See press notes</a>
		<?php endif; ?>
		<?php /*
		<?php if(get_field( 'enlace_noticia' )) : ?>
			<h3 class="mt-4 bold">Press coverage</h3>
			<?php 
			$text_area = get_field( 'enlace_noticia' );
			$text_area_arr = explode("\n", $text_area);
			$text_area_arr = array_map('trim', $text_area_arr);
			foreach ($text_area_arr as $new) { 
				$new_exploded = explode("|", $new); 
			?>
				<a href="<?php echo $new_exploded[0]; ?>" class="green" target="_blank"><?php echo $new_exploded[1]; ?></a>
				<br>
			<?php
			}
			?>
		<?php endif; ?>
		*/ ?>

		<?php $es = "/es/"; ?>
		<?php $en = "/en/"; ?>
		<?php $url = $_SERVER['REQUEST_URI']; ?>

		<?php if(get_field( 'enlace_noticia_ingles' ) && strpos($url,$es) === false) : ?>
			<h3 class="mt-4 bold">Press coverage</h3>
			<?php 
			$text_area = get_field( 'enlace_noticia_ingles' );
			$text_area_arr = explode("\n", $text_area);
			$text_area_arr = array_map('trim', $text_area_arr);
			foreach ($text_area_arr as $new) :
				$new_exploded = explode("|", $new); 
			?>
				<a href="<?php echo $new_exploded[0]; ?>" class="green" target="_blank"><?php echo $new_exploded[1]; ?></a>
				<br>
			<?php
			endforeach;
		?>
		<?php else : ?>
			<h3 class="mt-4 bold">Press coverage</h3>
			<?php 
			$text_area = get_field( 'enlace_noticia' );
			$text_area_arr = explode("\n", $text_area);
			$text_area_arr = array_map('trim', $text_area_arr);
			foreach ($text_area_arr as $new) :
				$new_exploded = explode("|", $new); 
			?>
				<a href="<?php echo $new_exploded[0]; ?>" class="green" target="_blank"><?php echo $new_exploded[1]; ?></a>
				<br>
			<?php
			endforeach;
		
		endif; ?>
	</div>

	<?php wp_reset_postdata(); ?>
	
	<div class="is-divider"></div>

	<?php if ( get_theme_mod( 'blog_share', 1 ) ) {
		echo '<div class="blog-share">';
		echo '<h4>Share: </h4>';
		echo do_shortcode( '[share]' );
		echo '</div>';
	} ?>

	<div class="navigation">
		<?php /*if ( get_theme_mod( 'blog_single_next_prev_nav', 1 ) ) :
			flatsome_content_nav( 'nav-below' );
		endif; */ ?>
		<?php //the_post_navigation(); ?>
		<div class="col small-4 left">
			<?php next_post_link('%link', '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i><span class="green">Previous</span>'); ?>
		</div>
		<div class="col small-4 center">
			<a href="<?php echo get_site_url();?>/news/" title='Atrás' class="back"><img src="<?php echo get_site_url();?>/img/atras.png" alt="Atrás"></a>
		</div>
		<div class="col small-4 right">
			<?php previous_post_link('%link', '<span class="green">Next</span><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'); ?>
		</div>
		<?php // echo posts_nav_link('|','Anterior','Siguiente'); ?>
		
	</div>

</div>

<?php do_action('flatsome_after_blog');
