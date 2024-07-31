
<div class="fb-comentarios" id="comentarios">
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="2" data-colorscheme="light"></div>
</div>

 <div class="comentarios">
<?php
if ('open' == $post->comment_status) :
?>
  <div id="respond" class="responder">
 
    <div id="responder-topo"></div>
    <div class="cancel-comment-reply"><?php cancel_comment_reply_link('Cancelar a Resposta para o Comentário.'); ?></div>
  <?php if (get_option('comment_registration') && !$user_ID ) : ?>
<?php else : ?>

  <?php if ($user_ID) { ?>

<?php } ?>

  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform"> 
  <?php if (!$user_ID) { ?>

<div class="campos">
    <div class="input"><input type="text" tabindex="1" value="<?php echo $comment_author; ?>" placeholder="Nome" id="author" name="author"></div>
   <div class="input email"><input type="text" tabindex="2" value="<?php echo $comment_author_email; ?>" placeholder="Email" id="email" name="email"></div>
    <div class="input"><input type="text" tabindex="3" value="<?php echo $comment_author_url; ?>" placeholder="Website" id="url" name="url"></div>
 
 <div class="clear"></div>
</div>

<?php } ?>

  <div class="textarea"><textarea name="comment" id="comment" placeholder="Seu comentário :)" cols="30" rows="5" tabindex="4"></textarea></div>

<div class="clear"></div>

  <input type="submit" name="submit" id="submit" class="submit" value="Enviar Comentário" tabindex="5" />

<div class="clear"></div>
  <?php comment_id_fields(); ?>
  <?php do_action('comment_form', $post->ID); ?>

  </form>
 
<?php endif; ?>
<?php endif; ?>
</div>

<?php if (have_comments()) : ?>
  <ol>
<?php
    wp_list_comments(array('callback'=>'comentario', 'reply_text'=>'Responder'));
?>
  </ol>

<?php endif; ?>


<div class="clear"></div>
</div>