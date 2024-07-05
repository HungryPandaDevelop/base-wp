<!-- main start-->
<div class="stub"></div>

<?php
$items = carbon_get_post_meta(get_the_ID(), 'crb_slides');
$count = 0;
$total = count($items) - 1;
?>
<div class="main-home">
  <div class="main-slider">
    <!-- <div> -->
    <?php  foreach($items  as $item){?>
    <div class="main-slider-item <?php if($count == 0){?>first<?}?> <?php if($count == $total){?>last<?}?>">
      <div class="main-home-content main-full">
        <div class="main-home-info">
          <h2><?php echo $item['text_1'];?></h2>
          <h1><?php echo $item['text_2'];?></h1>
        </div>
        <div class="btn-container">
          <a href="<?php echo $item['link'];?>" class="btn btn--orange">Получить консультацию</a>
        </div>
        <div class="scroll-home-container">
          <div class="mouse-down-btn mouse-down-btn-js">
            <div class="dot"></div>
          </div>
        </div>
      </div>
      <div class="img-cover"><img src="<?php echo $item['img'];?>" alt=""></div>
    </div>
    <?php $count++; ?>
    <?php } ?>
  </div>
</div>
<!-- main end-->