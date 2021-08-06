<?php get_header(); ?>

<?php get_template_part('templates/hero', null, array(
    'color' => get_theme_mod('pt_archive_project_general_color', false) ? 'primary' : 'secondary',
    'title' => get_theme_mod('pt_archive_project_title', "Projects"),
    'subtitle' => get_theme_mod('pt_archive_project_subtitle', "My personal projects, finished or not."),
)); ?>

<div id="projects-content">
    <div class="container">
        <?php
        $the_query = new WP_Query(array('post_type' => 'pt_project'));
        if ($the_query->have_posts()) :
        ?>
            <div class="logo-grid grid-<?php echo get_theme_mod('pt_archive_project_general_color', false) ? 'primary' : 'secondary'; ?> project-grid">
                <?php while ($the_query->have_posts()) : $the_query->the_post();
                    $url = get_post_meta(get_the_ID(), 'project_url', true);
                    $label = get_post_meta(get_the_ID(), 'project_label', true);
                    $icon = get_post_meta(get_the_ID(), 'project_icon', true); ?>
                    <div class="grid-item client">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="logo" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                        <div class="info">
                            <?php
                            if ($icon) :
                            ?>
                                <div class="domains">
                                    <div class="domain" data-tooltip="<?php echo $label; ?>">
                                        <i class="<?php echo $icon; ?>"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <h3 class="name"><?php the_title(); ?></h3>
                            <div class="links">
                                <a href="<?php the_permalink(); ?>" class="btn-icon link">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a href="<?php echo $url ?>" rel="external" target="_blank" class="btn-icon link">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <div>
                <p><?php echo __('No projects...', 'propaganda'); ?></p>
            </div>
        <?php endif; ?>

        <?php get_template_part('templates/outro', null, array(
            'title' => get_theme_mod('pt_archive_project_cta_title', "Check this out!"),
            'color' => get_theme_mod('pt_archive_project_general_color', true) ? 'primary' : 'secondary',
            'btn_link' => get_theme_mod('pt_archive_project_button_link', "#"),
            'btn_label' => get_theme_mod('pt_archive_project_button_label', "I lead somewhere"),
        )); ?>
    </div>
</div>

<?php get_template_part('templates/marquee', null, array(
    'color' => get_theme_mod('pt_archive_project_general_color', true) ? 'primary' : 'secondary',
    'text' => get_theme_mod('pt_marquee_content', "Here is some message!"),
)); ?>

<?php get_footer(); ?>