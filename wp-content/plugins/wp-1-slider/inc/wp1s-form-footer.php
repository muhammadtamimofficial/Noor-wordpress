<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="wp1s-add-form-slide-ref" style="display: none;">
<?php global $options,$post;?>
	<div class="wp1s-add-meta-slide">
		<div class="wp1s-add-slide-option-wrap">
    <div class="wp1s-option-wrapper">
       <input type="hidden" class="wp1s-slide-type" name="wp1s_option[slides][slide_key][slide_type]"  value="image"/>
      </div>
	    	<div class="wp1s-option-wrapper">
	        	<label for="wp1s-slide-title" class="wp1s-slide-title"><?php _e( 'Title', 'wp-1-slider' ); ?></label>
	        		<div class="wp1s-option-field">
	            		<input type="text" class="wp1s-slide-title" name="wp1s_option[slides][slide_key][slide_title]"  value=""/>
	                </div>
	        </div> 
	    	<div class="wp1s-option-wrapper">
	        	<label for="wp1s_slide_description" class="wp1s_slide_description"><?php _e( 'Description', 'wp-1-slider' ); ?></label>
	        		<div class="wp1s-option-field">
				      <textarea name="wp1s_option[slides][slide_key][slide_description]"  class="wp-editor-area text-field text-editor" rows="8" cols="20"></textarea>
	        		</div>
	    	</div>
	      	<div class="wp1s-show-slider-image">
	      		<div class="wp1s-option-wrapper">
	       			<label for="wp1s_slider_image" class="wp1s-slider-image"><?php _e( 'Slider Image', 'wp-1-slider' ) ?></label>
	      				<div class="wp1s-option-field">

				    <input type="text" name="wp1s_option[slides][slide_key][slide_image_url]" class="wp1s-slider-image-url" value="" />
	        				<input type="button" class="wp1s_slider_image_url_button"  value="Upload Image" size="25"/>
	        				 
	        					<div class="wp1s-option-field wp1s-image-preview" style="display: none;">
	        						<img  class="wp1s-slider-image" src="" alt=""  height="120" width="150">
	        					</div>
	        			</div>   
	         	</div>
	        </div>
	        <div class="wp1s-option-wrapper">
	        	<label for="wp1s-show-button" class="wp1s-show-button"><?php _e( 'Show Button', 'wp-1-slider' ); ?></label>
	        		<div class="wp1s-option-field">
	        			
	            		<label class="wp1s-button-check"><input type="checkbox" class="wp1s-slide-show-button" ><?php _e( 'Check to show button', 'wp-1-slider' )?></label>
            				<input type="hidden" name="wp1s_option[slides][slide_key][slide_show_button]" class="wp1s-slide-show-button-value" value="0" />
					</div>
	        </div>
	        <div class="wp1s-button-wrapper" style ="display: none;">
	        <div class="wp1s-option-wrapper">
        		<label for="wp1s_slide_button_text" class="wp1s-slide-button"><?php _e( 'Button Text', 'wp-1-slider' ); ?></label>
        	<div class="wp1s-option-field">
            <input type="text" class="wp1s-slide-button" name="wp1s_option[slides][slide_key][slide_button_text]"  value=""/>
                    
        </div>
        </div>
	        <div class="wp1s-option-wrapper">
	        	<label for="wp1s-slide-button" class="wp1s-slide-button"><?php _e( 'Button URL', 'wp-1-slider' ); ?></label>
	        		<div class="wp1s-option-field">
	            		<input type="text" class="wp1s-slide-button" name="wp1s_option[slides][slide_key][slide_button_url]"  value=""/>
	                </div>
	        </div> 
	        </div>
	    <div class="wp1s-delete-meta-wrap">
  		<input type="button" class="button-primary wp1s-delete-meta-button" value="<?php _e( 'Delete', 'wp-1-slider' ); ?>">
          
      </div>
		</div>
	  </div>
  </div>

 
<div class="wp1-clone-temp" style="display:none;"></div>

