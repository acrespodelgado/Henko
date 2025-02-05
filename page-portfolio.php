<?php
/*
Template name: Page - Portfolio
*/

get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div id="content-portfolio" role="main" class="content-area">

	<?php 
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 9,
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$query = new WP_Query( $args );
	if($query->have_posts()) : 
	?>
	<section class="section tablet-responsive hide-for-medium portfolio-title p-0">
		<div class="bg section-bg fill bg-fill bg-loaded-grey"></div>
		<div class="section-content relative">
			<div class="row row-collapse row-full-width align-equal">
				<div id="col-texto-lg" class="col column-flex medium-12 small-12 large-6">
					<div class="col-inner text-left grey-bg"></div>
				</div>
				<div class="col medium-6 small-12 large-6">
					<div class="col-inner">
						<div id="banner-img-lg" class="banner has-hover has-parallax">
							<div class="banner-inner fill">
								<div class="banner-bg fill parallax-active" data-parallax="-5" data-parallax-container=".banner" data-parallax-background="" style="height: 588px; transform: translate3d(0px, 10.67px, 0px); backface-visibility: hidden;">
									<div class="bg fill bg-fill bg-loaded"></div>
								</div>
								<div class="banner-layers container">
									<div class="fill banner-link"></div>            
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col row-absolute h-100 small-12 large-12">
					<div class="col-inner">
						<div class="container flex">
							<div class="text vertical-align">
								<h4>Our portfolio companies are the best example of our approach</h4>
								<h6 class="sub-heading">We invest in top companies and teams and support them to evolve as entrepreneurs. We promote creativity and innovation providing our strategic and operational perspective.</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section mobile-responsive show-for-medium p-0" >
		<div class="bg section-bg fill bg-fill  bg-loaded">
			<div class="is-border" style="border-width:0px 0px 0 0px;margin:0px 0px 0 0px;"></div>
		</div>
		<div class="section-content relative">
			<div class="row row-collapse row-full-width align-equal row-absolute" >
				<div id="col-texto-movil" class="col medium-12 small-12 large-6">
					<div class="col-inner" style="background-color:rgb(208, 216, 216);"></div>
				</div>
				<div class="col medium-12 small-12 large-6">
					<div class="col-inner">
						<div class="banner has-hover has-parallax" id="banner-img-movil">
							<div class="banner-inner fill">
								<div class="banner-bg fill parallax-active" data-parallax="-5" data-parallax-container=".banner" data-parallax-background="" style="backface-visibility: hidden;">
									<div class="bg fill bg-fill"></div>
								</div>
								<div class="banner-layers container">
									<div class="fill banner-link"></div>            
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-middle row-inner">
				<div class="col medium-9 small-12 large-5">
					<div class="col-inner">
						<h4>Our portfolio companies are the best example of our approach</h4>
						<h6 class="sub-heading">We invest in top companies and teams and support them to evolve as entrepreneurs. We promote creativity and innovation providing our strategic and operational perspective.</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container p-0">
		<div class="row row-collapse row-full-width pt-8 pb-4">
			<?php while($query->have_posts()) : $query->the_post(); ?>
				<div class="col small-12 medium-4">
					<div class="portfolio">
						<a href="<?php echo get_post_permalink(); ?>" title="<?php echo get_the_title(); ?>">
							<div class="overflow-img">
								<?php if(get_the_post_thumbnail()) : ?>
									<?php echo get_the_post_thumbnail( $post->ID, 'actualidad' ); ?>
								<?php endif; ?>
							</div>
							<h3><?php echo get_the_title(); ?></h3>
							<?php if(get_field( 'actividad' )) : ?>
								<p><?php echo the_field( 'actividad' ); ?></p>
							<?php endif; ?>
						</a>
					</div>
				</div>
			<?php endwhile; ?>
			<?php //flatsome_posts_pagination(); ?>
			<div class="pagination">
				<?php 
					echo paginate_links(array(
						'total' => $query->max_num_pages,
						'current' => $paged,
					)); 
				?>
			</div>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	endif; ?>
		
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
