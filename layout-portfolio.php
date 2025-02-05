<?php
	do_action('flatsome_before_blog');
?>

<?php if(get_field('imagen-interior')) : ?>
	<div class="background-img" style="background:url('<?php the_field('imagen-interior'); ?>')">
		<div class="row">
			<div class="col small-12">
				<h1><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="row mt-4">
	<div class="col small-12 large-3 portfolio-info pr-4">
		<?php if(get_field('anno-inversion')) : ?>
			<span class="info-title">Investment year</span>
			<span class="info-description"><?php the_field('anno-inversion'); ?></span>
			<div class="is-divider"></div>
		<?php endif; ?>
		<?php if(get_field('actividad')) : ?>
			<span class="info-title">Activity</span>
			<span class="info-description"><?php the_field('actividad'); ?></span>
			<div class="is-divider"></div>
		<?php endif; ?>
		<?php if(get_field('sede-central')) : ?>
			<span class="info-title">Headquarters</span>
			<span class="info-description"><?php the_field('sede-central'); ?></span>
			<div class="is-divider"></div>
		<?php endif; ?>

		<?php $es = "/es/"; ?>
		<?php $en = "/en/"; ?>
		<?php $url = $_SERVER['REQUEST_URI']; ?>

		<span class="info-title">Web</span>

		<?php if(get_field( 'web_ingles' ) && strpos($url, $es) === false) : ?>

		<?php 
			$text_area = get_field( 'web_ingles' );
			$text_area_arr = explode("\n", $text_area);
			$text_area_arr = array_map('trim', $text_area_arr);
			foreach ($text_area_arr as $weburl) :
		?>
				<a href="<?php echo $weburl; ?>" class="green" target="_blank"><?php echo $weburl; ?></a>
				<br>
		<?php
			endforeach;
		?>

		<?php else : ?>

			<?php 
			$text_area = get_field( 'web' );
			$text_area_arr = explode("\n", $text_area);
			$text_area_arr = array_map('trim', $text_area_arr);
			foreach ($text_area_arr as $weburl) :
		?>
				<a href="<?php echo $weburl; ?>" class="green" target="_blank"><?php echo $weburl; ?></a>
				<br>
		<?php
			endforeach;
		?>

		<?php endif; ?>

		<?php /*
		<?php if(get_field('web')) : ?>
			<?php $web1 = get_field('web'); ?>
			<?php if(substr($web1, -1) == '/') : ?>
				<?php $web1 = substr($web1, 0, -1); ?>
			<?php endif; ?>
			<?php if(strpos($url, $es) === false) : ?>
				<?php $web1 .= $en; ?>
			<?php endif; ?>
			<a href="<?php echo $web1; ?>" target="_blank" class="info-description info-web"><?php echo $web1; ?></a>
		<?php endif; ?>
		<?php if(get_field('web-2')) : ?>
			<br>
			<?php $web2 = get_field('web-2'); ?>
			<?php if(substr($web2, -1) == '/') : ?>
				<?php $web2 = substr($web2, 0, -1); ?>
			<?php endif; ?>
			<?php if(strpos($url, $es) === false) : ?>
				<?php $web2 .= $en; ?>
			<?php endif; ?>
			<a href="<?php echo $web2; ?>" target="_blank" class="info-description info-web"><?php echo $web2; ?></a>
		<?php endif; ?>
		<?php if(get_field('web-3')) : ?>
			<br>
			<?php $web3 = get_field('web-3'); ?>
			<?php if(substr($web3, -1) == '/') : ?>
				<?php $web3 = substr($web3, 0, -1); ?>
			<?php endif; ?>
			<?php if(strpos($url, $es) === false) : ?>
				<?php $web3 .= $en; ?>
			<?php endif; ?>
			<a href="<?php echo $web3; ?>" target="_blank" class="info-description info-web"><?php echo $web3; ?></a>
		<?php endif; ?>
		*/ ?>
		<div class="is-divider"></div>
		
	</div>
	<div class="col small-12 large-9 portfolio-content">

		<?php /*
		<?php if(get_field('logo')) : ?>
			<img src="<?php the_field('logo'); ?>" class="img-responsive" />
		<?php endif; ?>
		*/
		?>
		<?php
		$logos = get_field('logo');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if($logos): ?>
			<div class="portfolio-logos">
			<?php foreach($logos as $logo): ?>
				<?php echo wp_get_attachment_image($logo, $size); ?>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		<?php if(get_field('subtitulo')) : ?>
			<h2><?php the_field( 'subtitulo' ); ?></h2>
		<?php endif; ?>
		
		<?php echo the_content(); ?>
		
	</div>

	<?php wp_reset_postdata(); ?>

	<?php /* if ( get_theme_mod( 'blog_share', 1 ) ) {
		echo '<div class="blog-share">';
		echo '<h4>Share: </h4>';
		echo do_shortcode( '[share]' );
		echo '</div>';
	} */ ?>

	<div class="navigation">
		<div class="col small-4 left">
			<?php next_post_link('%link', '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i><span class="green">Previous</span>'); ?>
		</div>
		<div class="col small-4 center">
			<a href="<?php echo get_site_url();?>/henko-portfolio/" title='Atrás' class="back"><img src="<?php echo get_site_url();?>/img/atras.png" alt="Atrás"></a>
		</div>
		<div class="col small-4 right">
			<?php previous_post_link('%link', '<span class="green">Next</span><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'); ?>
		</div>
	</div>

</div>

<?php do_action('flatsome_after_blog');
