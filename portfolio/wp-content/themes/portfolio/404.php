<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Portfolio
 */

get_header();
?>
<section class="not-found page-section">
	<div class="container">
		<h1 class="title title--medium title--center">Страница не существует Ошибка 404</h1>
		<p class="text text--center">Неправильно набран адрес, или такой страницы на сайте больше не существует. Вернуться на <a class="link" href="/">главную</a></p>
		<img class="not-found__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/404.gif" alt="">
	</div>
</section>
<?php
get_footer();
