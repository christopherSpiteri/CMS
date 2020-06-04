<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

// Function to add text shortcode to posts and pages
function text_shortcode(){
    return 'System of a Down (formed in 1994) is an American alternative-metal four-piece rock band hailing from Glendale, California, in the U.S.';
}

add_shortcode('text', 'text_shortcode');

function video_shortcode(){
    return '<iframe width="560" height="315" src="https://www.youtube.com/embed/wz1ca1-_-MY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}

add_shortcode('video', 'video_shortcode');

function play_shortcode(){
    return '<iframe src="https://open.spotify.com/embed/playlist/37i9dQZEVXbuIAEa09Im54" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>';
}

add_shortcode('play', 'play_shortcode');

function t_shortcode(){
    return '<a class="twitter-timeline" href="https://twitter.com/COPENHELL?ref_src=twsrc%5Etfw" height="500">Tweets by COPENHELL</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
}

add_shortcode('tweet', 't_shortcode');

function m_shortcode(){
    return '<ul id="footer-nav" class="footer-nav"><li id="menu-item-113" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-113"><a href="http://localhost/WP/wordpress" aria-current="page">Home</a></li>
<li id="menu-item-114" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-114"><a href="http://localhost/WP/wordpress/contact-us/">Contact Us</a></li>
<li id="menu-item-115" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-115"><a href="http://localhost/WP/wordpress/my-account/">My account</a></li>
<li id="menu-item-116" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-116"><a href="http://localhost/WP/wordpress/edit-profile/">Edit Profile</a></li>
</ul>';
}

add_shortcode('menu', 'm_shortcode');

?>