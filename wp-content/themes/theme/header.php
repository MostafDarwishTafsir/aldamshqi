<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php wp_head(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php
if (is_home()) {
echo bloginfo('name');
} elseif (is_404()) {
echo 'الصفحة المطلوبة غير موجودة';
} elseif (is_category()) {
echo ''; wp_title('');
} elseif (is_search()) {
echo 'نتائج البحث';
} elseif ( is_day() || is_month() || is_year() ) {
echo ''; wp_title('');
} else {
echo wp_title('');
}?>
</title>

<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-rtl.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/mobile.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css" rel="stylesheet">
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css" rel="stylesheet">
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/head.js"></script>
    
    
 

</head>
<body> 
    
    


<div class="bg1">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-6">
    <a href="index.php" class="logo"></a>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
    <div class="imghed"></div>
</div>

</div><!-- /row -->
</div><!-- /container -->
</div><!-- /container -->

<div class="clear"></div>

<div class="bg2">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-9">
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">القائمة</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <?php
            wp_nav_menu( array(
                'menu'              => 'primary1',
                'theme_location'    => 'primary1',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
</nav>    
    
</div>
    
    

<div class="col-xs-12 col-sm-12 col-md-3">
<div class="social">
    <ul>
    <li><a href="<?php echo of_get_options('youtube'); ?>"><i class="fa fa-youtube"></i></a></li>    
    <li><a href="<?php echo of_get_options('google'); ?>"><i class="fa fa-google-plus"></i></a></li>    
    <li><a href="<?php echo of_get_options('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>    
    <li><a href="<?php echo of_get_options('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>    
    </ul>
    </div>  
</div>
    
    


</div><!-- /row -->
</div><!-- /container -->
</div><!-- /container -->
    
     