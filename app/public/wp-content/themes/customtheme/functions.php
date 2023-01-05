<?php

// Enqueue scripts and styles
function custom_theme_enqueue_styles()
{

    wp_enqueue_style('kakadu_styles', get_template_directory_uri() . "/style.css", array('css_bootstrap'), rand(111, 9999), 'all');
    wp_enqueue_style('css_bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", 'all');
    wp_enqueue_style('css_font_awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", 'all');
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap', array());
}

add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');

function custom_theme_register_scripts()
{
    wp_enqueue_script('script_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('script_jquery'), "4.4.1", true);
    wp_enqueue_script('script_jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), "3.4.1", true);
    wp_enqueue_script('script_popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), "1.16.0", true);
}

add_action('wp_enqueue_scripts', 'custom_theme_register_scripts');

// Add theme support
function custom_theme_add_theme_support()
{
    add_theme_support('title-tag');
    // Adds section in WP in site identity to upload logo
    add_theme_support('custom-logo');
    // Adds ability in posts to upload a thumbnail image
    add_theme_support('post-thumbnails');
    // Add ability to upload custom background image
    add_theme_support('custom-background');
    // Ability to add custom header image
    $defaultsheaderimg = array(
        // Default Header Image to display.
        'default-image' => get_template_directory_uri() . '/assets/native-ingredients-header.jpg',
        // Display the header text along with the image.
        'header-text' => true,
        // Header text color default.
        'default-text-color' => '000',
        'flex-width' => true,
        'flex-height' => true,
        // Header image width (in pixels).
        'width' => 1250,
        // Header image height (in pixels).
        'height' => 198,
        // Header image random rotation default.
        'random-default' => false,
        // Enable upload of image file in admin.
        'uploads' => false,
        // Function to be called in theme head section.
        'wp-head-callback' => 'wphead_cb',
        // Function to be called in preview page head section.
        'admin-head-callback' => 'adminhead_cb',
        // Function to produce preview markup in the admin screen.
        'admin-preview-callback' => 'adminpreview_cb',
    );
    add_theme_support('custom-header', $defaultsheaderimg);
}
add_action('after_setup_theme', 'custom_theme_add_theme_support');



// Register navigation menu
function register_my_menu()
{
    register_nav_menu('primary', 'Main Menu');
}
add_action('after_setup_theme', 'register_my_menu');

// Add custom li class for nav menu. Checks if 'add_li_class' exists in the wp_nav_menu() function
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

// Register recipe block pattern
$recipe_pattern = '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:table {"className":"table-recipe"} -->
<figure class="wp-block-table table-recipe"><table><thead><tr><th>serves</th><th>cook time</th><th>ingredients</th><th>difficulty</th></tr></thead><tbody><tr><td>4</td><td>45 mins</td><td>13</td><td>capable</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:image {"align":"center","id":119,"sizeSlug":"full","linkDestination":"none","className":"image-recipe"} -->
<figure class="wp-block-image aligncenter size-full image-recipe"><img src="http://kakaduplum.local/wp-content/uploads/2023/01/macadamia-crumbed-pork-schnitzel-with-aussiekraut.jpg" alt="" class="wp-image-119"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"recipe-block"} -->
<div class="wp-block-group recipe-block"><!-- wp:group {"className":"instructions-container","layout":{"type":"constrained"}} -->
<div class="wp-block-group instructions-container"><!-- wp:paragraph {"className":"paragraph-recipe"} -->
<p class="paragraph-recipe">A short recipe description goes here....</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"ingredients-container","layout":{"type":"constrained"}} -->
<div class="wp-block-group ingredients-container"><!-- wp:heading {"level":3,"className":"subheading-recipe"} -->
<h3 class="subheading-recipe">Ingredients</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->
<li>Ingredient A</li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"list-item-recipe"} -->
<li class="list-item-recipe">Ingredient B</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Ingredient C</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"directions-container","layout":{"type":"constrained"}} -->
<div class="wp-block-group directions-container"><!-- wp:heading {"level":3,"className":"subheading-recipe"} -->
<h3 class="subheading-recipe">Directions</h3>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"recipe-numbered-list"} -->
<ol class="recipe-numbered-list"><!-- wp:list-item -->
<li>Do this thing first...</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Then, do this other thing...</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>And, finally, do this really major thing...</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"}}},"backgroundColor":"black","textColor":"white","className":"social-block"} -->
<div class="wp-block-group social-block has-white-color has-black-background-color has-text-color has-background" style="padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">Like This Recipe?</h3>
<!-- /wp:heading -->

<!-- wp:outermost/social-sharing {"showLabels":true,"size":"has-normal-icon-size","className":"is-style-pill-shape","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-outermost-social-sharing has-normal-icon-size has-visible-labels is-style-pill-shape"><!-- wp:outermost/social-sharing-link {"service":"twitter"} /-->

<!-- wp:outermost/social-sharing-link {"service":"facebook"} /-->

<!-- wp:outermost/social-sharing-link {"service":"pinterest"} /--></ul>
<!-- /wp:outermost/social-sharing --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';


register_block_pattern(
    'kakaduplum/recipe-block-pattern',
    [
        'categories' => [
            'text',
        ],
        'content' => $recipe_pattern,
        'description' => 'A recipe block pattern',
        'keywords' => 'recipe',
        'title' => 'Recipe Block Pattern'
    ],
);