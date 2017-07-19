jQuery(document).ready(function($){

  var mediaUploader;

  	var postId   = $('#post_ID').val();

  		var $gallery = $('.vp-pfui-gallery-picker .gallery');
  		var what = '';



  $( ".vp-pfui-gallery-button" ).each(function(index) {
    $(this).on("click", function(e){
            e.preventDefault();

            var stripped = $(this).attr('data-name').replace(' ', '_')+"_images";

            $('.vp-active-gallery').attr('data-active', stripped.toLowerCase());

            $gallery = $('.' + stripped.toLowerCase());

            console.log($gallery);
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose ' + $(this).attr('data-name') + ' Images',
		library: {
		type: 'image'
				},
      button: {
      text: 'Choose Image'
    }, multiple: true });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var selection = mediaUploader.state().get('selection');


      			selection.each(function(model) {
				var thumbnail = model.attributes.url;
				if( model.attributes.sizes !== undefined && model.attributes.sizes.thumbnail !== undefined )
					thumbnail = model.attributes.sizes.thumbnail.url;
				 what = $('.vp-active-gallery').attr('data-active');
				$('.'+what).append('<span data-id="' + model.id + '" title="' + model.attributes.title + '"><img src="' + thumbnail + '" alt="" /><span class="close">x</span></span>');
				$gallery.trigger('update');
			});



     // $('#image-url').val(attachment.url);
    });
    mediaUploader.open();

    });
});





	$gallery.on('update', function(){
		

		var ids = [];
		$(this).find('> span').each(function(){
			ids.push($(this).data('id'));
		});
		$('[name="'+what+'"]').val(ids.join(','));
	});

	$gallery.sortable({
		placeholder: "vp-pfui-ui-state-highlight",
		revert: 200,
		tolerance: 'pointer',
		stop: function (event, ui) {
			var getthegal = ui.item.attr('data-gallery');

		var ids = [];
		$('.'+getthegal).find('> span').each(function(){
			ids.push($(this).data('id'));
		});
		$('[name="'+getthegal+'"]').val(ids.join(','));


			
		}
	});

	$gallery.on('click', 'span.close', function(e){
		$(this).parent().fadeOut(200, function(){
			//console.log($(this).attr('data-id'));
			$(this).remove();

			var getthename = $(this).attr('data-gallery');
			var ids = [];
			$('.'+getthename).find('> span').each(function(){
			ids.push($(this).data('id'));
			});



			$('[name="'+getthename+'"]').val(ids.join(','));
			//$gallery.trigger('update');
		});
	});


});