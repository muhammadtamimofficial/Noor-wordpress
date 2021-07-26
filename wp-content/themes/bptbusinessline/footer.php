<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BusinessLine
*/

?>
<?php if (get_page_template_slug()!='full-width.php') {?>
</div>
</div>
</section>
<?php }?>

<!-- Start Footer Area -->
<?php if ( is_active_sidebar( 'sidebar-2' ) ) {?>
<footer class="footer-section pad-t80 pad-b30">
    <div class="container">
        <div class="row">
            <?php dynamic_sidebar( 'sidebar-2' );?>
        </div>
<?php }else{?>
<footer class="footer-section">
    <div class="container">
<?php }?>
        <!-- Start Footer Copyright Area -->
        <div class="row">
            <div class="copyright">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bptbusinessline' ) ); ?>"><?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly powered by %s', 'bptbusinessline' ), 'WordPress' );
                        ?></a>
                        <span class="sep"> | </span>
                        <?php printf(  /* translators: %s: bptbusinessline */ esc_html__('Theme: %1$s by %2$s.', 'bptbusinessline'), 'BusinessLine', '<a href="'.esc_url( __('http://www.buyprotheme.com', 'bptbusinessline')).'" target="_blank">'.esc_html__('BuyProTheme', 'bptbusinessline').'</a>' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Copyright Area -->
    </div>
</footer>
<!-- End Footer Area -->
<!-- Start Back To Top Area -->
<div id="back-to-top" class="back-to-top">
    <i class="fa fa-angle-up fa-2x"></i>
</div>
<!-- End Back To Top Area -->
</div>

<?php wp_footer(); ?>

</body>
</html>
