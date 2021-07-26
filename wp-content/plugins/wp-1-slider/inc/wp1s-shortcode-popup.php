<script>
    function InsertContainer() {
        var id = jQuery('#wp1s_insert_slider_id').val();
        window.send_to_editor("[wp1s id='"+id+"']");
        }
</script>
<div id="wp1s_popup_shortcode" style="display:none;">
    <div class="wrap wp1s-doin-shortcode">
        <h3 class="wps-title">Select slider to insert into post</h3>
        <div class="form-group">
            <label  class="control-label"><?php _e('Select slider','wp-1-slider');?></label>
                <select name="wp1s_insert_slider" id="wp1s_insert_slider_id" class="form-control">
                    <?php $slider_id = get_terms('slider_id',array('order'=>'ASC','orderby'=>'id'));
                       $args = array(
                    'post_type'     => 'wp1slider',
                    'post_status'       => 'publish',
                    'posts_per_page'=>  -1
                    );
                    $posts = get_posts( $args );
                    if(!empty($posts))
                    {
                
                        foreach($posts as $post)
                        { 
                        ?>
                            <option value="<?php echo esc_attr($post->ID);?>" <?php if($post->ID==$post->ID){?>selected="selected"<?php }?>><?php echo esc_attr($post->post_title);?></option>
                        <?php 
                        }
                    }$post
                    ?>
                </select>
        </div>
        <div style="padding:15px;">
            <input type="button" class="button-primary" value="Insert Slider" onclick="InsertContainer();"/>&nbsp;&nbsp;&nbsp;
            <a class="button" href="#" onclick="tb_remove();
                            return false;">Cancel</a>
        </div>
    </div>
</div>
