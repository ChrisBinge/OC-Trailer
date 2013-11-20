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
	<?php wp_reset_query(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<!-- Display featured image in right-aligned floating div -->	
					<script type="text/javascript">

jQuery(document).ready(function($){ //fire on DOM ready
	$('#product-feature > img').addpowerzoom({
		defaultpower: 2,
		powerrange: [2,5],
		largeimage: null,
		magnifiersize: [100,100] //<--no comma following last option!
	})
});	
</script>
			<div id="img-wrap">
					<div id="product-feature">
						<?php
							if ( has_post_thumbnail() ) {
  								the_post_thumbnail(); }
  						?>
					</div>
					<div id="spec-wrap">
						<p>Specs:</p>
							<?php if ( get_post_meta( get_the_ID(), 'product_spec', true ) ) : ?>
    							<a href="<?php bloginfo('template_url'); ?>/images/lights/<?php echo get_post_meta( get_the_ID(), 'product_spec', true ) ?>" rel="bookmark">
       								 <img class="thumb" src="<?php bloginfo('template_url'); ?>/images/lights/<?php echo get_post_meta( get_the_ID(), 'product_spec', true ) ?>" alt="<?php the_title(); ?>" />
    							</a>
							<?php endif; ?>
					</div>	
			</div>	
				<div id="content-wrap">		
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
			<div class="entry-content"><?php the_content(); ?>
				<div id="payment">
					<img id="cart" src="<?php bloginfo('template_url'); ?>/images/addtocartbutton.png"/>
				</div>
			</div>
		</div>
		</article>
		
		
		<?php comments_template(); ?>

	</div>

</div>


<?php get_footer(); ?>
