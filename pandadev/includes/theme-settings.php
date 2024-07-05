<?php


function new_theme_settings() {
	// add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	// add_image_size('professorLandscape', 400, 260, true);
	// add_image_size('professorPortrait', 480, 650, true);
	// add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'new_theme_settings');


// customizing breadcrumbs
add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('home', $type))
    {
        $title = __('Home');
    }
    return $title;
}

// customizing breadcrumbs

// отключили стили для плагина Menu Icons

function remove_menu_icons_styles() {
    wp_dequeue_style( 'menu-icons-extra' ); // Отключаем стиль 'menu-icons-extra'
    wp_deregister_style( 'menu-icons-extra' );
    // Мы не можем использовать wp_dequeue_style и wp_deregister_style для font-awesome, потому что он был перезаписан.
}
add_action( 'wp_enqueue_scripts', 'remove_menu_icons_styles', 90 );
// отключили стили для плагина Menu Icons







// AJAX


// function true_loadmore_scripts() {
// 	wp_enqueue_script('jquery'); 
// 	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/loadmore.js', array('jquery') );
// }

// add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

function true_load_posts(){

	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';

	query_posts( $args );

	if( have_posts() ) :
	$count = 0;
	// запускаем цикл
	while( have_posts() ): the_post();
	$count++;

	
	get_template_part( $_POST['template'], null, ['id'  => $_POST['template']] ); 
	
	endwhile;

	endif;
	die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

// AJAX


// REACT ROUTER DOM !!!

function custom_rewrite_rule() {
    add_rewrite_rule(
        '^cabinet/([^/]+)/?$', // Шаблон сопоставления: /cabinet/auth
        'index.php?pagename=cabinet', // Целевое местоположение
        'top' // Приоритет
    );
}
add_action( 'init', 'custom_rewrite_rule' );


// REACT ROUTER DOM !!!