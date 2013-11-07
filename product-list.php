<?php
/*
Template Name: Product List
*/

get_header();
get_sidebar(); ?>
<div id="primary">
<?php $loop = new WP_Query( array( 'post_type' => 'products', 'posts_per_page' => 10 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?> 
<?php if ( has_post_thumbnail()) : ?>
   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   	<?php the_post_thumbnail(); ?>
   </a></div>
 <?php endif; ?>
<?php endwhile; ?>