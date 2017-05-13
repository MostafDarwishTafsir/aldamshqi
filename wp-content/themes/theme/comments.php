		<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'هذه التدوينة محميه بكلمة مرور يرجى تسجيل الدخول وكتابة كلمة المرور للمشاهدة', 'tie' ); ?></p>
			</div><!-- #comments -->
<?php
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title">
			<?php comments_number(__('لا يوجد تعليقات','tie'), __('تعليق واحد','tie'), '% '.__('تعليقات','tie') );?>
			</h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
 
<?php endif; ?>
			<?php $comments_by_type = &separate_comments($comments); ?>
			<?php if ( !empty($comments_by_type['comment']) ) : ?>
				<ol class="commentlist"><?php wp_list_comments('type=comment&callback=custom_comments'); ?></ol>
			<?php endif; ?>    
			<?php $comment_counter = 0 ; ?>
			<?php if ( !empty($comments_by_type['pings']) ) : ?>
			<div id="pings" class="commentlist">
				<ol class="pinglist"><?php wp_list_comments('type=pings&trackback&pingback&callback=custom_pings'); ?></ol>
			</div>
			<?php endif; ?>	
<?php else : 
	if ( ! comments_open() ) :
	
	endif; ?>
<?php endif; ?>


<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
	'author' => '<p class="comment-form-author ">' . '<label for="author">' . __( 'الاسم', 'tie' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	            '<input id="author" class="required" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email "><label for="email">' . __( 'البريد الالكتروني', 'tie' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	            '<input id="email" name="email" class="required email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url"><label for="url">' . __( 'الموقع المفضل', 'tie' ) . '</label>' .
	            '<input id="url" name="url" class="required" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
);

$required_text = __(' حقل مطلوب', 'tie').' <span class="required">*</span>';
?>
<?php comment_form( array(
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'يجب عليك<a href="%s">تسجيل الدخول</a> لكتابة التعليق' , 'tie' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'مسجل دخول بأسم <a href="%1$s">%2$s</a>. <a href="%3$s">تسجيل خروج ؟</a>'  , 'tie' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'comment_notes_before' => '<p class="comment-notes">' . __( 'البريد الالكتروني الخاص بك لن يتم نشرة .'  , 'tie' ) . ( $req ? $required_text : '' ) . '</p>',
	'title_reply' => __( 'إترك تعليق'  , 'tie' ),
	'title_reply_to' => __( 'إترك تعليق إلى %s'  , 'tie' ),
	'cancel_reply_link' => __( 'Cancel reply'  , 'tie' ),
	'label_submit' => __( 'إرسال التعليق'  , 'tie' )
)); ?>

</div><!-- #comments -->
