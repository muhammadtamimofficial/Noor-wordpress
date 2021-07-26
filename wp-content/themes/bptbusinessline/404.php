<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BusinessLine
 */

get_header();
?>

<!-- Start 404 Page Area -->
<section class="pad-t60 pad-b80" style="background: url(assets/images/patterns/pattern.png) repeat;">
    <div class="error-page">
        <h1><?php echo esc_html__( '404', 'bptbusinessline' ); ?></h1>
        <h3><?php echo esc_html__( 'Page Not Found.', 'bptbusinessline' ); ?></h3>

        <p><?php echo esc_html__( 'Please try one of the following Pages', 'bptbusinessline' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html__('Home Page', 'bptbusinessline');?></a>
        <div class="clearfix"></div>
        <div class="widget widget_search"><?php get_search_form();?></div>
        
    </div>
</section>
<!-- End 404 Page Area -->

<?php
get_footer();
