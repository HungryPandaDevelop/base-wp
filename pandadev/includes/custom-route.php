<?php

// РОУТ ДЛЯ РЕГИСТРАЦИИ

function check_user_exist($request){
 

  if (username_exists($request['user_login'])) {
      return 'yes';
  } else {
      return 'no';
  }
}

add_action('rest_api_init', function(){
	register_rest_route('adeapi/v1', 'check_user_exist',[
		'methods'	=>	'POST',
		'callback'	=>	'check_user_exist'
	]);

});


function add_user_api($request){

	$user_id = wp_insert_user([
		'user_login'	=>	$request['user_login'],
		'user_pass'	=>	$request['user_pass'],
		'user_email'	=>	$request['user_pass'],
    'role' => 'editor',
	]);
  $user_send_back = [
		'user_login'	=>	$request['user_login'],
		'user_pass'	=>	$request['user_pass']
  ];

	if( is_wp_error($user_id) ){
		$error_message = $user_id->get_error_message();

    status_header(403);
    echo $error_message;
    exit;

	}else{
		// echo "Успешно зарегестрирован";
    // $user_data = get_userdata($user_id);
    // wp_send_json_success($user_data->data);
    return $user_send_back;
	}
}


add_action('rest_api_init', function(){
	register_rest_route('adeapi/v1', 'add_user_api',[
		'methods'	=>	'POST',
		'callback'	=>	'add_user_api'
	]);

});
// РОУТ ДЛЯ РЕГИСТРАЦИИ


add_action('rest_api_init', 'reg_path');

function reg_path(){
  register_rest_route('search','all', array(
    'methods' =>  WP_REST_SERVER::READABLE, // 'GET'
    'callback'  =>  'searchAll'
  ));


}

function searchAll($data){

  $customPosts = new WP_Query(array(
    'post_type' => array('news','blog','product','services'),
    'posts_per_page' => -1,
    // 'search_prod_title' => $data['search'],
    's' =>  $data['search']
  ));

  $typesResults = array(
    'news'  =>  array(),
    'blog'  =>  array(),
    'product'  =>  array(),
    'services'  =>  array(),
  );


  // $customPostsResults = array();

  while($customPosts->have_posts()){
    $customPosts->the_post();

    foreach ($typesResults as $key => $value) {
      // echo $key;
      if(get_post_type() == $key){
        array_push($typesResults[$key], array(
          'id' => get_the_ID(),
          'title' => get_the_title(),
          'link'  => get_permalink(get_the_ID())
        ));
      }
    }

  }

  return $typesResults;
}