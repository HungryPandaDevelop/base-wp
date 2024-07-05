<div class="social-default">
  <div class="social">
    <?php

		$arr_social = [
			'facebook',
			'instagram',
			'twitter',
			'whatsapp',
			'vk',
			'telegram',
			'youtube',
			'google',
			
		];

		foreach($arr_social as $item_social){
			if($GLOBALS['crbAll'][$item_social]){?>
    <a class="social-ico" href="<? echo $GLOBALS['crbAll'][$item_social]; ?>">
      <img src="<? echo get_theme_file_uri('/images/social/'.$item_social.'-black.svg'); ?>" alt="" />
      <img class="ico-hover" src="<? echo get_theme_file_uri('/images/social/'.$item_social.'-white.svg'); ?>" alt="" />
    </a>
    <?}
					}?>
  </div>
</div>