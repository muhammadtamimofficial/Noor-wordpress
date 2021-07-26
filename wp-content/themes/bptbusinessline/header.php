<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BusinessLine
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<?php if(get_theme_mod('bptloading')==1){?>
<!-- Start Page Preloader -->
<div id="loading">
<div id="loading-center">
	<div id="loading-center-absolute">
		<div class="object" id="object_four"></div>
		<div class="object" id="object_three"></div>
		<div class="object" id="object_two"></div>
		<div class="object" id="object_one"></div>
	</div>
</div>
</div>
<!-- End Page Preloader -->
<?php }?>

<div id="container">
<!-- Start Top Bar Area -->
<div class="top-header hidden-sm hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<div class="social-top">
					<ul class="top-social">
						<?php if(get_theme_mod('fb_link')!=''){?>
						<li><a href="<?php echo esc_url(get_theme_mod('fb_link'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_theme_mod( 'tw_link')!=''){?>
						<li><a href="<?php echo esc_url(get_theme_mod('tw_link'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_theme_mod( 'google_plus')!=''){?>
						<li><a href="<?php echo esc_url(get_theme_mod('google_plus', 'default'));?>"><i class="fa fa-google-plus"></i></a></li>
						<?php }?>
						<?php if(get_theme_mod( 'linkedin')!=''){?>
						<li><a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9">
				<div class="pull-right">
					<?php if(get_theme_mod('bpt_phone')!=''){?>
					<div class="top-phone mr10"><i class="fa fa-phone"></i> <?php echo esc_html(get_theme_mod('bpt_phone')); ?></div>
					<?php }?>
					<?php if(get_theme_mod('bpt_email')!=''){?>
					<div class="top-phone mr10"><i class="fa fa-envelope-o"></i> </i> <?php echo esc_html(get_theme_mod('bpt_email')); ?></div>
					<?php }?>
					<?php if(get_theme_mod('bpt_skype')!=''){?>
					<div class="top-address"><i class="fa fa-skype"></i> <?php echo esc_html(get_theme_mod( 'bpt_skype')); ?></div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Top Bar Area -->
<!-- Start Header Area -->
<header class="clearfix" id="header">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="" href="index-2.html">
					<img src="assets/switcher/logos/logo_red.png" alt="Logo" id="logo" >
				</a> -->
				 
				<?php
		            if (has_custom_logo()) {
		                 the_custom_logo();
		            } else { ?>
		            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
	                    <h1 class='site-title'><?php bloginfo( 'name' ) ?></h1>
	                    <?php
	                    $description = get_bloginfo( 'description' );
	                    if ( $description ) {
	                        echo  '<p class="site-description">' . esc_html( $description ) . '</p>' ;
	                    }
	                    echo '</a>';
		            }
		        ?>
			</div>
			<div class="navbar-collapse collapse">
				<?php
                    wp_nav_menu( array(
                        'theme_location'    => 'menu-1',
                        'depth'             => 3,
                        'container'         => '',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker())
                    );
                ?>
			</div>
		</div>
	</nav>
</header>
<!-- End Header Area -->


<?php if (is_front_page() && !is_home()){
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		echo '<section class="main-slide">';
		dynamic_sidebar( 'sidebar-3' );
		echo '</section><div class="clearfix"></div>';
	}
}else{
?>
<!-- Start Breadcrumb Area -->
<?php if ( get_header_image() ){ ?>
<section class="breadcrumb-section parallax" style="background-image: url(<?php bptbusinessline_header_image(); ?>);background-size: cover;">
<?php }else{ ?>
<section class="breadcrumb-section breadcrumb-bg">
<?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="page-title">
                	<?php if (is_home() ){?>
                    		<h1><?php single_post_title(); ?></h1>
                    <?php }elseif(is_search()){?>
                   		<h1 class="page-title"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'bptbusinessline' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
					<?php }elseif(is_archive()){
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
                	}elseif(is_page()){
						echo '<h1 class="page-title">'.esc_html(get_query_var('pagename')).'</h1>';
                    }else{?>
                    		<h1><?php //the_title(); ?></h1>
                    <?php }?>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="breadcrumb">
                	<?php if (function_exists('bpt_breadcrumb')){bpt_breadcrumb();} ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->
<?php }?>

<?php if (get_page_template_slug()!='full-width.php') {?>
<section class="pad-t60 pad-b30">
<div class="container">
<div class="row">
<?php }?>