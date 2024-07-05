<?php get_header(); ?>

<?php get_template_part('template-parts/home/main'); ?>

<?php get_template_part('template-parts/home/search'); ?>

<?php get_template_part('template-parts/home/services'); ?>

<?php get_template_part('template-parts/home/advantages'); ?>

<div class="section-stub"></div>

<?php get_template_part('template-parts/home/banner'); ?>



<?php get_template_part('template-parts/detail/slider_post_template', null, 
  [
    'slug' => 'news'
  ]
); ?>




<?php get_template_part('template-parts/detail/slider_post_template', null, 
  [
    'slug' => 'product'
  ]
); ?>



<?php get_template_part('template-parts/home/partners'); ?>

<?php get_template_part('template-parts/home/faq'); ?>

<?php get_template_part('template-parts/home/contacts'); ?>

<div class="stub-section"></div>

<?php get_template_part('template-parts/home/feedback'); ?>

<div class="stub-section"></div>

<?php 

get_footer(); ?>