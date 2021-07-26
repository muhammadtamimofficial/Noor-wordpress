<?php 
defined('ABSPATH') or die("No script kiddies please!");
global $post;
$post_id = $post->ID;
$wp1s_option = get_post_meta($post_id,'wp1s_option',true);
?>
<div class="wp1s-option-wrap">
  <div class="wp1s-add-meta-wrap">
    <input type="button" class="button-primary wp1s-add-meta-button" value="<?php _e( 'Add Image Slide', 'wp-1-slider' ); ?>">
  </div>
  <?php 
  if(isset($wp1s_option['slides']['slide_title'])){
    $total_slides = count($wp1s_option['slides']['slide_title']);
    for($i=1;$i<=$total_slides;$i++){
      $slide_key = 'slide_'.$i;
      ?>
      <div class="wp1s-add-meta-slide">
    <div class="wp1s-add-slide-option-wrap">
    <div class="wp1s-option-wrapper">
       <input type="hidden" class="wp1s-slide-type" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_type]"  value="image"/>
      </div>

      <div class="wp1s-option-wrapper">
        <label for="wp1s_slide_title" class="wp1s-slide-title"><?php _e( 'Title', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <input type="text" class="wp1s-slide-title" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_title]"  value="<?php echo esc_attr($wp1s_option['slides']['slide_title'][$i-1]); ?>"/>
          </div>
      </div> 
      <div class="wp1s-option-wrapper">
        <label for="wp1s_slide_description" class="wp1s_slide_description"><?php _e( 'Description', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <textarea  class="wp1s_slide_description" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_description]"  rows="8" cols="20"><?php echo esc_html($wp1s_option['slides']['slide_description'][$i-1]); ?></textarea>
          </div>
      </div>
      <div class="wp1s-show-slider-image">
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slider_image" class="wp1s-slider-image"><?php _e( 'Slider Image', 'wp-1-slider' ) ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slider-image-url" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_image_url]"  value="<?php echo esc_attr($wp1s_option['slides']['slide_image_url'][$i-1]); ?>" />
              <input type="button" class="wp1s_slider_image_url_button" name="wp1s_slider_image_url_button"  value="Upload Image" size="25"/> 
                <div class="wp1s-option-field wp1s-image-preview">
                  <img  class="wp1s-slider-image" src="<?php echo esc_attr($wp1s_option['slides']['slide_image_url'][$i-1]); ?>" alt="" height="120" width="200">
                </div>
            </div>   
       </div>
      </div>
      <div class="wp1s-option-wrapper">
        <label for="slide_show_button" class="wp1s-show-button"><?php _e( 'Show Button', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <label class="wp1s-button-check">
              <input type="checkbox" class="wp1s-slide-show-button" <?php checked($wp1s_option['slides']['slide_show_button'][$i-1],1)?>/>
              <?php _e( 'Check to show button', 'wp-1-slider' )?></label>
              <input type="hidden" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_show_button]" class="wp1s-slide-show-button-value" value="<?php echo esc_attr($wp1s_option['slides']['slide_show_button'][$i-1]);?>" />
          </div>
      </div>
      <div class="wp1s-button-wrapper" <?php if (empty ($wp1s_option['slides'][$slide_key]['slide_show_button'] )){ ?> style="display: none;" <?php }?>>
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slide_button_text" class="wp1s-slide-button"><?php _e( 'Button Text', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slide-button" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_button_text]"  value="<?php echo esc_attr($wp1s_option['slides']['slide_button_text'][$i-1]); ?>"/>
            </div>
        </div> 
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slide_button_url" class="wp1s-slide-button"><?php _e( 'Button URL', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slide-button" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_button_url]"  value="<?php echo esc_attr($wp1s_option['slides']['slide_button_url'][$i-1]); ?>"/>
                    
            </div>
        </div> 
      </div>
    </div>
    <div class="wp1s-delete-meta-wrap">
      <input type="button" class="button-primary wp1s-delete-meta-button" value="<?php _e( 'Delete', 'wp-1-slider' ); ?>">
    </div>
  </div>
      <?php
    } 
  }else{
    if(isset($wp1s_option['slides']) && is_array($wp1s_option['slides'])){
        $wp1s_slide_count = count($wp1s_option['slides']);

      }else{
        $wp1s_slide_count = 0;
      }
      if($wp1s_slide_count>0){

        foreach($wp1s_option['slides'] as $slide_key => $slide_detail){


         if(isset($slide_detail['slide_type']) && $slide_detail['slide_type']=='image'){
            ?>         
  <div class="wp1s-add-meta-slide">
    <div class="wp1s-add-slide-option-wrap">
    <div class="wp1s-option-wrapper">
       <input type="hidden" class="wp1s-slide-type" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_type]"  value="image"/>
      </div>

      <div class="wp1s-option-wrapper">
        <label for="wp1s_slide_title" class="wp1s-slide-title"><?php _e( 'Title', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <input type="text" class="wp1s-slide-title" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_title]"  value="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_title']); ?>"/>
          </div>
      </div> 
      <div class="wp1s-option-wrapper">
        <label for="wp1s_slide_description" class="wp1s_slide_description"><?php _e( 'Description', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <textarea  class="wp1s_slide_description" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_description]"  value="<?php echo esc_html($wp1s_option['slides'][$slide_key]['slide_description']); ?>" rows="8" cols="20"><?php echo esc_html($wp1s_option['slides'][$slide_key]['slide_description']); ?></textarea>
          </div>
      </div>
      <div class="wp1s-show-slider-image">
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slider_image" class="wp1s-slider-image"><?php _e( 'Slider Image', 'wp-1-slider' ) ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slider-image-url" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_image_url]"  value="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_image_url']); ?>" />
              <input type="button" class="wp1s_slider_image_url_button" name="wp1s_slider_image_url_button"  value="Upload Image" size="25"/> 
                <div class="wp1s-option-field wp1s-image-preview">
                  <img  class="wp1s-slider-image" src="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_image_url']); ?>" alt="" height="120" width="200">
                </div>
            </div>   
       </div>
      </div>
      <div class="wp1s-option-wrapper">
        <label for="slide_show_button" class="wp1s-show-button"><?php _e( 'Show Button', 'wp-1-slider' ); ?></label>
          <div class="wp1s-option-field">
            <label class="wp1s-button-check">
              <input type="checkbox" class="wp1s-slide-show-button" <?php checked($wp1s_option['slides'][$slide_key]['slide_show_button'],1)?>/>
              <?php _e( 'Check to show button', 'wp-1-slider' )?></label>
              <input type="hidden" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_show_button]" class="wp1s-slide-show-button-value" value="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_show_button']);?>" />
          </div>
      </div>
      <div class="wp1s-button-wrapper" <?php if (empty ($wp1s_option['slides'][$slide_key]['slide_show_button'] )){ ?> style="display: none;" <?php }?>>
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slide_button_text" class="wp1s-slide-button"><?php _e( 'Button Text', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slide-button" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_button_text]"  value="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_button_text']); ?>"/>
            </div>
        </div> 
        <div class="wp1s-option-wrapper">
          <label for="wp1s_slide_button_url" class="wp1s-slide-button"><?php _e( 'Button URL', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
              <input type="text" class="wp1s-slide-button" name="wp1s_option[slides][<?php echo esc_attr($slide_key);?>][slide_button_url]"  value="<?php echo esc_attr($wp1s_option['slides'][$slide_key]['slide_button_url']); ?>"/>
                    
            </div>
        </div> 
      </div>
    </div>
    <div class="wp1s-delete-meta-wrap">
      <input type="button" class="button-primary wp1s-delete-meta-button" value="<?php _e( 'Delete', 'wp-1-slider' ); ?>">
    </div>
  </div>
  <?php }
      } // for loop for videos
    }  // if slide is greater than 1

      if (isset($wp1s_option['slides']) && is_array($wp1s_option['slides'])) {
              $array_val = $wp1s_option['slides'];
              $array_key=array_keys($array_val);
              natsort($array_key);
              $last_keys=end($array_key);
              $last_count=str_ireplace('slide_', '',$last_keys );
             
             
        } else {
            $last_count = 0;
        }
  }
    ?>
    <input type="hidden" id="wp1-slide-count" value="<?php echo  $last_count; ?>">
  <!--end of post slide-->
</div>
  
  