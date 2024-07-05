<!-- header start-->
<header>
  <div class="main-grid">
    <div class="col-1 col-md-6 col-sm-6 col-xs-6 logo-container vertical-align"><a class="logo" href="/"> <img
          src="<?php echo get_bloginfo('template_url');?>/images/logo.jpg" alt=""></a></div>
    <div class="col-5 col-xxl-4 col-md-5 col-sm-6 hidden-md hidden-sm hidden-xs vertical-align">
      <nav class="nav-header">
        <?php header_menu(); ?>
      </nav>
    </div>
    <div class="col-6 col-xxl-7 col-md-6 col-sm-6 col-xs-6 vertical-align feedback-header">
      <div class="hidden-sm hidden-xs">
        <a class="btn phone-btn" href="tel:<?php echo $GLOBALS['crbAll']['phones'][0]['link']; ?>">
          <i></i><span>
            <?php echo $GLOBALS['crbAll']['phones'][0]['title']; ?>
          </span>
        </a>
      </div>
      <div class="hidden-xs">
        <a class="btn-header btn btn--blue element-btn hidden-md hidden-sm" data-element="1" href="#">Перезвонить
          мне</a>
      </div>

      <?php get_template_part('template-parts/module/social'); ?>
      <div class="wishlist-btn-counter"><span>4</span></div>
      <div class="hamburger-btn element-btn hidden-xxl hidden-xl hidden-lg" data-element="0" href="#"></div>
    </div>
  </div>
</header>
<!-- header end-->