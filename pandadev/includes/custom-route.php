<?php

add_action('rest_api_init', 'reg_path');

function reg_path(){
  register_rest_route('search','all', array(
    'methods' =>  WP_REST_SERVER::READABLE, // 'GET'
    'callback'  =>  'searchAll'
  ));


}



function searchAll($data){

  $customPosts = new WP_Query(array(
    'post_type' => 'news',
    'posts_per_page' => -1,
    // 'search_prod_title' => $data['search'],
    's' =>  $data['search']
  ));



  $results = array();

  while($customPosts->have_posts()){
    $customPosts->the_post();

  
        array_push($results, array(
          'id' => get_the_ID(),
          'title' => get_the_title(),
          'link'  => get_permalink(get_the_ID())
        ));
    

  }

  return $results;
}