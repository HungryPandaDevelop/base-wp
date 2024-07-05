<?
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'post_meta', 'Первый слайдер' )
	->show_on_page(32)
	->add_tab('Первый слайдер',[
		Field::make( 'complex', 'crb_slides', 'Главный слайдер' )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( array(
			Field::make( 'text', 'text_1', 'Текст 1' ),
			Field::make( 'text', 'text_2', 'Текст 2' ),
			Field::make( 'text', 'link', 'Ссылка' ),
			Field::make( 'image', 'img', 'Главная картинка' )
				->set_value_type( 'url' ),
		)),
		Field::make( 'complex', 'crb_partners', 'Партнеры' )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( array(
			Field::make( 'text', 'text_1', 'Текст 1' ),
			Field::make( 'image', 'img', 'Лого партнера' )
				->set_value_type( 'url' ),
		))
	]);