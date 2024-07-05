<?php
  $type = $args['type'];
  $value_search = $args['value_search'];
  
?>

<div class="search-container">
  <div class="search">
    <input class="search-input <?php if($type == 'ajax') {?> search-input-ajax<?php }  ?>" type="text"
      placeholder="Поиск" name="s" value="<?php echo $value_search; ?>"><a class="search-loop" href="#"></a><i
      class="close-btn"></i>
    <?php 
    if($type == 'ajax'){?>
    <div class="search-list"></div>
    <div class="spinner">
      <span class="spinner-inner-1"></span>
      <span class="spinner-inner-2"></span>
      <span class="spinner-inner-3"></span>
    </div>
    <?php }?>
  </div>
</div>