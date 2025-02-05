<?php
/*
Template name: Page - Teams
*/

get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div id="content-team" role="main" class="content-area">
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
								<h4>Entrepreneurship. Passion. Talent. Integrity. Focus.</h4>
								<h6 class="sub-heading">We are a team of growth-driven professionals with extensive investment experience. Our team has different backgrounds with a shared passion for business-building.</h6>
								<h6 class="sub-heading">We bring financial, strategic and operational expertise to our portfolio companies.</h6>
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
						<h4>Entrepreneurship. Passion. Talent. Integrity. Focus.</h4>
						<h6 class="sub-heading">We are a team of growth-driven professionals with extensive investment experience. Our team has different backgrounds with a shared passion for business-building.</h6>
						<h6 class="sub-heading">We bring financial, strategic and operational expertise to our portfolio companies.</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container p-0">
		<div class="row row-full-width pt-8 pb-4">

		<?php
			$es = "/es/";
			$en = "/en/";
			$url = $_SERVER['REQUEST_URI'];

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type' => 'team_member',
				'posts_per_page' => -1,
				'paged' => $paged,
				'orderby' => 'date',
				'order' => 'ASC'
			);

			$query = new WP_Query( $args );
			if($query->have_posts()) : 
				while($query->have_posts()) : $query->the_post(); ?>

				<div class="col small-12 medium-4 team">
					<div class="team-visible">
						<?php if(get_the_post_thumbnail()) : ?>
							<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
						<?php endif; ?>
						<h3><?php echo get_the_title(); ?></h3>
						<?php if(get_field('rol_ingles') && strpos($url, $es) === false) : ?>
							<p><?php echo the_field('rol_ingles'); ?></p>
						<?php else: ?>
							<p><?php echo the_field('rol'); ?></p>
						<?php endif; ?>
					</div>
					<div class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="container">
									<div class="row">
										<div class="col-12 col-lg-5">
											<?php if(get_field('foto_interior')) : ?>
												<div class="overflow-img">
													<img src="<?php the_field('foto_interior'); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>"> 
												</div>
											<?php endif; ?>
										</div>
										<div class="col-12 col-lg-6 offset-lg-1">
											<div class="modal-header">
												<h4 class="modal-title"><?php echo get_the_title(); ?></h4>
												<?php if(get_field('rol_ingles') && strpos($url, $es) === false) : ?>
													<p><?php echo the_field('rol_ingles'); ?></p>
												<?php else: ?>
													<p><?php echo the_field('rol'); ?></p>
												<?php endif; ?>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php if(get_field('descripcion_ingles') && strpos($url, $es) === false) : ?>
													<?php 
														$text_area = get_field( 'descripcion_ingles' );
														$text_area_arr = explode("\n", $text_area);
														$text_area_arr = array_map('trim', $text_area_arr);
														foreach ($text_area_arr as $desc) :
													?>
															<p><?php echo $desc; ?></p>
													<?php endforeach; ?>
													<?php else : ?>
														<?php 
														$text_area = get_field( 'descripcion' );
														$text_area_arr = explode("\n", $text_area);
														$text_area_arr = array_map('trim', $text_area_arr);
														foreach ($text_area_arr as $desc) :
													?>
															<p><?php echo $desc; ?></p>
														<?php endforeach; ?>
												<?php endif; ?>
												<?php if(get_field('linkedin')) : ?>
													<a href="<?php the_field("linkedin");  ?>" target="_blank" class="linkedin"><i class="icon-linkedin"></i></a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
			<?php get_the_posts_pagination(); ?>
			<?php flatsome_posts_pagination(); ?>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	endif; ?>
		
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>