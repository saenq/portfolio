<?php
get_header();
?>

<section class="contacts page-section">
    <div class="container">
        <div class="contacts__inner">
            <div class="contacts__box contacts__info">
                <h1 class="contacts__title title title--medium"><?php the_field('contacts__info-title'); ?></h1>
                <?php the_field('contacts__info-text'); ?>
                <!-- <a class="contacts__info-link" href="tel:3075550133">(307) 555-0133</a>
                <a class="contacts__info-link" href="mailto:bill.sanders@example.com">bill.sanders@example.com</a> -->
            </div>
            <div class="contacts__box">
                <h2 class="contacts__title title title--medium"><?php the_field('contacts__form-title'); ?></h2>
                <p class="contacts__text text">
                    <?php the_field('contacts__form-text'); ?>
                </p>
                <div class="contacts__form form">
                    <?php echo do_shortcode('[contact-form-7 id="202" title="Форма обратной связи"]') ?>
                    <!-- <div class="form__box">
                        <input class="form__item form__input" type="text" placeholder="Ваше имя">
                        <input class="form__item form__input" type="tel" placeholder="Номер телефона">
                    </div>
                    <textarea class="form__item form__textarea" placeholder="Сообщение"></textarea>
                    <input class="form__btn btn" type="submit" value="ОТПРАВИТЬ"> -->
                </div>
            </div>

        </div>

    </div>
</section>

<?php
get_footer();
?>