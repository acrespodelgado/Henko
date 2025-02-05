<?php 
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'new',
		'posts_per_page' => 9,
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$query = new WP_Query( $args );
	if($query->have_posts()) : 
	?>
	<div class="container p-0">
		<div class="row row-collapse row-full-width py-4">
			<div class="col small-12">
				<h1>News</h1>
			</div>
		<?php $contador = 1;  ?>
		<?php while($query->have_posts()) : 
			$query->the_post(); ?>
			<div class="col small-12 medium-4">
				<?php if($contador > 3) : ?>
					<div class="is-divider hide-xs"></div>
				<?php endif; ?>
				<div class="noticia">
					<a href="<?php echo get_post_permalink(); ?>" title="<?php echo get_the_title(); ?>">
						<div class="overflow-img">
							<?php if(get_the_post_thumbnail()) : ?>
								<?php echo get_the_post_thumbnail( $post->ID, 'actualidad' ); ?>
							<?php endif; ?>
						</div>
						<?php if(get_field( 'fecha' )) : ?>
							<h3><?php echo get_field( 'fecha' ); ?></h3>
						<?php endif; ?>
						<h2><?php echo get_the_title(); /* wp_trim_words(get_the_title(), 10);*/ ?></h2>
					</a>
				</div>
			</div>
			<?php $contador++; ?>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
		<?php get_the_posts_pagination(); ?>
		<?php flatsome_posts_pagination(); ?>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	endif; ?>