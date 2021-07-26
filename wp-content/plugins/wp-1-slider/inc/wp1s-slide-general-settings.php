<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="wp1s-meta-setting-wrapper">
  <div class="wp1s-slideToggle-wrapper">
    <div class="wp1s-slider-slideToggle"  style="cursor:pointer;"><h3>Slider Settings</h3></div>
    <div class="wp1s-slider-slideTogglebox" style="display: none;">
      
        <div class="wp1s-option-wrapper">
            <label><?php _e('Show slider box shadow','wp-1-slider');?></label>
                        <div class="wp1s-option-field">
                <select name="wp1s_show_shadow" class="wp1s-show-shadow">
                
                <option value="true" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_show_shadow'] ) ) selected( $wp1s_stored_meta_setting['wp1s_show_shadow'][0], 'true' ); ?>><?php _e( 'True', 'wp-1-slider' )?></option>
                <option value="false" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_show_shadow'] ) ) selected( $wp1s_stored_meta_setting['wp1s_show_shadow'][0], 'false' ); ?>><?php _e( 'False', 'wp-1-slider' )?></option>
                
              </select>
         
            </div>
        </div>
        <div class="wp1s-shawod-wrapper" style="display: none;">
        <div class="wp1s-option-wrapper">
            <label><?php _e('Box shadow type','wp-1-slider');?></label>
                        <div class="wp1s-option-field">
                <select name="wp1s_shadow_type" class="wp1s-shadow-type">
                
                <option value="type-1" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_shadow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_shadow_type'][0], 'type-1' ); ?>><?php _e( 'Type 1', 'wp-1-slider' )?></option>
                <option value="type-2" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_shadow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_shadow_type'][0], 'type-2' ); ?>><?php _e( 'Type 2', 'wp-1-slider' )?></option>
                
              </select>
         <div class="wp1s-shadow-demo">
                    <?php for ($cnt = 1; $cnt <= 2; $cnt++) { 
                        if(isset($wp1s_stored_meta_setting['wp1s_shadow_type'][0])){
                        $option_value = $wp1s_stored_meta_setting['wp1s_shadow_type'][0];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[1];
                        if($cnt != $cnt_num){
                            $style = "style='display:none;'";
                        }else{
                            $style= '';
                        }
                        }
                        ?>
                       <div class="wp1s-shadow-common" id="wp1s-shadow-demo-<?php echo esc_attr($cnt); ?>" <?php if(isset($style)) echo esc_attr($style);?>>
                           <h4><?php _e('Shadow','wp-1-slider');?> <?php echo esc_attr($cnt);?> <?php _e('Preview','wp-1-slider');?></h4>
                               <img src="<?php echo WP1S_IMG_DIR.'/demo/shadow-'.$cnt.'.jpg' ?>"/>
                        </div>
                     
                   <?php  } ?> 
                </div>
            </div>
        </div>
        </div>
        
    </div>

    </div>
    <!-- Caption Setting -->
    <div class="wp1s-slideToggle-wrapper">
    <div class="wp1s-caption-slideToggle"  style="cursor:pointer;"><h3>Caption Settings</h3>
    </div>
        <div class="wp1s-caption-slideTogglebox" style="display: none;">
          <div class="wp1s-option-wrapper">
            <label><?php _e('Caption type','wp-1-slider');?></label>
               <div class="wp1s-option-field">
                <select name="wp1s_caption_type" class="wp1s-caption-type">
                
                <option value="type-1" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_type'][0], 'type-1' ); ?>><?php _e( 'Type 1', 'wp-1-slider' )?></option>
                <option value="type-2" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_type'][0], 'type-2' ); ?>><?php _e( 'Type 2', 'wp-1-slider' )?></option>
                <option value="type-3" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_type'][0], 'type-3' ); ?>><?php _e( 'Type 3', 'wp-1-slider' )?></option>
                <option value="type-4" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_type'][0], 'type-4' ); ?>><?php _e( 'Type 4', 'wp-1-slider' )?></option>

              </select>
              <div class="wp1s-caption-demo">
                    <?php for ($cnt = 1; $cnt <= 4; $cnt++) { 
                        if(isset($wp1s_stored_meta_setting['wp1s_caption_type'][0])){
                        $option_value = $wp1s_stored_meta_setting['wp1s_caption_type'][0];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[1];
                        if($cnt != $cnt_num){
                            $style = "style='display:none;'";
                        }else{
                            $style= '';
                        }
                        }
                        ?>
                       <div class="wp1s-caption-common" id="wp1s-caption-demo-<?php echo esc_attr($cnt); ?>" <?php if(isset($style)) echo esc_attr($style);?>>
                           <h4><?php _e('Caption','wp-1-slider');?> <?php echo esc_attr($cnt);?> <?php _e('Preview','wp-1-slider');?></h4>
                               <img src="<?php echo WP1S_IMG_DIR.'/demo/caption-'.$cnt.'.jpg' ?>"/>
                        </div>
                     
                   <?php  } ?> 
                </div>
            </div>
        </div>
        <div class="wp1s-option-wrapper">
                <label><?php _e( 'Title font size', 'wp-1-slider' ); ?></label>
                <div class="wp1s-option-field">
                    <input type="text" class="wp1s-title-font-size" name="wp1s_title_1_font_size"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_title_1_font_size'] ) ) {
                    echo esc_attr( $wp1s_stored_meta_setting['wp1s_title_1_font_size'][0] );
                    } else{ echo 20;} ?>"/><?php _e('px','wp-1-slider');?>
                    
                </div>
            </div>
            <div class="wp1s-option-wrapper">
                <label><?php _e( 'Description font size', 'wp-1-slider' ); ?></label>
                <div class="wp1s-option-field">
                    <input type="text" class="wp1s-description-font-size" name="wp1s_description_1_font_size"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_description_1_font_size'] ) ) {
                    echo esc_attr( $wp1s_stored_meta_setting['wp1s_description_1_font_size'][0] );
                    } else{ echo 40;} ?>"/><?php _e('px','wp-1-slider');?>
                    
                </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Title color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_title_text_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_title_text_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_title_text_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Description color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_description_text_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_description_text_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_description_text_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
        <!-- for type-1 -->
        <div class="wp1s-wrapper-caption-type-1">
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Button color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_button_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_button_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_button_color'][0] );
                } else{ echo "#078f8a"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Button hover color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_button_hover_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_button_hover_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_button_hover_color'][0] );
                } else{ echo "#08a39d"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Button shadow color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_button_shadow_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_button_shadow_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_button_shadow_color'][0] );
                } else{ echo "#056460"; }?>"/>
                    
            </div>
            </div>
        </div>  
        <!-- For Caption Type 2 -->
       <div class="wp1s-wrapper-caption-type-2" style="display: none;">
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Title background color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_title_back_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_title_back_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_title_back_color'][0] );
                } else{ echo "rgba(125,165,82,0.8)"; }?>"/>
                    
            </div>
            </div>
            
       </div>

       <!-- For Caption Type 3 -->
       <div class="wp1s-wrapper-caption-type-3" style="display: none;">
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Border color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_caption_border_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_border_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_caption_border_color'][0] );
                } else{ echo "#2ed1ff"; }?>"/>
                    
            </div>
            </div>
            
       </div>

       <!-- For Caption Type 4 -->
       <div class="wp1s-wrapper-caption-type-4" style="display: none;">
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Background color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_caption_back_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_back_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_caption_back_color'][0] );
                } else{ echo "rgba(124,118,118,0.6)"; }?>"/>
                    
            </div>
            </div>
            
       </div>

       
            <div class="wp1s-option-wrapper">
            <label><?php _e('Caption position','wp-1-slider');?></label>
            <div class="wp1s-option-field">
                <select name="wp1s_caption_position" class="wp1s-caption-position">
                <option value="topleft" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'topleft' ); ?>><?php _e( 'Topleft', 'wp-1-slider' )?></option>
                <option value="topcenter" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'topcenter' ); ?>><?php _e( 'Topcenter', 'wp-1-slider' )?></option>
                <option value="topright" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'topright' ); ?>><?php _e( 'Topright', 'wp-1-slider' )?></option>
                <option value="middleleft" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'middleleft' ); ?>><?php _e( 'Middleleft', 'wp-1-slider' )?></option>
                <option value="middlecenter" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'middlecenter' ); ?>><?php _e( 'Middlecenter', 'wp-1-slider' )?></option>
                <option value="middleright" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'middleright' ); ?>><?php _e( 'Middleright', 'wp-1-slider' )?></option>
                <option value="bottomleft" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'bottomleft' ); ?>><?php _e( 'Bottomleft', 'wp-1-slider' )?></option>
                <option value="bottomcenter" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'bottomcenter' ); ?>><?php _e( 'Bottomcenter', 'wp-1-slider' )?></option>
                <option value="bottomright" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_caption_position'] ) ) selected( $wp1s_stored_meta_setting['wp1s_caption_position'][0], 'bottomright' ); ?>><?php _e( 'Bottomright', 'wp-1-slider' )?></option>



              </select>
            </div>
        </div>   
         <div class="wp1s-option-wrapper">
            <label for="slide_show_caption_widget" class="wp1s-show-caption-widget"><?php _e( 'Show caption in widget', 'wp-1-slider' ); ?></label>
              <div class="wp1s-option-field">
            <label class="wp1s-button-check">
            <input type="checkbox" class="wp1s-show-caption-widget"  <?php 
            if ( isset($wp1s_stored_meta_setting['wp1s_show_caption_widget'][0]) && $wp1s_stored_meta_setting['wp1s_show_caption_widget'][0]== '1' ) { ?>checked="checked"<?php } ?> />
            <?php _e( 'Check to show caption in widget', 'wp-1-slider' )?></label>
            <input type="hidden" name="wp1s_show_caption_widget" class="wp1s-show-caption-widget-value" value="<?php echo $wp1s_stored_meta_setting['wp1s_show_caption_widget'][0];?>" />
                 
          </div>
          </div>    
    </div>
    </div>
    <!-- end of caption setting -->
    <!-- pager setting -->
    <div class="wp1s-slideToggle-wrapper">
    <div class="wp1s-pager-slideToggle"  style="cursor:pointer;"><h3>Pager Settings</h3></div>
    <div class="wp1s-pager-slideTogglebox" style="display: none;">
        <div class="wp1s-option-wrapper">
            <label><?php _e('Pager type','wp-1-slider');?></label>
            <div class="wp1s-option-field">
                <select name="wp1s_pager_type" id="wp1s-pager-type" class="wp1s-pager-type">
                
                    <option value="disable" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_pager_type'][0], 'disable' ); ?>><?php _e( 'Disable', 'wp-1-slider' )?></option>
                    <option value="dot" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_pager_type'][0], 'dot' ); ?>><?php _e( 'Dot', 'wp-1-slider' )?></option>
                    <option value="thumbnail" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_pager_type'][0], 'thumbnail' ); ?>><?php _e( 'Thumbnail', 'wp-1-slider' )?></option>
                    <option value="pagination" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_pager_type'][0], 'pagination' ); ?>><?php _e( 'Pagination', 'wp-1-slider' )?></option>
                
                </select>
            </div>
        </div>
        <!--Navigation Dot  -->
        <div class="wp1s-navigation-dot-wrapper" style="display: none;">
        
        <div class="wp1s-option-wrapper">
              <label><?php _e('Dot layout','wp-1-slider');?></label>
                <div class="wp1s-option-field">
                <select name="wp1s_dot_layout" class="wp1s-dot-pager-type">
                
                    <option value="type-1" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_dot_layout'][0], 'type-1' ); ?>><?php _e( 'Type 1', 'wp-1-slider' )?></option>
                    <option value="type-2" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_dot_layout'][0], 'type-2' ); ?>><?php _e( 'Type 2', 'wp-1-slider' )?></option>
                    <option value="type-3" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_dot_layout'][0], 'type-3' ); ?>><?php _e( 'Type 3', 'wp-1-slider' )?></option>
                    <option value="type-4" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_dot_layout'][0], 'type-4' ); ?>><?php _e( 'Type 4', 'wp-1-slider' )?></option>
                
                </select>
                <div class="wp1s-dot-pager-demo">
                    <?php for ($cnt = 1; $cnt <= 4; $cnt++) { 
                        if(isset($wp1s_stored_meta_setting['wp1s_dot_layout'][0])){
                        $option_value = $wp1s_stored_meta_setting['wp1s_dot_layout'][0];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[1];
                        if($cnt != $cnt_num){
                            $style = "style='display:none;'";
                        }else{
                            $style= '';
                        }
                        }
                        ?>
                       <div class="wp1s-dot-pager-common" id="wp1s-dot-pager-demo-<?php echo esc_attr($cnt); ?>" <?php if(isset($style)) echo esc_attr($style);?>>
                           <h4><?php _e('Dot Pager','wp-1-slider');?> <?php echo esc_attr($cnt);?> <?php _e('Preview','wp-1-slider');?></h4>
                               <img src="<?php echo WP1S_IMG_DIR.'/pager/pager-'.$cnt.'-preview.png' ?>"/>
                        </div>
                     
                   <?php  } ?> 
                </div>
                
            </div>
        </div>
        
        <!-- Pager dot type 1 -->
        <div class="wp1s-pager-dot-type-1" >
        <div class="wp1s-option-wrapper">
            <label><?php _e( 'Background color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_back_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_back_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_back_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Active color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_hover_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_hover_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_hover_color'][0] );
                } else{ echo "#3bb1f4"; }?>"/>
                    
            </div>
            </div>
        </div>
        <!-- Pager dot type 2 -->
        <div class="wp1s-pager-dot-type-2" style="display: none;">
        <div class="wp1s-option-wrapper">
            <label><?php _e( 'Background color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_2_back_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_2_back_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_2_back_color'][0] );
                } else{ echo "#635e5e"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Border color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_2_border_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_2_border_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_2_border_color'][0] );
                } else{ echo "#979191"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Active color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_2_active_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_2_active_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_2_active_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
        </div>
        <!-- Pager dot type 3 -->
        <div class="wp1s-pager-dot-type-3" style="display: none;">
        <div class="wp1s-option-wrapper">
            <label><?php _e( 'Border color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_3_border_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_3_border_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_3_border_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Active color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_3_active_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_3_active_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_3_active_color'][0] );
                } else{ echo "#ff9600"; }?>"/>
                    
            </div>
            </div>
        </div>
        <!-- Pager dot type 4 -->
        <div class="wp1s-pager-dot-type-4" style="display: none;">
        <div class="wp1s-option-wrapper">
            <label><?php _e( 'Background color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_4_back_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_4_back_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_4_back_color'][0] );
                } else{ echo "#7a7a7a"; }?>"/>
                    
            </div>
            </div>
            <div class="wp1s-option-wrapper">
            <label><?php _e( 'Active color', 'wp-1-slider' ); ?></label>
            <div class="wp1s-option-field">
                <input type="text" class="color-picker" data-alpha="true" name="wp1s_dot_4_active_color"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_dot_4_active_color'] ) ) {
                echo esc_attr( $wp1s_stored_meta_setting['wp1s_dot_4_active_color'][0] );
                } else{ echo "#ffffff"; }?>"/>
                    
            </div>
            </div>
        </div>
        </div>
        <!-- End of navigation dot-->
        <!-- Thumbnail navigation -->
        <div class="wp1s-navigation-thumb-wrapper" style="display: none;">
            <div class="wp1s-option-wrapper">
            <label><?php _e('Thumbnail layout','wp-1-slider');?></label>
            <div class="wp1s-option-field">
                <select name="wp1s_thumbnail_layout" class="wp1s-thumb-pager-type">
                
                    <option value="type-1" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-1' ); ?>><?php _e( 'Type 1', 'wp-1-slider' )?></option>
                    <option value="type-2" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-2' ); ?>><?php _e( 'Type 2', 'wp-1-slider' )?></option>
                    <option value="type-3" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-3' ); ?>><?php _e( 'Type 3', 'wp-1-slider' )?></option>
                    <option value="type-4" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-4' ); ?>><?php _e( 'Type 4', 'wp-1-slider' )?></option>
                    <option value="type-5" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-5' ); ?>><?php _e( 'Type 5', 'wp-1-slider' )?></option>
                    <option value="type-6" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-6' ); ?>><?php _e( 'Type 6', 'wp-1-slider' )?></option>
                    <option value="type-7" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-7' ); ?>><?php _e( 'Type 7', 'wp-1-slider' )?></option>
                    <option value="type-8" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-8' ); ?>><?php _e( 'Type 8', 'wp-1-slider' )?></option>
                    <option value="type-9" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-9' ); ?>><?php _e( 'Type 9', 'wp-1-slider' )?></option>
                    <option value="type-10" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'] ) ) selected( $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0], 'type-10' ); ?>><?php _e( 'Type 10', 'wp-1-slider' )?></option>
                
                </select>
                <div class="wp1s-thumb-pager-demo">
                    <?php for ($cnt = 1; $cnt <= 10; $cnt++) { 
                        if(isset($wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0])){
                        $option_value = $wp1s_stored_meta_setting['wp1s_thumbnail_layout'][0];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[1];
                        if($cnt != $cnt_num){
                            $style = "style='display:none;'";
                        }else{
                            $style= '';
                        }
                        }
                        ?>
                       <div class="wp1s-thumb-pager-common" id="wp1s-thumb-pager-demo-<?php echo esc_attr($cnt); ?>" <?php if(isset($style)) echo esc_attr($style);?>>
                           <h4><?php _e('Thumbnail Pager','wp-1-slider');?> <?php echo esc_attr($cnt);?> <?php _e('Preview','wp-1-slider');?></h4>
                               <img src="<?php echo WP1S_IMG_DIR.'/thumbnail-preview/thumbnail-'.$cnt.'.png' ?>"/>
                        </div>
                     
                   <?php  } ?> 
                </div>
            </div>
        </div> 
        <div class="wp1s-option-wrapper">
                <label><?php _e( 'Count of thumb slides', 'wp-1-slider' ); ?></label>
                <div class="wp1s-option-field">
                    <input type="text" class="wp1s-thumb-count" name="wp1s_pager_thumb_count"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_thumb_count'] ) ) {
                    echo esc_attr( $wp1s_stored_meta_setting['wp1s_pager_thumb_count'][0] );
                    } else{ echo 3;} ?>"/>
                    
                </div>
            </div>
            <div class="wp1s-option-wrapper">
                <label><?php _e( 'Width of thumb slides', 'wp-1-slider' ); ?></label>
                <div class="wp1s-option-field">
                    <input type="text" class="wp1s-thumb-width" name="wp1s_pager_thumb_width"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_thumb_width'] ) ) {
                    echo esc_attr( $wp1s_stored_meta_setting['wp1s_pager_thumb_width'][0] );
                    } else{ echo 150;} ?>"/>
                    
                </div>
            </div>
            <div class="wp1s-option-wrapper">
                <label><?php _e( 'Height of thumb slides', 'wp-1-slider' ); ?></label>
                <div class="wp1s-option-field">

                    <input type="text" class="wp1s-thumb-height" name="wp1s_pager_thumb_height"  value="<?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_pager_thumb_height'] ) ) {
                    echo esc_attr( $wp1s_stored_meta_setting['wp1s_pager_thumb_height'][0] );
                    } else { echo 83;} ?>"/>
                    
                </div>
            </div>
             <div class="wp1s-option-wrapper">
            <label for="slide_show_thumb_widget" class="wp1s-show-thumb-widget"><?php _e( 'Show thumb in widget', 'wp-1-slider' ); ?></label>
              <div class="wp1s-option-field">
            <label class="wp1s-button-check">
            <input type="checkbox" class="wp1s-show-thumb-widget"  <?php 
            if ( isset($wp1s_stored_meta_setting['wp1s_show_thumb_widget'][0]) && $wp1s_stored_meta_setting['wp1s_show_thumb_widget'][0]== '1' ) { ?>checked="checked"<?php } ?> />
            <?php _e( 'Check to show thumb in widget', 'wp-1-slider' )?></label>
            <input type="hidden" name="wp1s_show_thumb_widget" class="wp1s-show-thumb-widget-value" value="<?php echo $wp1s_stored_meta_setting['wp1s_show_thumb_widget'][0];?>" />
                 
          </div>
          </div>
        </div>
        
    </div>
    </div>
    
    <!-- end of pager setting -->
    <!-- arrow setting -->
    <div class="wp1s-slideToggle-wrapper">
    <div class="wp1s-arrow-slideToggle"  style="cursor:pointer;"><h3>Navigation Arrow Settings</h3></div>
    <div class="wp1s-arrow-slideTogglebox" style="display: none;">
      
        <div class="wp1s-option-wrapper">
            <label><?php _e('Navigation arrow style','wp-1-slider');?></label>
                        <div class="wp1s-option-field">
                <select name="wp1s_arrow_type" class="wp1s-arrow-type">
                
                <option value="type-1" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-1' ); ?>><?php _e( 'Type 1', 'wp-1-slider' )?></option>
                <option value="type-2" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-2' ); ?>><?php _e( 'Type 2', 'wp-1-slider' )?></option>
                <option value="type-3" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-3' ); ?>><?php _e( 'Type 3', 'wp-1-slider' )?></option>
                <option value="type-4" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-4' ); ?>><?php _e( 'Type 4', 'wp-1-slider' )?></option>
                <option value="type-5" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-5' ); ?>><?php _e( 'Type 5', 'wp-1-slider' )?></option>
                <option value="type-6" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-6' ); ?>><?php _e( 'Type 6', 'wp-1-slider' )?></option>
                <option value="type-7" <?php if ( ! empty ( $wp1s_stored_meta_setting['wp1s_arrow_type'] ) ) selected( $wp1s_stored_meta_setting['wp1s_arrow_type'][0], 'type-7' ); ?>><?php _e( 'Type 7', 'wp-1-slider' )?></option>

              </select>
            <div class="wp1s-arrow-demo">
                    <?php for ($cnt = 1; $cnt <= 7; $cnt++) { 
                        if(isset($wp1s_stored_meta_setting['wp1s_arrow_type'][0])){
                        $option_value = $wp1s_stored_meta_setting['wp1s_arrow_type'][0];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[1];
                        if($cnt != $cnt_num){
                            $style = "style='display:none;'";
                        }else{
                            $style= '';
                        }
                        }
                        ?>
                       <div class="wp1s-arrow-common" id="wp1s-arrow-demo-<?php echo esc_attr($cnt); ?>" <?php if(isset($style)) echo esc_attr($style);?>>
                           <h4><?php _e('Navigation Arrow Style','wp-1-slider');?> <?php echo esc_attr($cnt);?> <?php _e('Preview','wp-1-slider');?></h4>
                               <img src="<?php echo WP1S_IMG_DIR.'/arrow/arrow-type-'.$cnt.'.png' ?>"/>
                        </div>
                     
                   <?php  } ?> 
                </div>
            </div>
        </div>
        
    </div>

    </div>

    <!-- end of arrow setting -->   
</div>
