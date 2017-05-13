<?php get_header();?>
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">


    
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div class="col-xs-12 col-sm-12 col-md-6">
<div class="title-sin"><a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a></div>
<div class="clear"></div>
<div class="body-sin">
<img class="catimgpo" src="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" alt=""/>
<div class="pecat"><?php the_excerpt(20); ?></div>
</div>
</div>


<?php endwhile; ?>
<?php else : ?>
<p class="nothe">لا يوجد مواضيع متوفرة للعرض</p>
<?php endif; ?>
 
 
<div class="clear"></div>
<?php if ($wp_query->max_num_pages > 1) tie_pagenavi(); ?>
<div class="clear"></div>
    
    
    </div>

    </div>
    </div>
    
<?php get_footer(); ?>