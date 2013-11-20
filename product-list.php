<?php
/*
Template Name: Product List
*/

get_header(); ?>
<div id="primary">
<?php get_sidebar(); ?>
<?php $loop = new WP_Query( array( 'post_type' => 'products', 'posts_per_page' => 10 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?> 
<?php if ( has_post_thumbnail()) : ?>
   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   	<?php the_post_thumbnail(array(100,100)); ?>
   </a>
   <strong>Product: </strong><?php the_title(); ?><br />
				<strong>Product ID: </strong>
				<?php echo esc_html( get_post_meta( get_the_ID(), 'product_id', true ) ); ?>
				<br />
				<strong>Price: </strong>
				<?php echo esc_html( get_post_meta( get_the_ID(), 'product_price', true ) ); ?>
				<br />
				<!-- Display yellow stars based on rating -->
				<strong>Rating: </strong>
				<?php
				$nb_stars = intval( get_post_meta( get_the_ID(), 'movie_rating', true ) );
				for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
					if ( $star_counter <= $nb_stars ) {
						echo '<img src="' . plugins_url( 'Product/images/icon.png' ) . '" />';
					} else {
						echo '<img src="' . plugins_url( 'Product/images/grey.png' ). '" />';
					}
				} ?>
 <?php endif; ?>
<?php endwhile; ?></div>