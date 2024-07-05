<!-- popup-menu start 1-->
<div class="popup element-show menu-hamburger" data-element="0">
  <div class="popup-overlay popup-overlay-js"></div>
  <div class="popup-container">
    <div class="close-btn close-btn--popup close-js"></div>
    <div class="menu-mobile">
      <nav class="popup-nav">
        <?php modal_menu(); ?>
      </nav>
      <form action="/search">
        <?php get_template_part('template-parts/module/search'); ?>
      </form>

      <div class="menu-footer">
        <div class="menu-footer-item menu-footer-item--phone">
          <a class="phone-btn" href="tel:<?php echo $GLOBALS['crbAll']['phones'][0]['link']; ?>">
            <i></i><span>
              <? echo $GLOBALS['crbAll']['phones'][0]['title']; ?>
            </span>
          </a>
        </div>
        <div class="menu-footer-item menu-footer-item--feedback"><a class="btn-header btn btn--blue element-btn"
            data-element="1" href="#">Перезвонить мне</a></div>
        <div class="menu-footer-item social-default">
          <? get_template_part('template-parts/module/social'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- popup-menu end 2-->