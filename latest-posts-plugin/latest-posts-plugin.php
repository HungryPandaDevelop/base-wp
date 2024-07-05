<?php
/**
 * Plugin Name: Latest Posts Plugin
 * Description: Плагин для вывода последних постов с использованием шорткода.
 * Version: 1.0
 * Author: Panda Dev
 */

if (!defined('ABSPATH')) {
    exit; 
}

require 'vendor/autoload.php';

// Регистрация шорткода
add_shortcode('latest_posts', 'display_latest_posts');

function display_latest_posts($atts)
{
    $atts = shortcode_atts(
        array(
            'numberposts' => get_option('latest_posts_number', 10),
        ),
        $atts,
        'latest_posts'
    );

    $query = new WP_Query(array(
        'posts_per_page' => $atts['numberposts'],
        'post_type' =>  'news',
    ));

    if (!$query->have_posts()) {
        return 'Нет постов для отображения.';
    }

    $output = '<ul>';
    while ($query->have_posts()) {
        $query->the_post();
        $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }
    $output .= '</ul>';

    wp_reset_postdata();

    return $output;
}

function log_error($message)
{
    $logger = new \Monolog\Logger('latest_posts_plugin');
    $logger->pushHandler(new \Monolog\Handler\StreamHandler(plugin_dir_path(__FILE__) . 'errors.log', \Monolog\Logger::ERROR));
    $logger->error($message);
}

// Создание страницы настроек в админ панели
add_action('admin_menu', 'latest_posts_plugin_menu');

function latest_posts_plugin_menu()
{
    add_options_page('Настройки Latest Posts Plugin', 'Latest Posts Plugin', 'manage_options', 'latest-posts-plugin', 'latest_posts_plugin_options');
}

function latest_posts_plugin_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('У вас нет доступа к этой странице.'));
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['latest_posts_number'])) {
            update_option('latest_posts_number', intval($_POST['latest_posts_number']));
        } else {
            log_error('Не удалось сохранить значение количества постов.');
        }
    }

    $latest_posts_number = get_option('latest_posts_number', 10);
    ?>
<div class="wrap">
  <h1>Настройки Latest Posts Plugin</h1>
  <form method="post" action="">
    <label for="latest_posts_number">Количество постов для отображения:</label>
    <input type="number" id="latest_posts_number" name="latest_posts_number"
      value="<?php esc_attr($latest_posts_number); ?>">
    <input type="submit" name="submit" value="Сохранить" class="button button-primary">
  </form>
</div>
<?php
}
?>