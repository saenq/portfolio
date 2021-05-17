<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Portfolio
 */

get_header();
?>


<?php
while (have_posts()) :
	the_post();

	get_template_part('template-parts/content', get_post_type());

endwhile; // End of the loop.
?>


<section class="projects page-section decor--bg">
	<div class="container">
		<div class="projects__inner">
			<h2 class="projects__title title title--medium">Еще проекты</h2>
			<ol class="projects__items">

				<?php
				// параметры по умолчанию
				$posts = get_posts(array(
					'numberposts' => 3,
					'category_name'    => 'project',
					'orderby'     => 'rand',
					// 'order'       => 'DESC',
					'post_type'   => 'post',
					'exclude'     => array($post->ID),
					'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
				));

				foreach ($posts as $post) {
					setup_postdata($post);
					// формат вывода the_title() ...
					$image = get_field('project_images');
				?>
					<li class="projects__item card">
						<div class="card__image">
							<a href="<?php echo get_permalink() ?>">
								<img class="card__img" src="<?php the_field('project_images_project__image_1') ?>" alt="">
							</a>
						</div>
						<div class="card__body">
							<a href="<?php echo get_permalink() ?>" class="card__title"><?php the_title(); ?></a>
							<div class="card__text">
								<?php the_field('project__short_description'); ?>
							</div>
							<div class="card__links">
								<a class="card__link" href="<?php echo get_permalink() ?>">Подробнее</a>
								<a class="card__link" href="<?php the_field('project__link') ?>" target="_blank">Посмотреть</a>
								<a class="card__link" href="<?php the_field('project__link_source_code') ?>" target="_blank">GitHab</a>
							</div>
						</div>
					</li>
				<?php

				}

				wp_reset_postdata(); // сброс
				?>


				<!-- <li class="projects__item card">
					<div class="card__image">
						<a href="./project.html">
							<img class="card__img" src="./images/projects/grand-theatre.jpg" alt="">
						</a>
					</div>
					<div class="card__body">
						<a href="./project.html" class="card__title">Исследование и упаковка</a>
						<p class="card__text">
							Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
							является стандартной "рыбой" для текстов на латинице с начала XVI века.
						</p>
						<a href="./project.html" class="card__link">Подробнее</a>
						<a href="#" class="card__link">Посмотреть</a>
						<a href="#" class="card__link">GitHab</a>
					</div>
				</li>

				<li class="projects__item card">
					<div class="card__image">
						<a href="./project.html">
							<img class="card__img" src="./images/projects/grand-theatre.jpg" alt="">
						</a>
					</div>
					<div class="card__body">
						<a href="./project.html" class="card__title">Исследование и упаковка</a>
						<p class="card__text">
							Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
							является стандартной "рыбой" для текстов на латинице с начала XVI века.
						</p>
						<a href="./project.html" class="card__link">Подробнее</a>
						<a href="#" class="card__link">Посмотреть</a>
						<a href="#" class="card__link">GitHab</a>
					</div>
				</li>

				<li class="projects__item card">
					<div class="card__image">
						<a href="./project.html">
							<img class="card__img" src="./images/projects/grand-theatre.jpg" alt="">
						</a>
					</div>
					<div class="card__body">
						<a href="./project.html" class="card__title">Исследование и упаковка</a>
						<p class="card__text">
							Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
							является стандартной "рыбой" для текстов на латинице с начала XVI века.
						</p>
						<a href="./project.html" class="card__link">Подробнее</a>
						<a href="#" class="card__link">Посмотреть</a>
						<a href="#" class="card__link">GitHab</a>
					</div>
				</li> -->
			</ol>
		</div>
	</div>
</section>



<?php
get_footer(null, array('feedback-popup'));
