<?php get_header();?> 



<div class="container">
<div class="row">   


    
    
<div class="col-xs-12 col-sm-12 col-md-3">

 <div class="side-menu">
<p>القائمة الرئيسية</p>
    
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary2',
                'theme_location'    => 'primary2',
                'depth'             => 2,
                'container'         => 'div',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    

</div>
   

</div>




<div class="col-xs-12 col-sm-12 col-md-9">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

      <?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 1 , 'post_type' => slider  ) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post);  ?>   
    <div class="item active">
      <img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" alt="">
    </div>
 <?php endforeach; ?>
<?php $post = $tmp_post; ?>
      
      
      
      <?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 9 , 'post_type' => slider ,'offset'=> 1 ) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post);  ?>   
    <div class="item">
      <img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" alt="">
    </div>
 <?php endforeach; ?>
<?php $post = $tmp_post; ?>
      
  </div>

<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
</div>
    
<a href="<?php echo of_get_options('banner1-link'); ?>"><img class="banner1" src="<?php echo of_get_options('banner1-img'); ?>"></a>
    
</div>

<div class="clear"></div>

    
    


<div class="col-xs-12 col-sm-12 col-md-6">
<div class="titleblockx1"><span>المرئيات</span></div>
<?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 1 , 'post_type' => videos  ) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post);  ?> 
<iframe class="yout" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'slide_url', true); ?>" frameborder="0" allowfullscreen=""></iframe>
 <?php endforeach; ?>
<?php $post = $tmp_post; ?>
      
</div>



<div class="col-xs-12 col-sm-12 col-md-6">
<div class="titleblockx1"><span>المقالات</span></div>
<div class="row">
    
<?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 6  ) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post);  ?> 
<div class="col-xs-12 col-sm-12 col-md-6">
<div class="onepost">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8"><a href="<?php the_permalink(); ?>"><?php the_excerpt(20); ?></a></div>
        
    </div>
</div>
</div>
<?php endforeach; ?>
<?php $post = $tmp_post; ?>


</div>
</div>
     
<div class="col-xs-12 col-sm-12 col-md-12"><div class="titleblockx1"><span>الدروس</span></div></div>
    
<?php
global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 6 , 'post_type' => liss  ) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post);  ?>     
<div class="col-sm-4 col-xs-6 col-md-2">
    <div class="gallerydiv">
    <a href="<?php the_permalink(); ?>" class="thumbnail">
        <img class="img-responsive" alt="" src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>">
        <small class="text-muted"> <?php the_title(); ?></small> </a>
    </div>
</div>      
<?php endforeach; ?>
<?php $post = $tmp_post; ?>               
        
</div><!-- /row -->
</div><!-- /container -->



 
    
    
<?php get_footer(); ?>
