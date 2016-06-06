<?php

get_header(); ?>

              











<!-- Featured -->
	<section class="qr-featured">
		<div class="row">
		<?php 
			$newsArgs = array( 'post_type' => 'destaques', 'posts_per_page' => 1);                   
                        
      $newsLoop = new WP_Query( $newsArgs );   
        while ( $newsLoop->have_posts() ) : $newsLoop->the_post();              ?> 
			<div class="col-md-6 qr-featured-primary">
				<figure class="overlay">
					<?php the_post_thumbnail('img-responsive'); ?>
				</figure>

				<!-- qr featued info -->
				<div class="qr-featured-info">
					<span class="qr-featured-tag"><?php the_tags(''); ?></span>
					<h4 class="qr-featured-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				</div>
				<!-- qr featued info -->
			</div>
<?php endwhile; ?>


<?php 
			$newsArgs = array( 'post_type' => 'Destaques Secundários', 'posts_per_page' => 4);                   
                        
      $newsLoop = new WP_Query( $newsArgs );   
        while ( $newsLoop->have_posts() ) : $newsLoop->the_post();              ?> 
			<div class="col-md-3 qr-featured-secondary">
				<figure class="overlay">
					<?php the_post_thumbnail('img-responsive'); ?>
				</figure>

				<!-- qr featued info -->
				<div class="qr-featured-info">
					<span class="qr-featured-tag"><?php the_tags(''); ?></span>
					<h4 class="qr-featured-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				</div>
				<!-- qr featued info -->
			</div>
<?php endwhile; ?>

			
		
		</div>
	</section>
	<!-- Featured -->



	<!-- News-->
	<section class="qr-news">
		<div class="row">
			<?php if ( have_posts() ) :
			?>

				<?php while ( have_posts() ) : the_post(); 
				?>

			<div class="col-md-3 qr-news-post">
				<figure>
					<?php the_post_thumbnail('img-responsive'); ?>
				</figure>
				<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a></h4>
				<p><?php the_content(''); 
							?></p>
				<a href="#" class="qr-news-post--link"><?php wp_link_pages();  ?></a>
			</div>
			

				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'newer' );  ?></div>
					<div class="next-page"><?php next_posts_link( 'older' ); ?></div>
				</div><!-- pagination -->


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Não encontramos nenhuma notícia. Tente novamente mais tarde.</h1>
				</article>

			<?php endif; ?>
		</div>
	</section>
	<!-- News-->


		



<?php get_footer();  ?>