<?php get_header();?>

<?php setPostViews(get_the_ID()); ?>
 
<div class="container">
<div class="row">


<div class="col-xs-12 col-sm-12 col-md-12"> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="clear"></div>

<div class="title-sin"><h1><?php the_title(); ?></h1></div>
<div class="body-sin">
 		

    <?php
    $youtube = get_post_meta($post->ID, 'slide_url', true);
    $postimg =wp_get_attachment_url( get_post_thumbnail_id($post->ID) );  
?>
    
    

<?php if ($youtube){ ?>
<iframe class="youtubedivins" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'slide_url', true); ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen=""></iframe>
<?php } elseif ($postimg) { ?>
<a href="<?php the_permalink(); ?>"><img class="dimginsling" src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" alt=""/></a>
<?php } ?>  
    
 
    
    
    
<div class="clear"></div>

<h1 class="post-title"><?php the_title(); ?></h1>			
<div class="clear"></div>
			
<p class="post-meta">
	<span class="post-admin"> نشرت بواسطة:<?php the_author_posts_link(); ?></span>
	<span class="post-cate">في <?php the_category(', ') ?></span>
	<span class="post-date"><?php the_time('Y/m/j'); ?></span>	
	<span class="post-comments"><a href="#"><?php comments_popup_link( __( 'اترك تعليق'), __( '1 تعليق'), __( '% تعليق') ); ?></a></span>
	<span class="post-vist"><a href="#"><?php echo getPostViews(get_the_ID()); ?></a></span>
</p>			
	
<div class="entry-mzayat">	<?php the_content(); ?></div>			

<div class="post-navigation">
	<div class="post-previous"><?php previous_post_link( '%link', '<span>'. __( 'التدوينة السابقة', 'tie' ).'</span> %title' ); ?></div>
	<div class="post-next"><?php next_post_link( '%link', '<span>'. __( 'التدوينة التالية', 'tie' ).'</span> %title' ); ?></div>
</div><!-- .post-navigation -->


<section id="related_posts">
<div class="post-title"><h3>مقالات مشابهة</h3><div class="stripe-line"></div></div>
<div class="post-listing">
 
 

<?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' =>7  ) ;
$myposts = get_posts( $args );
$i = 0;
$ii = 0;
foreach( $myposts as $post ) : setup_postdata($post); $i++; $ii++;
if ($i == 1){ ?>
<?php } ?>
<div class="related-item">
<div class="post-thumbnail">
<a href="<?php the_permalink(); ?>"><img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" alt="<?php the_title(); ?>"></a>
</div>
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</div>
<?php if ($i == 5 OR count($myposts) == $ii){ $i = 0; ?>
<?php } ?>
<?php endforeach; ?>
<?php $post = $tmp_post; ?>







  
<div class="clear"></div>
</div>
</section>



	
<div class="clear"></div>
<?php endwhile; endif; ?>
 
 


<?php comments_template(); ?>


</div></div>

 
<?php get_sidebar(); ?>
</div></div>
<?php get_footer(); ?>