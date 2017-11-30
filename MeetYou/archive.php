<?php
    
get_header(); 

    if ( have_posts() ) :

        while ( have_posts() ) : the_post(); ?>

        <article class="post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="post-info"><?php the_time('Y.m.d'); ?></p>

            <?php

                $categories = get_the_category();
                $separator = ',';
                $output = '';

                if ($categories) {

                    foreach ($categories as $category) {
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                    }

                    echo trim($output, $separator);
                }
            
            ?>

            <?php the_content(); ?>
        </article>

        <?php endwhile;
        
        else :
            echo '<p>no content found</p>';

        endif;

get_footer();

?>
