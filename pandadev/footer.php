<!-- footer start -->


<footer>
  <div class="main-grid">
    <div class="col-3 col-sm-6 col-xs-12 logo-container"><a class="logo" href="/"><img
          src="<?php echo get_bloginfo('template_url');?>/images/logo.svg" alt=""></a>
      <div class="logo-text">
        <?php echo $GLOBALS['crbAll']['copyright']; ?>
      </div>
      <form action="/search">
        <?php get_template_part('template-parts/module/search', null, [
          'type'  =>  false,
          'value_search'  =>  false
      ]); ?>
      </form>

    </div>
    <div class="col-3 hidden-sm hidden-xs">
      <div class="nav">
        <!-- <h3> <a href="#"> Title</a></h3>
        <ul>
          <li> <a href="#"> Link 1</a></li>
          <li> <a href="#"> Link 2</a></li>
          <li> <a href="#"> Link 3</a></li>
        </ul> -->
      </div>
    </div>
    <div class="col-3 hidden-sm hidden-xs">
      <div class="nav nav-second">
        <?php footer_menu(); ?>
      </div>
    </div>
    <div class="col-3 col-sm-6 col-xs-12 feedback">
      <?php get_template_part('template-parts/footer/feedback'); ?>

    </div>
    <div class="col-12">
      <ul class="footer-links">
        <li><a href="/karta-sajta">Карта сайта</a></li>
        <li><a href="/politika-konfidencialnosti">Политика конфиденциальности</a></li>
        <li>© <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?></li>
      </ul>
    </div>
  </div>
</footer>
<? wp_footer(); ?>

<!-- footer end-->
</body>

</html>