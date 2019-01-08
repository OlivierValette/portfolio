<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title><?php wp_title(''); ?></title>
	
	<?php wp_head(); ?>
	
</head>

<body <?php
			//body_class() generate a context dependant class attribute
			body_class();
		?>>

	<header>
		<?php
			wp_nav_menu([
				'theme_location' => 'menu-principal',
				'container' => 'nav',
			]);
		?>
	</header>