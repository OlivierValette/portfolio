<?php /* Template Name: project */ ?>

<?php get_header(); ?>

<?php
// get page title
$page = get_post();
$pagetitle = get_the_title($post->ID);
$pagefeaturedimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');

// prepare custom request
$args = [
        'post_type' => 'project',
        'post_per-page' => 6,
        'order' => 'ASC',
];
$the_project = new WP_Query($args);
?>

<header class="home-header"
        style="background-image: url('<?= $pagefeaturedimage[0] ?>')">
    <h1 ><?= $pagetitle; ?></h1>
</header>

<?php if ( $the_project->have_posts() ) : ?>

    <main class="home-main">

        <div class="home-content">
	        <?php while ($the_project->have_posts()) : $the_project->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="home-link">
                    <h2 class="content-title">
						<?php the_title(); ?>
                    </h2>
                    <div class="content-thumbnail">
                        <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="content-text">
                        <p>Ajouté le <?php the_time('l d F Y'); ?></p>
						<?php the_excerpt(); ?>
                    </div>
                </a>
                <?php // project categories (project_type) ?>
                <?php $project_taxo= get_the_terms( $post->ID, 'project_type'); ?>
                <p>
					<?php foreach ($project_taxo as $project_type) : ?>
                        &nbsp;<a class="button" href="<?= site_url().'/project_type/'.$project_type->slug; ?>">
							<?= $project_type->name; ?>
                        </a>
					<?php endforeach; ?>
                </p>
                <?php // project tags (project_tech) ?>
		        <?php $project_taxo= get_the_terms( $post->ID, 'project_tech'); ?>
                <p>
			        <?php foreach ($project_taxo as $project_type) : ?>
                        &nbsp;<a class="tech button" href="<?= site_url().'/project_tech/'.$project_type->slug; ?>">
					        <?= '#'.$project_type->name; ?>
                        </a>
			        <?php endforeach; ?>
                </p>
			<?php endwhile;?>
        </div>

        <aside class="home-widget-area">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar' ) ) : ?>
			<?php endif; ?>
        </aside>

    </main>

    <footer class="home-footer">
    </footer>

<?php endif;?>

<?php get_footer();