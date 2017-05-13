<?php 

 
 

 
/*-----------------------------------------------------------------------------------*/
/*  slider */
/*-----------------------------------------------------------------------------------*/
function slider () {
	register_post_type( 'slider',
                array( 
				 'labels' => array (
					  'name' => __( 'سليدر    ' ),

					),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 5 ,
				'hierarchical' => false,
				'has_archive' => true,
				'capability_type' => 'page',
				'supports' => array(
						'thumbnail'
						)
					) 
				);

}
add_action('init', 'slider');



 

 
/*-----------------------------------------------------------------------------------*/
/*  videos */
/*-----------------------------------------------------------------------------------*/
function videos () {
	register_post_type( 'videos',
                array( 
				 'labels' => array (
					  'name' => __( ' الفديوهات  ' ),

					),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 5 ,
				'hierarchical' => false,
				'has_archive' => true,
				'capability_type' => 'page',
				'supports' => array(
						'title',

						'thumbnail', 'editor'

						)
					) 
				);

}
add_action('init', 'videos');
 

 
/*-----------------------------------------------------------------------------------*/
/*  gallery */
/*-----------------------------------------------------------------------------------*/
function gallery () {
	register_post_type( 'gallery',
                array( 
				 'labels' => array (
					  'name' => __( ' الصور  ' ),

					),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 5 ,
				'hierarchical' => false,
				'has_archive' => true,
				'capability_type' => 'page',
				'supports' => array(
						'title',

						'thumbnail', 'editor'

						)
					) 
				);

}
add_action('init', 'gallery');

 
/*-----------------------------------------------------------------------------------*/
/*  liss */
/*-----------------------------------------------------------------------------------*/
function liss () {
	register_post_type( 'liss',
                array( 
				 'labels' => array (
					  'name' => __( ' الدروس  ' ),

					),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 5 ,
				'hierarchical' => false,
				'has_archive' => true,
				'capability_type' => 'page',
				'supports' => array(
						'title',

						'thumbnail', 'editor'

						)
					) 
				);

}
add_action('init', 'liss');
 








  
/* Define the custom box */
add_action( 'add_meta_boxes', 'post_info' );
/* Do something with the data entered */
add_action( 'save_post', 'post_info_save' );
/* Adds a box to the main column on the Post and Page edit screens */
function post_info() {
add_meta_box( 
'post_info_box',
__( 'معلومات إضافيه', 'artist' ),
'post_info_fields',
'videos' 
);
}



/* Prints the box content */
function post_info_fields( $post ) {
global $post;
// Use nonce for verification
wp_nonce_field( plugin_basename( __FILE__ ), 'post_info_box_inp' );
    
    $slide_url = get_post_meta($post->ID, 'slide_url', true);
    // The actual fields for data entry
    echo '<label for="slide_url" class="pos-fo">ID فديو اليوتيوب</label> ';
    echo '<input type="text" id="slide_url" name="slide_url" value="'.$slide_url.'" class="pos-fo2" />';
    

}
/* When the post is saved, saves our custom data */
function post_info_save( $post_id ) {
// verify if this is an auto save routine. 
// If it is our form has not been submitted, so we dont want to do anything
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
return;
// verify this came from the our screen and with proper authorization,
// because save_post can be triggered at other times
if (!isset($_POST['post_info_box_inp'])){
$_POST['post_info_box_inp'] = true; 
}
if ( !wp_verify_nonce( $_POST['post_info_box_inp'], plugin_basename( __FILE__ ) ) )
return;

// Check permissions
if (!isset($_POST['post_type'])){
$_POST['post_type'] = true;
}
if ( 'page' == $_POST['post_type'] ) 
{
if ( !current_user_can( 'edit_page', $post_id ) )
return;
}
else
{
if ( !current_user_can( 'edit_post', $post_id ) )
return;
}
// OK, we're authenticated: we need to find and save the data

    if (!update_post_meta($post_id, 'slide_url', $_POST['slide_url'])){
    add_post_meta($post_id, 'slide_url', $_POST['slide_url']);
    }
    
// Do something with $mydata 
// probably using add_post_meta(), update_post_meta(), or 
// a custom table (see Further Reading section below)
}








// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' مشاهدة';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('مشاهدة');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
 
/*-----------------------------------------------------------------------------------*/
# Filter Admin Bar
/*-----------------------------------------------------------------------------------*/
add_filter('show_admin_bar', '__return_false');
function remove_admin_bar_links() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
	$wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

/*-----------------------------------------------------------------------------------*/
# Redirect Admin Login
/*-----------------------------------------------------------------------------------*/

function new_dashboard_home($username, $user){
    if(array_key_exists('administrator', $user->caps)){
        wp_redirect(admin_url('themes.php?page=optionsframework', 'http'), 301);
        exit;
    }
}
add_action('wp_login', 'new_dashboard_home', 10, 2);




/*-----------------------------------------------------------------------------------*/
# Theme Options
/*-----------------------------------------------------------------------------------*/
require_once ('admin/index.php');
require_once ('admin/wp_bootstrap_navwalker.php');
 

/*-----------------------------------------------------------------------------------*/
# Menu
/*-----------------------------------------------------------------------------------*/
register_nav_menus( array(
    'primary1' => __( 'قائمة الهيدر', 'THEMENAME' ),
    'primary2' => __( 'القائمة الجانبية ', 'THEMENAME' ),

) );
/*-----------------------------------------------------------------------------------*/
# This theme uses post thumbnails
/*-----------------------------------------------------------------------------------*/ 
add_theme_support( 'post-thumbnails' );
/*-----------------------------------------------------------------------------------*/
# Add default posts and comments RSS feed links to head
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );
/*-----------------------------------------------------------------------------------*/
# post thumbnail support and multiple sizes
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'k-thumb', 150, 150 );
	add_image_size( 'home-thumb', 203, 203, true );
}
         
  

/*-----------------------------------------------------------------------------------*/
# Page Navigation
/*-----------------------------------------------------------------------------------*/
function tie_pagenavi(){
	?>
	<div class="pagination1">
		<?php tie_get_pagenavi() ?>
	</div>
	<?php
}

### Function: Page Navigation: Boxed Style Paging
function tie_get_pagenavi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$pagenavi_options = tie_pagenavi_init(); 
	
	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (tie_n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = tie_n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = tie_n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = tie_n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			//echo $before.'<div class="pagenavi">'."\n";

					if(!empty($pages_text)) {
						echo '<span class="pages">'.$pages_text.'</span>';
					}
					if ($start_page >= 2 && $pages_to_show < $max_page) {
						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">'.$first_page_text.'</a>';
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
						}
					}
					if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
						for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
						}
					}
					previous_posts_link($pagenavi_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<span class="current">'.$current_page_text.'</span>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
						}
					}
					next_posts_link($pagenavi_options['next_text'], $max_page);
					if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
						for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
						}
					}
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$last_page_text.'</a>';
					}

			//echo '</div>'.$after."\n";
		}
	}
}


### Function: Round To The Nearest Value
function tie_n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}


### Function: Page Navigation Options
function tie_pagenavi_init() {
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = __('صفحة %CURRENT_PAGE% من %TOTAL_PAGES%','tie');
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('&laquo; الاولى','tie');
	$pagenavi_options['last_text'] = __('الاخيرة &raquo;','tie');
	$pagenavi_options['next_text'] = __('&raquo;','tie');
	$pagenavi_options['prev_text'] = __('&laquo;','tie');
	$pagenavi_options['dotright_text'] = __('...','tie');
	$pagenavi_options['dotleft_text'] = __('...','tie');
	
	
	$pagenavi_options['num_pages'] = 5;
	
	$pagenavi_options['always_show'] = 0;
	$pagenavi_options['num_larger_page_numbers'] = 1;
	$pagenavi_options['larger_page_numbers_multiple'] = 10;
	
	return $pagenavi_options;
}




/*-----------------------------------------------------------------------------------*/
# Comments Template Start
/*-----------------------------------------------------------------------------------*/


function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment ;
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div  <?php comment_class('comment-wrap'); ?> >
			<div class="comment-avatar"><?php echo get_avatar( $comment, 45 ); ?></div>
			<div class="author-comment">
				<?php printf( __( '%s ', 'tie' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">	<?php printf( __( '%1$s at %2$s', 'tie' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'tie' ), ' ' ); ?></div><!-- .comment-meta .commentmetadata -->
			</div>
			<div class="clear"></div>
			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tie' ); ?></em>
					<br />
				<?php endif; ?>
					
				<?php comment_text(); ?>
			</div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
}

function custom_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
	<li class="comment pingback">
		<p><?php _e( 'Pingback:', 'tie' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'tie' ), ' ' ); ?></p>
<?php	
}


/*-----------------------------------------------------------------------------------*/
# Comments Template End
/*-----------------------------------------------------------------------------------*/




 
if(function_exists('register_sidebar'))
	register_sidebar(array(
        'name' => 'القائمة البيدية',
        'id'            => 'list',
        'before_widget' => '<div class="maillisssst">',
        'after_widget' => '</div>',
        'before_title' => '<small>',
        'after_title' => '</small>'
    )); 
	