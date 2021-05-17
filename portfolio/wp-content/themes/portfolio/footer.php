<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio
 */

?>

<footer class="footer">
	<div class="container">
		<div class="footer__title">Володя Саенко</div>
		<div class="footer__copy">(с) 2021. Какие-то права защищены.</div>
	</div>
</footer>

<?php
if (in_array('feedback-popup', $args)) {
?>
	<div id="feedback-popup" class="feedback-popup form mfp-hide">
		<?php echo do_shortcode('[contact-form-7 id="202" title="Форма обратной связи"]') ?>
	</div>
<?php
}
?>

<?php wp_footer(); ?>
</body>

</html>