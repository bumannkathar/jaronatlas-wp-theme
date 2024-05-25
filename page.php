<?php
/** 
 * Template für einzelne Seiten.
 *
 * @package Dein_Theme_Name
 */

get_header(); ?>

<main id="primary" class="site-main container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'page' );

            // Wenn Kommentare aktiviert sind, zeige Kommentarbereich
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</main><!-- #primary -->

<?php
get_footer();
?>