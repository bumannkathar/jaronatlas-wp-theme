<?php get_header(); ?>

<main class="container py-2">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', get_post_format() ); // Den Inhalt des Beitrags abrufen mit Post-Format. ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); // Den Inhalt des Fehlertemplates abrufen. ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
