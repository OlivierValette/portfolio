<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	    
        <header class="single-header"
                style="background-image: url('<?= bloginfo('template_url'); ?>/images/realisation2.jpg')">
            <h1 >
                <?php _e('Réalisation : ', 'citrouille'); ?>
                <?php the_title(); ?>
            </h1>
            <p>Ajouté le <?php the_time('l d F Y'); ?></p>
            <p>
                <?php _e('Catégories :', 'citrouille'); ?>
                <?php // project categories (project_type) ?>
                <?php $project_taxo= get_the_terms( $post->ID, 'project_type'); ?>
		        <?php foreach ($project_taxo as $project_type) : ?>
                    &nbsp;<a class="button" href="<?= site_url().'/project_type/'.$project_type->slug; ?>">
				        <?= $project_type->name; ?>
                    </a>
		        <?php endforeach; ?>
            </p>
        </header>
    
        <main class="single-main">
            
            <div class="single-content">
	
                <div class="list-group">
                    <h3><?php the_field('project-name'); ?>
                        <?php if (get_field('project-url')) : ?>
                            <a class="" target="_blank" href="<?php the_field('project-url'); ?>">
                                <i class="fa fa-eye fa-2x fa-fw"></i>
                            </a>
                        <?php endif; ?>
                    </h3>
                    <?php if (get_field('project-desc')) : ?>
                        <p><strong><?php the_field('project-desc'); ?></strong></p>
                    <?php endif; ?>
                </div>
                
                <?php the_content(); ?>
                
            </div>
    
            <aside class="single-aside">
                
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="image à la une">
                
	            <?php // project tags (project_tech) ?>
	            <?php $project_taxo= get_the_terms( $post->ID, 'project_tech'); ?>
                <p>
		            <?php foreach ($project_taxo as $project_type) : ?>
                        &nbsp;<a class="tech button" href="<?= site_url().'/project_tech/'.$project_type->slug; ?>">
				            <?= '#'.$project_type->name; ?>
                        </a>
		            <?php endforeach; ?>
                </p>
                
            </aside>

        </main>
    
    
        <footer class="single-footer">
        </footer>
	
	<?php endwhile;?>

<?php endif;?>

<?php get_footer();