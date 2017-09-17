<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section class="col-lg-2 col-md-2 col-sm-4">
		<header>
			<?php
				if(is_tag()){
					echo '<h1 class="page-title">'.single_tag_title(  '', false ).'</h1>';
				}
				else{
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				}
				
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			<h1 class="page-title"><?php //printf( __( 'Category Archives: %s', 'Skeleton' ),  '' . single_cat_title(  '', false ) .  '' ); ?></h1>
			
		</header>
	</section>
	<div id="liste" class="col-lg-7 col-md-7 col-sm-8">
		<?php 
			//print_r($wp_query->query);
			$tag=$wp_query->query[tag];
			query_posts(array('post_type' => array('post', 'artiste'),'tag'=>$tag));
			if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<div class="col-lg-4 picture">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
								</div>
								<div class="col-lg-8">
									<header class="entry-header article-header">
	
										<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									</header>
	
									<section class="entry-content cf">
	
										<?php //the_post_thumbnail( 'medium' ); ?>
	
										<?php the_excerpt(); ?>
	
									</section>
	
									<footer class="article-footer">
	
									</footer>
								</div>
									
							</article>

							<?php endwhile; ?>


							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
	</div>
	<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>