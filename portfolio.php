<?php get_header(); ?>
<div class="container">
	<div class="row">
		<!-- Main Content -->
		<div class="col-md-12">
			<h2 class="page-header"><?php _e('Portfolio', 'dia') ?></h2>
		</div>
	</div>
	<div class="row">
			<?php if ( have_posts() ) ?>
			<?php 
				$args =  array( 
					'post_type' => 'portfolio',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				 $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
		
				<div class="portfolio-item col-md-4 col-sm-6 col-xs-12">
					<div id="project-<?php the_ID() ?>">
						<a href="<?php echo get_post_meta(get_the_ID(), 'project_link', true); ?>" target="_blank">
							<div class="card">
								<div class="card-image">
									<?php the_post_thumbnail(array(800,600), ['class' => 'img-responsive']); ?>
								</div>
								<div class="card-text">
									<p><?php the_title(); ?></p>
								</div>
							</div>
						</a>
					</div>
				</div>
		
			<?php endwhile; ?>
			<?php if ( paginate_links() != null ) {
				echo ('<!-- Pagination -->');
				echo ('<div class="text-center">');
				echo ('<nav aria-label="Page navigation">');
						 echo paginate_links( array(
								'type' => 'list',
								'next_text' => '<svg id="i-arrow-right" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
										<path d="M22 6 L30 16 22 26 M30 16 L2 16" />
									</svg>',
								'prev_text' => '<svg id="i-arrow-left" viewBox="0 0 32 32" width="18" height="18" fill="none" 	stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
									<path d="M10 6 L2 16 10 26 M2 16 L30 16" />
								</svg>',
							)		
						);
					echo ('</nav>');
				echo ('</div>');
			} ?>
	</div>	
</div>
<?php get_footer(); ?>