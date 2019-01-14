<?php get_header(); ?>

	<section>

		<?php if ( have_posts() ) : ?>

            <header class="home-header"
                    style="background-image: url('<?= bloginfo('template_url'); ?>/images/search.jpg')">
				<h1>Résultats de la recherche pour "<?= get_search_query(); ?>"</h1>
			</header>
            <div class="searchpagecards">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="searchpagecard-thumbnail">
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                        <div class="searchpagecard-details">
                            <h4><?php the_title() ?></h4>
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
		<?php endif; ?>

	</section>

<?php get_footer();
