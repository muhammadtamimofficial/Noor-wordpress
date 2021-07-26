<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div  class="wp1s-shortcode-usage-wrapper">
	<ul>
		<li rel="tab-1" class="selected">
			<h4>Shortcode</h4>
			<p>Copy &amp; paste the shortcode directly into any WordPress post or page.</p>
			<textarea style="resize: none;" rows="2" cols="32" readonly="readonly">[wp1s id="<?php echo esc_attr($post->ID); ?>"]</textarea>
		</li>
		<li rel="tab-2">
			<h4>Template Include</h4>
			<p>Copy &amp; paste this code into a template file to include the WP 1 Slider within your theme.</p>
			<textarea style="resize: none;" rows="2" cols="32" readonly="readonly">&lt;?php echo do_shortcode("[wp1s id='<?php echo esc_attr($post->ID); ?>']"); ?&gt;</textarea>
		</li>
	</ul>
</div>					
				