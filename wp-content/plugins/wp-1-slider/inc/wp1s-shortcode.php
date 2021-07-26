<?php 
defined('ABSPATH') or die("No script kiddies please!"); 
    global $post;
    $post_id = $id;
    $wp1s_option = get_post_meta($post_id,'wp1s_option',true);
    $wp1s_auto = get_post_meta( $post_id, 'wp1s_slide_option_auto', true );
    $wp1s_speed = get_post_meta( $post_id, 'wp1s_slide_option_speed', true );
    $wp1s_pause = get_post_meta( $post_id, 'wp1s_slide_option_pause', true );
    $wp1s_transition = get_post_meta( $post_id, 'wp1s_slide_option_transition', true );
    $wp1s_controls = get_post_meta( $post_id, 'wp1s_slide_option_controls', true );
    $wp1s_responsive = get_post_meta( $post_id, 'wp1s_slide_option_responsive', true );
    $wp1s_thumb_count = get_post_meta( $post_id, 'wp1s_pager_thumb_count', true );
    $wp1s_thumb_width = get_post_meta( $post_id, 'wp1s_pager_thumb_width', true );
    $wp1s_pager_type = get_post_meta( $post_id, 'wp1s_pager_type', true );
    $wp1s_slide_width = get_post_meta( $post_id, 'wp1s_slide_option_width', true );
    $wp1s_title_1_font_size = get_post_meta( $post_id, 'wp1s_title_1_font_size', true );
    $wp1s_description_1_font_size = get_post_meta( $post_id, 'wp1s_description_1_font_size', true );
    $wp1s_caption_border_color = get_post_meta( $post_id, 'wp1s_caption_border_color', true );
    $wp1s_title_back_color = get_post_meta( $post_id, 'wp1s_title_back_color', true );
    $wp1s_caption_back_color = get_post_meta( $post_id, 'wp1s_caption_back_color', true );
    $wp1s_caption_position = get_post_meta( $post_id, 'wp1s_caption_position', true );
    $wp1s_title_text_color = get_post_meta( $post_id, 'wp1s_title_text_color', true );
    $wp1s_description_text_color = get_post_meta( $post_id, 'wp1s_description_text_color', true );
    $wp1s_dot_back_color = get_post_meta( $post_id, 'wp1s_dot_back_color', true );
    $wp1s_dot_hover_color = get_post_meta( $post_id, 'wp1s_dot_hover_color', true );
    $wp1s_dot_2_back_color = get_post_meta( $post_id, 'wp1s_dot_2_back_color', true );
    $wp1s_dot_2_border_color = get_post_meta( $post_id, 'wp1s_dot_2_border_color', true );
    $wp1s_dot_2_active_color = get_post_meta( $post_id, 'wp1s_dot_2_active_color', true );
    $wp1s_arrow_type = get_post_meta( $post_id, 'wp1s_arrow_type', true );
    $wp1s_dot_3_border_color = get_post_meta( $post_id, 'wp1s_dot_3_border_color', true );
    $wp1s_dot_3_active_color = get_post_meta( $post_id, 'wp1s_dot_3_active_color', true );
    $wp1s_dot_4_back_color = get_post_meta( $post_id, 'wp1s_dot_4_back_color', true );
    $wp1s_dot_4_active_color = get_post_meta( $post_id, 'wp1s_dot_4_active_color', true );
    $wp1s_thumbnail_layout = get_post_meta( $post_id, 'wp1s_thumbnail_layout', true );
    $wp1s_button_color = get_post_meta( $post_id, 'wp1s_button_color', true );
    $wp1s_button_hover_color = get_post_meta( $post_id, 'wp1s_button_hover_color', true );
    $wp1s_button_shadow_color = get_post_meta( $post_id, 'wp1s_button_shadow_color', true );
    $wp1s_show_shadow = get_post_meta( $post_id, 'wp1s_show_shadow', true );
    $wp1s_pager_thumb_width = get_post_meta( $post_id, 'wp1s_pager_thumb_width', true );
    $wp1s_pager_thumb_height = get_post_meta( $post_id, 'wp1s_pager_thumb_height', true );
    $wp1s_show_caption_widget = get_post_meta( $post_id, 'wp1s_show_caption_widget', true );
    $wp1s_show_thumb_widget= get_post_meta( $post_id, 'wp1s_show_thumb_widget', true );
   
    $wp1s_video_width= get_post_meta( $post_id, 'wp1s_video_width', true );
    $wp1s_video_height= get_post_meta( $post_id, 'wp1s_video_height', true );

    $random_num = rand(10000,99999);
    ?>
<div class="wp1s-slider-wrapper wp1s-slider-wrapper-<?php echo esc_attr($random_num); ?> <?php if($wp1s_pager_type == 'thumbnail') {?> wp1s-pager-padding <?php }?>">  
    <?php if($wp1s_show_shadow =='true') { ?>
    <div class="wp1s-main-wrapper wp1s-shadow wp1s-shadow-<?php echo get_post_meta( $post_id, 'wp1s_shadow_type', true );?>">
   <?php } else { ?>
<div class="wp1s-main-wrapper">
    <?php }?>  

    <div class="wp1s-slider-container wp1s-pager-<?php echo get_post_meta( $post_id, 'wp1s_dot_layout', true );?> wp1s-arrow-<?php echo esc_attr($wp1s_arrow_type);?> wp1s-pagination">
    <ul class="wp1s-bxslider" data-id="<?php echo esc_attr($random_num); ?>" data-auto='<?php if( !empty( $wp1s_auto ) ) {
        echo $wp1s_auto; }?>' data-speed='<?php if(!empty( $wp1s_speed ) ) {
        echo $wp1s_speed; }?>' data-pause='<?php if(!empty( $wp1s_pause ) ) {
        echo $wp1s_pause; }?>' data-transition='<?php if(!empty( $wp1s_transition ) ) {
        echo $wp1s_transition; }?>' data-controls='<?php if(!empty( $wp1s_controls ) ) {
        echo $wp1s_controls; }?>' data-responsive='<?php if(!empty( $wp1s_responsive ) ) {
        echo $wp1s_responsive; }?>' data-pager='<?php if(!empty( $wp1s_pager_type ) ) {
        echo $wp1s_pager_type; }?>' >
    <?php
     if(isset($wp1s_option['slides']['slide_title'])){
        $wp1s_slide_count = count($wp1s_option['slides']['slide_title']);
        if($wp1s_pager_type == 'dot' || $wp1s_pager_type == 'disable' || $wp1s_pager_type == 'pagination' || $wp1s_pager_type == 'thumbnail'){
    
    for($i = 0; $i < $wp1s_slide_count;$i++){
    while ( $wp1s_slider->have_posts() ) : $wp1s_slider->the_post();   
    ?>
        <li>
            <img src="<?php echo sanitize_text_field(esc_attr($wp1s_option['slides']['slide_image_url'][$i])); ?>" />
            <div class="wp1s-caption-wrapper wp1s-caption-<?php echo get_post_meta( $post_id, 'wp1s_caption_type', true );?> wp1s-caption-<?php echo "$wp1s_caption_position"; ?>">
            <h1 class="wp1s-caption-title"><?php echo sanitize_text_field(esc_attr($wp1s_option['slides']['slide_title'][$i])); ?></h1>
            <h2 class="wp1s-caption-content"><?php echo sanitize_text_field(esc_attr($wp1s_option['slides']['slide_description'][$i]));  ?></h2>
            <?php if($wp1s_option['slides']['slide_show_button'][$i] == '1')
            { ?>
            <a href="<?php echo sanitize_text_field(esc_attr($wp1s_option['slides']['slide_button_url'][$i]));  ?>" class="wps1-readmore-button"><?php echo sanitize_text_field(esc_attr($wp1s_option['slides']['slide_button_text'][$i]));  ?></a>
            <?php } ?>
            </div>
        </li>
    <?php endwhile;
        wp_reset_postdata();
  
     }
            ?>
    </ul>
    </div>
</div>
   <?php  } 
   if($wp1s_pager_type == 'thumbnail') {
  ?>
<div class="wp1s-thumbnail-wrapper wp1s-thumbnail-<?php echo esc_attr($wp1s_thumbnail_layout); ?> wp1s-thb-arrow-<?php echo esc_attr($wp1s_thumbnail_layout); ?>">
        <!-- The thumbnails -->
        <ul class="wp1s-bxslider-pager" data-id="<?php echo esc_attr($random_num); ?>" id="wp1s-pager-<?php echo esc_attr($random_num); ?>" data-count='<?php if( !empty(  $wp1s_thumb_count ) ) {
        echo  $wp1s_thumb_count; }?>'>
            <?php
            for($i = 0; $i < $wp1s_slide_count;$i++){
            while ( $wp1s_slider->have_posts() ) : $wp1s_slider->the_post(); 
                $image_url=sanitize_text_field(esc_attr($wp1s_option['slides']['slide_image_url'][$i]));

                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height); // resized
                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height, false); // cropped
                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height, $wp1s_pager_thumb_height, null, false);               
               ?>
                <li><a data-slide-index="<?php echo $i;?>" href=""><div class="wps-thumb-overlay"></div>
               <?php if($wp1s_thumbnail_layout == 'type-5' || $wp1s_thumbnail_layout == 'type-6' || $wp1s_thumbnail_layout == 'type-7' || $wp1s_thumbnail_layout == 'type-8' || $wp1s_thumbnail_layout == 'type-9' || $wp1s_thumbnail_layout == 'type-10') {
                
                ?>
             
                <img  src="<?php echo esc_attr($img_square[0]); ?>" />
                 
                  <?php  }
                  else
                    { ?>
                    <img src="<?php echo esc_attr($img_square[0]); ?>" />
                   <?php } ?>
                </a>
                </li>
            <?php endwhile; }?>
        </ul>
    </div>
   </div>

       <?php   }

     }
     else{
     if(isset($wp1s_option['slides']) && is_array($wp1s_option['slides'])){
        $wp1s_slide_count = count($wp1s_option['slides']);

      }else{
        $wp1s_slide_count = 0;
      }

    if($wp1s_pager_type == 'dot' || $wp1s_pager_type == 'disable' || $wp1s_pager_type == 'pagination' || $wp1s_pager_type == 'thumbnail' ){
        foreach($wp1s_option['slides'] as $slide_key => $slide_detail){
    while ( $wp1s_slider->have_posts() ) : $wp1s_slider->the_post();
   
    if($slide_detail['slide_type']=='image'){
    ?>
        <li>
            <img src="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_image_url']); ?>" />
            <div class="wp1s-caption-wrapper wp1s-caption-<?php echo get_post_meta( $post_id, 'wp1s_caption_type', true );?> wp1s-caption-<?php echo "$wp1s_caption_position"; ?>">
            <h1 class="wp1s-caption-title"><?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_title']); ?></h1>
            <h2 class="wp1s-caption-content"><?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_description']);  ?></h2>
            <?php if(!empty($wp1s_option['slides'][$slide_key]['slide_show_button']) == '1')
            { ?>
            <a href="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_button_url']);  ?>" class="wps1-readmore-button"><?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_button_text']);  ?></a>
            <?php } ?>
            </div>
        </li>
    <?php } endwhile;
        wp_reset_postdata();
  
     }
            ?>
    </ul>
    </div>
</div>
   <?php  } 
    if($wp1s_pager_type == 'thumbnail') {
    ?>
<div class="wp1s-thumbnail-wrapper wp1s-thumbnail-<?php echo esc_attr($wp1s_thumbnail_layout); ?> wp1s-thb-arrow-<?php echo esc_attr($wp1s_thumbnail_layout); ?>">
        <!-- The thumbnails -->
        <ul class="wp1s-bxslider-pager" data-id="<?php echo esc_attr($random_num); ?>" id="wp1s-pager-<?php echo esc_attr($random_num); ?>" data-count='<?php if( !empty(  $wp1s_thumb_count ) ) {
        echo  $wp1s_thumb_count; }?>'>
            <?php
             $count = 0;
           foreach($wp1s_option['slides'] as $slide_key => $slide_detail){

            while ( $wp1s_slider->have_posts() ) : $wp1s_slider->the_post(); 
            if($slide_detail['slide_type']=='image'){
                $image_url= esc_attr($wp1s_option['slides'][$slide_key]['slide_image_url']);

                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height); // resized
                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height, false); // cropped
                $img_square = aq_resize( $image_url, $wp1s_pager_thumb_width, $wp1s_pager_thumb_height, $wp1s_pager_thumb_height, null, false);

                 ?>
                <li><a data-slide-index="<?php echo $count++;?>" href=""><div class="wps-thumb-overlay"></div>
                    <img src="<?php echo esc_attr($img_square[0]); ?>" />
                </a>
                </li>
            <?php }
           
             endwhile; }?>
        </ul>
    </div>


   <?php  } }?>
   </div>
   <?php
include(WP1S_PATH . 'inc/wp1s-inline-style.php');
    
