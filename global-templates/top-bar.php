<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>
    
<div id="wrapper-top-bar" class="top-bar bg-light">

    <nav id="top-bar-nav" class="navbar navbar-expand-lg navbar-light py-0" aria-labelledby="top-bar-nav-label">

        <p id="top-bar-nav-label" class="screen-reader-text">
            <?php esc_html_e( 'Top bar Navigation', 'understrap' ); ?>
        </p>


        <?php if ( 'container' === $container ) : ?>
            <div class="container justify-content-center justify-content-lg-between">
        <?php endif; ?>

            <span></span>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topbarNavDropdown" aria-controls="topbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'top-bar',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'topbarNavDropdown',
                    'menu_class'      => 'navbar-nav ml-auto',
                    'fallback_cb'     => '',
                    'menu_id'         => 'top-bar-menu',
                    // 'depth'           => 2,
                    // 'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            );
            ?>

        <?php if ( 'container' === $container ) : ?>
        </div><!-- .container -->
        <?php endif; ?>

    </nav><!-- .site-navigation -->

</div>


