<?php
/*
Template Name: Product Template
*/

get_header(); ?>

<div id="primary">
	<?php get_sidebar(); ?>
	<div id="content" role="main">
	<?php query_posts(array('post_type'=>'products')); ?>
	<?php $mypost = array( 'post_type' => 'products' );
	$loop = new WP_Query( $mypost ); ?>
	<!-- Cycle through all posts -->
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">

				<!-- Display featured image in right-aligned floating div -->
				<div style="float:right; margin: 10px">
					<?php the_post_thumbnail( array(300,300) ); ?>
				</div>

				<!-- Display Title and ID -->
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
				}
				?>

			</header>

			<!-- Display Product contents -->
			<div class="entry-content"><?php the_content(); ?></div>

		</article>

	<?php endwhile; ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
