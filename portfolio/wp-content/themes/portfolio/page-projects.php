<?php
get_header();
?>


<section class="projects decor--bg-part page-section">
    <div class="container">
        <div class="projects__inner">
            <h1 class="projects__title title title--large"><?php the_title(); ?></h1>
            <ol class="projects__items">
                <?php
                // параметры по умолчанию
                $posts = get_posts(array(
                    'numberposts' => 0,
                    'category_name'    => 'project',
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
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
            </ol>
        </div>
    </div>
</section>

<?php
get_footer();
?>