<?php get_header();?>

 

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12"> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="title-sin"><h1><?php the_title(); ?></h1></div>
<div class="body-sin">


<div class="entry-mzayat">	<?php the_content(); ?></div>	

</div>
<div class="clear"></div>
<?php endwhile; endif; ?>
<div class="clear"></div>

 
 
 </div>
    
    <?php get_sidebar(); ?>

    
 </div>
 </div>


<?php get_footer(); ?>