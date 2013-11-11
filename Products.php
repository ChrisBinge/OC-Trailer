<?php
/*
Plugin Name: Products
Plugin URI: http://www.bingetech.com/
Description: Declares product info
Version: 1.0
Author: Christopher Thomas
Author URI: http://www.bingetech.com/
*/

add_action( 'init', 'create_product' );


function create_product() {
register_post_type( 'products',
array(
'labels' => array(
'name' => 'Products',
'singular_name' => 'Product',
'add_new' => 'Add New',
'add_new_item' => 'Add New Product',
'edit' => 'Edit',
'edit_item' => 'Edit Product',
'new_item' => 'New Product',
'view' => 'View',
'view_item' => 'View Product',
'search_items' => 'Search Products',
'not_found' => 'No Products found',
'not_found_in_trash' =>
'No Products found in Trash',
'parent' => 'Parent Product'
),
'public' => true,
'menu_position' => 15,
'supports' =>
array( 'title', 'editor', 'comments',
'thumbnail',  ),
'taxonomies' => array( '' ),
'menu_icon' =>
plugins_url( 'images/image.png', __FILE__ ),
'has_archive' => true
)
);
}

add_action( 'admin_init', 'my_admin' );




function my_admin() {
add_meta_box( 'product_meta_box',
'Product Details',
'display_product_meta_box',
'products', 'normal', 'high' );
}

function display_product_meta_box( $products ) {
// Retrieve current name of the Product and Rating based on review ID
$product_id =
esc_html( get_post_meta( $products->ID,
'product_id', true ) );
$movie_rating =
intval( get_post_meta( $products->ID,
'movie_rating', true ) );
$product_price =
esc_html( get_post_meta( $products->ID,
'product_price', true ) );
$product_spec =
esc_html( get_post_meta( $products->ID,
'product_spec', true ) );
?>
<table>
<tr>
<td style="width: 100%">Product ID</td>
<td><input type="text" size="80"
name="product_id_field"
value="<?php echo $product_id; ?>" /></td>
</tr>
<tr>
<td style="width: 150px">Rating</td>
<td>
<select style="width: 100px"
name="movie_review_rating">
<?php
// Generate all items of drop-down list
for ( $rating = 5; $rating >= 1; $rating -- ) {
?>
<option value="<?php echo $rating; ?>"
<?php echo selected( $rating,
$movie_rating ); ?>>
<?php echo $rating; ?> stars
<?php } ?>
</select>
</td>
</tr>
<tr>
<td style="width: 100%">Price</td>
<td><input type="text" size="80"
name="product_price_field"
value="<?php echo $product_price; ?>" /></td>
</tr>
<tr>
<td style="width: 100%">Specs</td>
<td><input type="text" size="80"
name="product_spec_field"
value="<?php echo $product_spec; ?>" /></td>
</tr>
</table>
<?php }


add_action( 'save_post',
'add_product_fields', 10, 2 );


function add_product_fields( $movie_review_id,
$products ) {
// Check post type for product reviews
if ( $products->post_type == 'products' ) {
// Store data in post meta table if present in post data
if ( isset( $_POST['product_id_field'] ) &&
$_POST['product_id_field'] != '' ) {
update_post_meta( $movie_review_id, 'product_id',
$_POST['product_id_field'] );
}
if ( isset( $_POST['product_price_field'] ) &&
$_POST['product_price_field'] != '' ) {
update_post_meta( $movie_review_id, 'product_price',
$_POST['product_price_field'] );
}
if ( isset( $_POST['product_spec_field'] ) &&
$_POST['product_spec_field'] != '' ) {
update_post_meta( $movie_review_id, 'product_spec',
$_POST['product_spec_field'] );
}
if ( isset( $_POST['movie_review_rating'] ) &&
$_POST['movie_review_rating'] != '' ) {
update_post_meta( $movie_review_id, 'movie_rating',
$_POST['movie_review_rating'] );
}
}
}


add_filter( 'template_include',
'include_template_function', 1 );


function include_template_function( $template_path ) {
if ( get_post_type() == 'products' ) {
if ( is_single() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'single-product.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/single-product.php';
}
}
}
return $template_path;
}
?>