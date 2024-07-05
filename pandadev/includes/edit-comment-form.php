<?php

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
      unset($fields['url']);
      return $fields;
}





//function rjs_comments_walker()

if( ! function_exists( 'rjs_comments_walker' ) ):
function rjs_comments_walker($comment, $args, $depth) {
    ?>
<div class="comments-item" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
  <div class="comments-head">

    <div>
      <div class="comments-name"><?php echo get_comment_author() ?></div>
      <div class="comments-date">
        <?php 
    printf(
      esc_html__('Опубликовано %1$s в %2$s', '5balloons_theme'),
      date_i18n('d.m.Y', strtotime(get_comment_date())),
      date_i18n('H:i', strtotime(get_comment_time()))
); ?>

      </div>
    </div>
    <?php $count_rating = get_comment_meta( get_comment_ID(), 'rating', true );
      if($count_rating){?>
    <div class="comments-grade">
      <span>Оценка:</span><b>
        <?php
              
              echo $count_rating; 
            ?>
      </b>
    </div><?php } ?>

  </div>
  <div class="comments-body">
    <div class="comments-img img-cover">
      <?php echo get_avatar(get_the_author_meta('user_email') ); ?>
    </div>
    <div class="comments-text">
      <?php comment_text() ?>
    </div>
  </div>
</div>
<?php
        }
endif;


add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}