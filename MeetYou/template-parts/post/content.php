<article class="post <?php if (has_post_thumbnail()) { ?>has-thumbnail<?php } ?>">

    <!-- post thumbnail -->
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-thumbnail">
            <?php if ( is_single() ) { 
                the_post_thumbnail('banner-thumbnail'); 
            } else { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>  
            <?php }?>
        </div>
    <?php } ?>

    <!-- the title -->
    <?php if ( is_single() ) { ?>
        <div class="post-title"><?php the_title(); ?></div>
    <?php } else { ?>
        <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php }?>

    <!-- posti info -->
    <div class="post-info">
        <!-- loop the post's categories -->
        <?php
            $categories = get_the_category();
            $separator = '&nbsp;&nbsp;';
            $output = '';
            if ($categories) {
                foreach ($categories as $category) {
                    $output .= '<span class="post-cate"><a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a></span>' . $separator;
                }
                // echo trim($output, $separator);
                echo $output;
            }
        ?>

        <!-- post's time -->
        <span class="post-time"><?php the_time('Y.m.d'); ?></span>
        
    </div>

    <!-- post content -->
    <?php if ( is_single() ) { ?>
        <div class="post-content">  
            <?php the_content(); ?>
        </div>
    <?php } else {
        if ($post->post_excerpt) { ?>
            <p><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read More&raquo;</a></p>
        <?php } else {
            the_content();
        }
    } ?>
</article>