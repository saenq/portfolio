<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portfolio
 */

?>

<section class="project">
	<div class="container">
		<div class="project__inner">
			<div class="project__title">
				<h1 class="title title--medium"><?php the_title(); ?></h1>
				<a href="<?php the_field('project__link_source_code') ?>" class="external" target="_blank">GitHab</a>
			</div>
			<div class="project__gallery">
				<?php

				// переменные
				$images = array_filter(get_field('project_images'));
				// var_dump($images['project__image_1']);
				if (count($images) == 1) : ?>
					<div class="project__image">
						<img class="project__img" src="<?php
														echo $images[array_key_first($images)]
														?>" alt="">
					</div>
				<?php else : ?>
					<div class="project__slider-for">
						<?php
						$flag1 = true;
						foreach ($images as $kay => $image) {
							if ($flag1) {
								$flag1 = false;
							} else {
						?>
								<div class="project__slider-for-item">
									<img class="project__slider-for-img" src="<?php echo $image ?>" alt="">
								</div>
						<?php
							}
						}
						?>
					</div>
					<div class="project__slider-nav">
						<?php
						$flag2 = true;
						foreach ($images as $kay => $image) {
							if ($flag2) {
								$flag2 = false;
							} else {
						?>
								<div class="project__slider-nav-item">
									<img class="project__slider-nav-img" src="<?php echo $image ?>" alt="">
								</div>
						<?php
							}
						}
						?>
					</div>
				<?php endif; ?>


			</div>
			<div class="project__body">
				<div class="project__text text">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolio'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);
					?>
				</div>
				<div class="project__btns">
					<a class="project__btn btn" href="<?php the_field('project__link') ?>" target="_blank">ПОСМОТРЕТЬ</a>
					<a class="project__btn btn feedback-popup__btn" href="#feedback-popup">НАПИСАТЬ МНЕ</a>
				</div>
			</div>
		</div>
	</div>
</section>