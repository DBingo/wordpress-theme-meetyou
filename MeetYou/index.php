<?php get_header(); ?>
    
    <?php if ( have_posts() ) :

        // loop the posts
        $post_count = 0;
        $post_array = array();

        while ( have_posts() ) : the_post(); 
            // get link and title
            $the_link = get_permalink();
            $the_title = get_the_title();
            $categories = get_the_category();
            $first_cate = $categories[0]->cat_name;
            $excerpt = get_the_excerpt();

            // get featured images array
            if( class_exists('Dynamic_Featured_Image') ) {
                global $dynamic_featured_image;
                $featured_images = $dynamic_featured_image->get_featured_images( );
            }

            switch ($post_count)
            {
                case 0:
                $post_array[$post_count] = "<a target='_blank' href='$the_link'>
                                <img src='". $featured_images[0][full] ."'>
                                <!-- <div class='title'>$the_title</div> -->
                            </a>";
                break;

                case 1:
                case 3:
                case 5:
                case 9:
                $post_array[$post_count] = "<div class='grid square'>
                                <a target='_blank' href='$the_link'>
                                    <img src='". $featured_images[1][full] ."'>
                                    <div class='titlecontainer'>
                                        <div class='title'>$the_title</div>
                                    </div>
                                </a>
                            </div>";
                break;

                case 2:
                case 6:
                case 7:
                $post_array[$post_count] = "<div class='grid long'>
                                <a target='_blank' href='$the_link'>
                                    <img src='". $featured_images[2][full] ."'>
                                    <div class='titlecontainer'>
                                        <div class='title'>$the_title</div>
                                    </div>
                                </a>
                            </div>";
                break;

                case 4:
                case 8:
                $post_array[$post_count] = "<div class='grid text'>
                                                <a target='_blank' href='$the_link'>
                                                    <div class='tag'>$first_cate</div>
                                                    <div class='title'>$the_title</div>
                                                    <div class='excerpt'>$excerpt</div>
                                                </a>
                                            </div>";
                break;
                default:
                break;
            }

            $post_count++;

        endwhile;
        
        if ($post_array[7] == null) {
            $post_array[7] = '<div class="grid long">
                                    <a target="_blank" href="https://youbaobao.meiyou.com/">
                                        <img src="http://ued.meiyou.com/wp-content/uploads/2018/03/youbaobao.png">
                                        <div class="titlecontainer">
                                            <div class="title">有宝宝就用柚宝宝</div>
                                        </div>
                                    </a>
                                </div>';
        }
        if ($post_array[8] == null) {
            $post_array[8] = '<div class="grid square">
                                    <a target="_blank" href="https://www.meiyou.com/">
                                        <img src="http://ued.meiyou.com/wp-content/themes/MeetYou/assets/9.jpg">
                                    </a>
                                </div>';
        }
        if ($post_array[9] == null) {
            $post_array[9] = '<div class="grid square">
                                    <a target="_blank" href="https://uedkit.meiyou.com/">
                                        <img src="http://ued.meiyou.com/wp-content/themes/MeetYou/assets/ued.jpg">
                                        <div class="titlecontainer">
                                            <div class="title">Nice To MeetYou</div>
                                        </div>
                                    </a>
                                </div>';
        }

        $index_template = "<div class='front-page'>
                                <div class='landscape-banner'>$post_array[0]</div>
                                <div class='column-container'>
                                    <div class='column'>$post_array[1]$post_array[4]$post_array[7] $post_array[1]$post_array[4]$post_array[7]</div>
                                    <div class='column'>$post_array[2]$post_array[5]$post_array[8] $post_array[2]$post_array[5]$post_array[8]</div>
                                    <div class='column'>$post_array[3]$post_array[6]$post_array[9] $post_array[3]$post_array[6]$post_array[9]</div>
                                </div>
                            </div>";
        echo $index_template;

    else :
        echo '<p>no content found</p>';

    endif; ?>

<?php get_footer(); ?>