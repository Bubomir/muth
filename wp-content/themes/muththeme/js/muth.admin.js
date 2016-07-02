jQuery(document).ready( function($){
	
	var mediaUploader;
	$('#bubo').on('click',function(e) {
		console.log('cl');
	});

	$('.upload_image_button').on('click',function(e) {
		
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}
		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('.upload_image_button').prev().val(attachment.url);
			$('.preview-picture').css('width','50px');
			$('.preview-picture').css('height','50px');
			$('.preview-picture').css('background-image','url(' + attachment.url + ')');
			$('.preview-picture').css('background-repeat','no-repeat');
			$('.preview-picture').css('background-size','contain');
		});
		
		mediaUploader.open();
		
	});
	
	$('.remove_image_button').on('click',function(e){
		e.preventDefault();
		var answer = confirm("Are you sure you want to remove your Profile Picture?");
		if( answer == true ){
			$('.upload_image_button').prev().val('');
			if($('.preview-picture').length){
				$('.preview-picture').remove();
				$('.alignright').submit();
			}
			
			//$('.sunset-general-form').submit();
		}
		return;
	});
	
});