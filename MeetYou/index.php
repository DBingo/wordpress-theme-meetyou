<?php
    
get_header(); 

    if ( have_posts() ) :

        // loop the posts

        while ( have_posts() ) : the_post(); ?>

        <article class="post <?php if (has_post_thumbnail()) { ?>has-thumbnail<?php } ?>">
            <!-- post thumbnail -->
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
            </div>

            <!-- the title -->
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <!-- posti info -->
            <div class="post-info">
                <!-- post's time -->
                <span class="post-time"><?php the_time('Y.m.d'); ?></span>
                <!-- loop the post's categories -->
                <?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if ($categories) {
                        foreach ($categories as $category) {
                            $output .= '<span class="post-stamp"><a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a></span>' . $separator;
                        }
                        echo trim($output, $separator);
                    }
                ?>
            </div>

            <!-- the excerpt or full content -->
            <?php if ($post->post_excerpt) { ?>
                <p><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read More&raquo;</a></p>
            <?php } else {
                the_content();
            } ?>

        </article>

        <?php endwhile;
        
        else :
            echo '<p>no content found</p>';

        endif;

get_footer();

?>
