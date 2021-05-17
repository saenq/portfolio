<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php
		bloginfo('name');
		if (!empty(get_bloginfo('description'))) {
			echo " | ";
			bloginfo('description');
		}
		?>
	</title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<?php wp_head() ?>
</head>

<body>
	<header class="header">
		<div class="container">
			<div class="header__inner">
				<div class="logo">
					<?php the_custom_logo() ?>
				</div>
					<?php wp_nav_menu([
						'menu'            => 'Main',
						'container'       => 'nav',
						'container_class' => 'menu',
						'menu_class'      => 'menu__list',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					]); ?>
				<!-- <nav class="menu">
					<ul class="menu__list">
						<li class="menu__item menu__item--active">
							<a href="/" class="menu__link">Главная</a>
						</li>
						<li class="menu__item">
							<a href="./projects" class="menu__link">Проекты</a>
						</li>
						<li class="menu__item">
							<a href="./contacts" class="menu__link">Контакты</a>
						</li>
					</ul>
				</nav> -->
			</div>
		</div>
	</header>