<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.84042.js">
  Modernizr.load({
  if (Modernizr.canvas) {
    alert("This browser supports HTML5 canvas!");
  } else {
    alert("no canvas :(");
  }});
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ddpowerzoomer.js"></script>
<div id="pagecontain">
<header>
	<div id="headerpic"></div>
	<div id="headerspray"></div>
	<a id="logo" href="index.php?p=1"></a>
</header>