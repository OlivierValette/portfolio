<?php get_header(); ?>

        <section class="fourOfour">

            <header class="fourOfour-header"
                    style="background-image: url('<?= bloginfo('template_url'); ?>/images/404.jpg')">
            </header>
                <h1 >Oups. Page non trouvée !</h1>

                <p>La page n'existe pas... Tentez une recherche.</p>

                <?php get_search_form(); ?>

        </section>

<?php get_footer();
