<section id="comments" class="comments-section">
  <div class="main-full head-section">
    <h2>Комментарии</h2>
  </div>
  <div class="main-grid">
    <? if ( have_comments() ) { ?>


    <div class="col-6 col-xs-12">
      <h3>Спискок комментариев</h3>
      <?php wp_list_comments( [
          'type' => 'comment', //Don't output pingbacks & trackbacks
          'callback' => 'rjs_comments_walker',
          'reverse_top_level' => true,
          // 'per_page' => 3
        ]); 

?>

      <div class="comments-navigation">
        <?php if(get_previous_comments_link()){?>
        <div class="prev-btn">
          <i></i>
          <span><?php previous_comments_link('Предыдущие комментарии'); ?></span>
        </div>
        <?}; ?>
        <?php if(get_next_comments_link()){?>
        <div class="next-btn">
          <span><?php next_comments_link('Следущие комментарии'); ?></span><i></i>
        </div>
        <?}; ?>
      </div>
    </div><!-- .comment-list -->


    <? } // Check for have_comments(). ?>


    <div class="col-6 col-xs-12">

      <?php
      $comments_args = array(
        // изменим название кнопки
        'label_submit' => 'Отправить',
        // заголовок секции ответа
        'title_reply'=>'',
        // удалим текст, который будет показано после того как коммент отправлен
        'comment_notes_after' => '',
        'logged_in_as'  => '',
        // переопределим textarea (тело формы)
        'fields'               => [
          'author' => '<div class="input-box"><input id="author" class="input-decorate" placeholder="Имя*" name="author" type="text" size="30" /></div>',
          'email' => '<div class="input-box"><input id="email" class="input-decorate" placeholder="Email*" name="email" type="email" size="30" /></div>'
        ],
        'comment_field' => '<div class="input-box"><textarea placeholder="Ваш отзыв" id="comment" name="comment" class="input-decorate"></textarea></div>',
        'class_submit'         => 'submit btn btn--blue',
        
    );
    
    comment_form( $comments_args );
      
      ?>
    </div>
  </div>

</section><!-- .comments-area -->