<!DOCTYPE html>
<html>
<head>
	<title></title>
	
		<div class="head">
			<h1><a href="<?php echo get_home_url() ?>"><?php echo get_bloginfo('name'); ?></a></h1>
			<p><?php echo get_bloginfo('description'); ?></p>
		</div>
		<hr>
		<div class="nav">
			<?php wp_nav_menu( array(
			'theme_location' => 'header_menu',
			'container_class'=> 'custom_menu_class',
			)) ?>
		</div>
		<hr>
<?php wp_head(); ?>
</head>
<body>
