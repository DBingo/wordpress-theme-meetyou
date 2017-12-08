<?php
    
get_header(); 

    if ( have_posts() ) :

        // loop the posts

        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/post/content','');

        endwhile;
        
        else :
            echo '<p>no content found</p>';

        endif;

get_footer();

?>
