<?php
    
get_header(); 

    if (is_category('user-interface')){ ?>
        <div class="category-image">
            <img src="<?php bloginfo('template_url');?>/assets/user-interface.png">
        </div>
    <?php } elseif (is_category('creative-ad')) { ?>
        <div class="category-image">
            <img src="<?php bloginfo('template_url');?>/assets/creative-ad.png">
        </div>
    <?php } elseif (is_category('user-research')) { ?>
        <div class="category-image">
            <img src="<?php bloginfo('template_url');?>/assets/user-research.png">
        </div>
    <?php } elseif (is_category('front-end')) { ?>
        <div class="category-image">
            <img src="<?php bloginfo('template_url');?>/assets/front-end.png">
        </div>
    <?php } else { ?>
        <div class="category-image">
            <img src="<?php bloginfo('template_url');?>/assets/meetued.png">
        </div>
    <?php } ?>

    <div class="post-list">

        <?php if ( have_posts() ) :

            // loop the posts

            while ( have_posts() ) : the_post(); ?>

            <div class="post">
                <div class="post-wrap">
                    <!-- post thumbnail -->
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                    </div>

                    <div class="post-info">
                        <!-- the title -->
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- posti info -->
                        <div class="post-metadata">
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
                            <!-- post's time -->
                            <span class="post-time"><?php the_time('Y.m.d'); ?></span>
                        </div>

                        <!-- the excerpt  -->
                        <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            </div>

            <?php endwhile;
            
            else :
                echo '<p>no content found</p>';

            endif; ?>
    </div>

<?php get_footer();

?>
