<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- container -->
    <div class="container">
        <!-- site header -->
        <header class="site-header">
            <div class="logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url');?>/assets/MUED.png"></a>
                <h1><a href="<?php echo home_url(); ?>"><?php //bloginfo('name'); ?>美柚用户体验设计</a></h1>
                <h5><?php //bloginfo('description')?>Meetyou User Experience Design</h5>
            </div>

            <nav class="site-nav">
                <?php
                    $args = array(
                        'theme_location' => 'primary'
                    );
                
                ?>
                <?php wp_nav_menu( $args ); ?>
            </nav>
            
        </header>