<?php  
/*
	Template Name: Gallery
*/
?>
<?php get_header();?>
 <div class="container">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">


    <ul class="slidmm vid920">
<div class="row">
    
    

       
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>     
    
<div class="col-xs-12 col-sm-12 col-md-3">  
<li>
    
<img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>">  
<a class="fancybox" rel="ligthbox" href="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>">
<img src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" /></a>  

</li>
</div>
   
  
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
    
</div>
</ul>
    
    
    
 



<div class="clear"></div>
<?php if ($wp_query->max_num_pages > 1) tie_pagenavi(); ?>

<div class="clear"></div>
 
</div>
</div>
</div>

<?php get_footer(); ?>