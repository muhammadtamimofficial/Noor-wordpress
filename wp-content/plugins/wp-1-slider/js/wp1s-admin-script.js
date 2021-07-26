
(function ($) {
   
/**
* Add Slide functionality
*/
  $(function () {
    //for image slide
    $('.wp1s-add-meta-button').click(function () 
    {
      var clone_html = $( ".wp1s-add-form-slide-ref" ).html();
      var slide_count = $('#wp1-slide-count').val();
      slide_count++;
      var slide_key = 'slide_'+slide_count;
      $('.wp1-clone-temp').html(clone_html);
      $('.wp1-clone-temp *[name]').each(function(){
        var name = $(this).attr('name');
        var name = name.replace('slide_key',slide_key);
        $(this).attr('name',name);
      })
      var actual_html = $('.wp1-clone-temp').html();
      $( ".wp1s-option-wrap" ).append(actual_html);
      $('#wp1-slide-count').val(slide_count); 
    });
   
    $("body").on('click','.wp1s-delete-meta-button',function(){
      $(this).closest(".wp1s-add-meta-slide").remove();
    });
        //toggle form
    $(".wp1s-pager-slideToggle").click(function () {
      $('.wp1s-pager-slideTogglebox').slideToggle();
    });
    $(".wp1s-caption-slideToggle").click(function () {
      $('.wp1s-caption-slideTogglebox').slideToggle();
    });
    $(".wp1s-arrow-slideToggle").click(function () {
      $('.wp1s-arrow-slideTogglebox').slideToggle();
    });
    $(".wp1s-slider-slideToggle").click(function () {
      $('.wp1s-slider-slideTogglebox').slideToggle();
    });
    $(".wp1s-video-slideToggle").click(function () {
      $('.wp1s-video-slideTogglebox').slideToggle();
    });
      //image upload
    $('body').on('click', '.wp1s_slider_image_url_button', function(e){
      e.preventDefault();
      var btnClicked = $( this );
      var image = wp.media({ 
      title: 'Insert Slider Image',
      button: {text: 'Insert Slider Image'},
      library: { type: 'image'},
      multiple: false
      }).open()
    .on('select', function(e){
      var uploaded_image = image.state().get('selection').first();
      console.log(uploaded_image);
      var image_url = uploaded_image.toJSON().url;
      $( btnClicked ).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-slider-image' ).attr('src',image_url);
      $( btnClicked ).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-slider-image-url' ).val(image_url);
        if( $( btnClicked ).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-slider-image-url' ).val(image_url)!=''){
          $('.wp1s-image-preview').show(); 
        }
        else{
          $('.wp1s-image-preview').hide(); 
        }           
      });
    });
    //video upload
    $('body').on('click', '.wp1s-slider-video-url-button', function(e){
      e.preventDefault();
      var btnClicked = $( this );
      var video = wp.media({ 
      title: 'Insert Slider Video',
      button: {text: 'Insert Slider Video'},
      library: { type: 'video'},
      multiple: false
      }).open()
      .on('select', function(e){
        var uploaded_video = video.state().get('selection').first();
        console.log(uploaded_video);
        var video_url = uploaded_video.toJSON().url;
        $( btnClicked ).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-slider-video' ).attr('src',video_url);
        $( btnClicked ).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-slider-video-url' ).val(video_url);          
      });
    });
    //caption type change
    $(".wp1s-caption-type").change(function(){
      if($(this).val()=="type-1")
        {    
          $(".wp1s-wrapper-caption-type-1").show();
          $(".wp1s-wrapper-caption-type-2 ,.wp1s-wrapper-caption-type-3,.wp1s-wrapper-caption-type-4").hide();
         }
      else if($(this).val()=="type-2")
        {
          $(".wp1s-wrapper-caption-type-2").show();
          $(".wp1s-wrapper-caption-type-1,.wp1s-wrapper-caption-type-3,.wp1s-wrapper-caption-type-4").hide();
        }
      else if($(this).val()=="type-3")
      {
        $(".wp1s-wrapper-caption-type-3").show();
        $(".wp1s-wrapper-caption-type-1,.wp1s-wrapper-caption-type-2,.wp1s-wrapper-caption-type-4").hide();
      }
      else 
      {
        $(".wp1s-wrapper-caption-type-4").show();
        $(".wp1s-wrapper-caption-type-1 ,.wp1s-wrapper-caption-type-2,.wp1s-wrapper-caption-type-3").hide();
      }
    });
    var selected_caption= $( ".wp1s-caption-type option:selected" ).val();
      if(selected_caption=="type-1")
      {    
        $(".wp1s-wrapper-caption-type-1").show();
        $(".wp1s-wrapper-caption-type-2 ,.wp1s-wrapper-caption-type-3,.wp1s-wrapper-caption-type-4").hide();
      }
      else if(selected_caption=="type-2")
      {
        $(".wp1s-wrapper-caption-type-2").show();
        $(".wp1s-wrapper-caption-type-1,.wp1s-wrapper-caption-type-3,.wp1s-wrapper-caption-type-4").hide();
      }
      else if(selected_caption=="type-3")
      {
        $(".wp1s-wrapper-caption-type-3").show();
        $(".wp1s-wrapper-caption-type-1,.wp1s-wrapper-caption-type-2,.wp1s-wrapper-caption-type-4").hide();
      }
      else 
      {
        $(".wp1s-wrapper-caption-type-4").show();
        $(".wp1s-wrapper-caption-type-1 ,.wp1s-wrapper-caption-type-2,.wp1s-wrapper-caption-type-3").hide();
      }
      //pager type change
    $(".wp1s-pager-type").change(function(){
      if($(this).val()=="thumbnail")
      {    
        $(".wp1s-navigation-dot-wrapper").hide();
        $(".wp1s-navigation-thumb-wrapper").show();
      }

      else if($(this).val()=="dot")
      {
        $(".wp1s-navigation-dot-wrapper").show();
        $(".wp1s-navigation-thumb-wrapper").hide();
      }
      else 
      {
        $(".wp1s-navigation-dot-wrapper").hide();
        $(".wp1s-navigation-thumb-wrapper").hide();
      }
    });
      var selected_pager= $( ".wp1s-pager-type option:selected" ).val();
        if(selected_pager=="thumbnail")
        {    
         $(".wp1s-navigation-dot-wrapper").hide();
          $(".wp1s-navigation-thumb-wrapper").show();
        }
        else if(selected_pager=="dot")
        {
          $(".wp1s-navigation-dot-wrapper").show();
          $(".wp1s-navigation-thumb-wrapper").hide();
        }
        else
        {
          $(".wp1s-navigation-dot-wrapper").hide();
          $(".wp1s-navigation-thumb-wrapper").hide();
        }
    //pager dot type change
    $(".wp1s-dot-pager-type").change(function(){
      if($(this).val()=="type-1")
        {    
          $(".wp1s-pager-dot-type-1").show();
          $(".wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
        }
        else if($(this).val()=="type-2")
          {
            $(".wp1s-pager-dot-type-2").show();
            $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
          }
        else if($(this).val()=="type-3")
          {
            $(".wp1s-pager-dot-type-3").show();
            $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-4").hide();
          }
        else if($(this).val()=="type-4")
          {
            $(".wp1s-pager-dot-type-4").show();
            $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3").hide();
          
          }

        else
        {
          $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
        }
    });
      var selected_dot= $( ".wp1s-dot-pager-type option:selected" ).val();
        if(selected_dot=="type-1")
        {    
          $(".wp1s-pager-dot-type-1").show();
          $(".wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
        }
        else if(selected_dot=="type-2")
        {
          $(".wp1s-pager-dot-type-2").show();
          $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
        }
        else if(selected_dot=="type-3")
        {
          $(".wp1s-pager-dot-type-3").show();
          $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-4").hide();
        }
        else if(selected_dot=="type-4")
        {
          $(".wp1s-pager-dot-type-4").show();
          $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3").hide();
        }

        else
        {
          $(".wp1s-pager-dot-type-1,.wp1s-pager-dot-type-2,.wp1s-pager-dot-type-3,.wp1s-pager-dot-type-4").hide();
        }
          //checked for caption widget
    $('.wp1s-show-caption-widget').click(function (){
      if($(this).is(':checked'))
      {
        $(this).closest('.wp1s-option-field').find('.wp1s-show-caption-widget-value').val('1');
      }
      else
      {
        $(this).closest('.wp1s-option-field').find('.wp1s-show-caption-widget-value').val('0');
      }
    });
             //checked for thumb widget
    $('.wp1s-show-thumb-widget').click(function (){
      if($(this).is(':checked')){
        $(this).closest('.wp1s-option-field').find('.wp1s-show-thumb-widget-value').val('1');
      }
      else
      {
        $(this).closest('.wp1s-option-field').find('.wp1s-show-thumb-widget-value').val('0');
      }

    });

    $('body').on('click','.wp1s-slide-show-button',function(){
      if ($(this).is(':checked')) { 
        $(this).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-button-wrapper' ).show();
      }
      else{
        $(this).closest('.wp1s-add-slide-option-wrap').find( '.wp1s-button-wrapper' ).hide();
      } 
    }); 
    //shadow type change
    $(".wp1s-show-shadow").change(function(){
      if($(this).val()=="true")
      {    
        $(".wp1s-shawod-wrapper").show();
      }
      else 
      {
        $(".wp1s-shawod-wrapper").hide();
      }
    });
      var selected_shadow= $( ".wp1s-show-shadow option:selected" ).val();
        if(selected_shadow=="true")
        {    
          $(".wp1s-shawod-wrapper").show();
        }
        else 
        {
        $(".wp1s-shawod-wrapper").hide();
        }

    //caption type preview
    $(".wp1s-caption-common").first().addClass( "caption-active" );
    $('.wp1s-caption-type').on('change', function() {
      var template_value = $(this).val();
      var array_break = template_value.split('-');
      var current_id = array_break[1];
      $('.wp1s-caption-common').hide();  
      $('#wp1s-caption-demo-'+current_id).show();
    });
      var cption_view = $( ".wp1s-caption-type option:selected" ).val();
      var array_break = cption_view.split('-');
      var current_id1 = array_break[1];
      $('.wp1s-caption-common').hide();
      $('#wp1s-caption-demo-'+current_id1).show();

        //arrow type preview
    $(".wp1s-arrow-common").first().addClass( "arrow-active" );
    $('.wp1s-arrow-type').on('change', function() {
      var template_value = $(this).val();
      var array_break = template_value.split('-');
      var current_id = array_break[1];
      $('.wp1s-arrow-common').hide();  
      $('#wp1s-arrow-demo-'+current_id).show();
    });
      var arrow_view = $( ".wp1s-arrow-type option:selected" ).val();
      var array_break = arrow_view.split('-');
      var current_id1 = array_break[1];
      $('.wp1s-arrow-common').hide();
      $('#wp1s-arrow-demo-'+current_id1).show();
      //end of arrow type preview

    //dot pager type preview
    $(".wp1s-dot-pager-common").first().addClass( "dot-pager-active" );
    $('.wp1s-dot-pager-type').on('change', function() {
      var template_value = $(this).val();
      var array_break = template_value.split('-');
      var current_id = array_break[1];
      $('.wp1s-dot-pager-common').hide();  
      $('#wp1s-dot-pager-demo-'+current_id).show();
    });

      var pager_view = $( ".wp1s-dot-pager-type option:selected" ).val();
      var array_break = pager_view.split('-');
      var current_id1 = array_break[1];
      $('.wp1s-dot-pager-common').hide();
      $('#wp1s-dot-pager-demo-'+current_id1).show();
      // end of dot pager preview

    //thumbnail preview
    $(".wp1s-thumb-pager-common").first().addClass( "thumb-pager-active" );
    $('.wp1s-thumb-pager-type').on('change', function() {
      var template_value = $(this).val();
      var array_break = template_value.split('-');
      var current_id = array_break[1];
      $('.wp1s-thumb-pager-common').hide();  
      $('#wp1s-thumb-pager-demo-'+current_id).show();
    });

      var thumb_view = $( ".wp1s-thumb-pager-type option:selected" ).val();
      var array_break = thumb_view.split('-');
      var current_id1 = array_break[1];
      $('.wp1s-thumb-pager-common').hide();
      $('#wp1s-thumb-pager-demo-'+current_id1).show();
      //shadow type preview
      $(".wp1s-shadow-common").first().addClass( "shadow-active" );
    $('.wp1s-shadow-type').on('change', function() {
      var template_value = $(this).val();
      var array_break = template_value.split('-');
      var current_id = array_break[1];
      $('.wp1s-shadow-common').hide();  
      $('#wp1s-shadow-demo-'+current_id).show();
    });
      var shadow_view = $( ".wp1s-shadow-type option:selected" ).val();
      var array_break = shadow_view.split('-');
      var current_id1 = array_break[1];
      $('.wp1s-shadow-common').hide();
      $('#wp1s-shadow-demo-'+current_id1).show();
      //set default thumbnail width and height value
    $('.wp1s-thumb-pager-type').on('change', function() {
      var pager_def = $(this).val();
        if(pager_def == "type-1" || pager_def == "type-2" || pager_def == "type-3" || pager_def == "type-4"){
          $('.wp1s-thumb-height').val(83);
        }
        else
        {
          $('.wp1s-thumb-height').val(150);
        }
    });
      //set default caption template value
    $('.wp1s-caption-type').on('change', function() {
      var caption = $(this).val();
        if(caption == "type-1"){
          $('.wp1s-title-font-size').val(20);
          $('.wp1s-description-font-size').val(40);
        }
        else if(caption == "type-2")  {
          $('.wp1s-title-font-size').val(50);
          $('.wp1s-description-font-size').val(20);
        }
        else if(caption == "type-3")  {
          $('.wp1s-title-font-size').val(60);
          $('.wp1s-description-font-size').val(24);
        }
        else{
          $('.wp1s-title-font-size').val(52);
          $('.wp1s-description-font-size').val(18);
        }
    });
    $('body').on('click','.wp1s-slide-show-button',function(){
      if($(this).is(':checked')){
        $(this).closest('.wp1s-option-field').find('.wp1s-slide-show-button-value').val('1');
      }else
      {
        $(this).closest('.wp1s-option-field').find('.wp1s-slide-show-button-value').val('0');
      }
    });
    //video type
    $("body").on('change','.wp1s-upload-video-type',function(){
      if($(this).val()=="youtube_url")
      {    
        $(this).closest('.wp1s-add-slide-option-wrap').find(".wp1s-youtube-url").show();
        $(this).closest('.wp1s-add-slide-option-wrap').find(".wp1s-upload-own").hide();
      }
    
      else{
        $(this).closest('.wp1s-add-slide-option-wrap').find(".wp1s-upload-own").show();
        $(this).closest('.wp1s-add-slide-option-wrap').find(".wp1s-youtube-url").hide();
        }
    });
    var selected_video= $( ".wp1s-upload-video-type option:selected" ).val();
      if(selected_video=="youtube_url")
      {    
        $(".wp1s-youtube-url").show();
        $(".wp1s-upload-own").hide();
      }
      else 
      {
        $(".wp1s-youtube-url").hide();
        $(".wp1s-upload-own").show();
      }
       //for sorting all slides
      $('.wp1s-option-wrap').sortable({
           containment: "parent" 
        });

  });

}(jQuery));