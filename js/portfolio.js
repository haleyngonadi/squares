jQuery(document).ready(function($){

  var mediaUploader;

  	var postId   = $('#post_ID').val(),
	    $gallery = $('.vp-pfui-gallery-picker .gallery');


  $( ".vp-pfui-gallery-button" ).each(function(index) {
    $(this).on("click", function(e){
            e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose ' + $(this).attr('data-gallery') + ' Images',
		library: {
		type: 'image'
				},
      button: {
      text: 'Choose Image'
    }, multiple: true });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var selection = mediaUploader.state().get('selection');
      console.log(selection);


      			selection.each(function(model) {
				var thumbnail = model.attributes.url;
				if( model.attributes.sizes !== undefined && model.attributes.sizes.thumbnail !== undefined )
					thumbnail = model.attributes.sizes.thumbnail.url;
				$gallery.append('<span data-id="' + model.id + '" title="' + model.attributes.title + '"><img src="' + thumbnail + '" alt="" /><span class="close">x</span></span>');
				$gallery.trigger('update');
			});



     // $('#image-url').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();

    });
});

/*	$gallery.on('update', function(){
		var ids = [];
		$(this).find('> span').each(function(){
			ids.push($(this).data('id'));
		});
		$('[name="_format_gallery_images"]').val(ids.join(','));
	});

	$gallery.sortable({
		placeholder: "vp-pfui-ui-state-highlight",
		revert: 200,
		tolerance: 'pointer',
		stop: function () {
			$gallery.trigger('update');
		}
	});

	$gallery.on('click', 'span.close', function(e){
		$(this).parent().fadeOut(200, function(){
			$(this).remove();
			$gallery.trigger('update');
		});
	});*/


});