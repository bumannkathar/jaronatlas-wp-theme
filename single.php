<?php
/** 
 * Einzelansicht für Beiträge
 *
 * @package Jaronatlas Theme
 */

get_header(); ?>

<main id="primary" class="site-main container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );

            // Wenn Kommentare erlaubt sind oder es bereits Kommentare gibt, zeige Kommentarbereich an
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