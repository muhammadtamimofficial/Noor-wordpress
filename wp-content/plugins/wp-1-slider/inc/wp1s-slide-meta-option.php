<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="wp1s-slide-meta-option-wrap">
    <div class="wp1s-slide-option-wrapper">
        <label for="wp1s-slide-option-width" class="wp1s-slide-option-width"><?php _e( 'Width', 'wp-1-slider' ); ?></label>
    <div class="wp1s-slide-option-field">
        <input type="text" class="wp1s-slide-option-width" name="wp1s_slide_option_width"  value="<?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_width'] ) ) {
        echo esc_attr( $wp1s_stored_meta_option['wp1s_slide_option_width'][0] );
                } else{ echo 100;} ?>"/>
                    
    </div>
    </div> 
    <div class="wp1s-slide-option-wrapper">
        <label for="wp1s-slide-option-speed" class="wp1s-slide-option-speed"><?php _e( 'Speed', 'wp-1-slider' ); ?></label>
    <div class="wp1s-slide-option-field">
        <input type="text" class="wp1s-slide-option-speed" name="wp1s_slide_option_speed"  value="<?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_speed'] ) ) {
		echo esc_attr( $wp1s_stored_meta_option['wp1s_slide_option_speed'][0] );
				} else{ echo 1000;} ?>"/>
                    
    </div>
    </div> 
     <div class="wp1s-slide-option-wrapper">
        <label for="wp1s-slide-option-pause" class="wp1s-slide-option-pause"><?php _e( 'Pause', 'wp-1-slider' ); ?></label>
    <div class="wp1s-slide-option-field">
        <input type="number" class="wp1s-slide-option-pause" name="wp1s_slide_option_pause" min="500" step="100" value="<?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_pause'] ) ) {
        echo esc_attr( $wp1s_stored_meta_option['wp1s_slide_option_pause'][0] );
                } else{ echo 9000;} ?>" >  
    </div>
    </div> 
  
    <div class="wp1s-slide-option-wrapper">
       	<label for="wp1s-slide-option-auto" class="wp1s-slide-option-auto"><?php _e( 'Auto', 'wp-1-slider' ) ?></label>
    <div class="wp1s-slide-option-field">
        <select name="wp1s_slide_option_auto" class="wp1s-slide-option-auto">
            <option value="true" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_auto'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_auto'][0], 'true' ); ?>><?php _e( 'True', 'wp-1-slider' )?></option>';
                  <option value="false" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_auto'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_auto'][0], 'false' ); ?>><?php _e( 'False', 'wp-1-slider' )?></option>';
        </select>
    </div>
    </div> 
    <div class="wp1s-slide-option-wrapper">
        <label for="wp1s-slide-option-transition" class="wp1s-slide-option-transition"><?php _e( 'Transition', 'wp-1-slider' ) ?></label>
    <div class="wp1s-slide-option-field">
        <select name="wp1s_slide_option_transition" class="wp1s-slide-option-transition">
            <option value="horizontal" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_transition'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_transition'][0], 'horizontal' ); ?>><?php _e( 'Horizontal', 'wp-1-slider' )?></option>';
            <option value="vertical" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_transition'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_transition'][0], 'vertical' ); ?>><?php _e( 'Vertical', 'wp-1-slider' )?></option>';
            <option value="fade" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_transition'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_transition'][0], 'fade' ); ?>><?php _e( 'Fade', 'wp-1-slider' )?></option>';
        </select>
    </div>
    </div> 
    <div class="wp1s-slide-option-wrapper">
        <label for="wp1s-slide-option-controls" class="wp1s-slide-option-controls"><?php _e( 'Controls', 'wp-1-slider' ) ?></label>
    <div class="wp1s-slide-option-field">
        <select name="wp1s_slide_option_controls" class="wp1s-slide-option-controls">
            <option value="true" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_controls'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_controls'][0], 'false' ); ?>><?php _e( 'True', 'wp-1-slider' )?></option>';
            <option value="false" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_controls'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_controls'][0], 'false' ); ?>><?php _e( 'False', 'wp-1-slider' )?></option>';
        </select>
    </div>
    </div>
    	<div class="wp1s-slide-option-wrapper">
       		<label for="wp1s-slide-option-responsive" class="wp1s-slide-option-responsive"><?php _e( 'Responsive', 'wp-1-slider' ) ?></label>
      	<div class="wp1s-slide-option-field">
        	<select name="wp1s_slide_option_responsive" class="wp1s-slide-option-responsive">
                <option value="true" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_responsive'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_responsive'][0], 'false' ); ?>><?php _e( 'True', 'wp-1-slider' )?></option>';
                <option value="false" <?php if ( ! empty ( $wp1s_stored_meta_option['wp1s_slide_option_responsive'] ) ) selected( $wp1s_stored_meta_option['wp1s_slide_option_responsive'][0], 'false' ); ?>><?php _e( 'False', 'wp-1-slider' )?></option>';
            </select>
      </div>
      </div>  
</div>