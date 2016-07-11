$=jQuery.noConflict();

$(document).ready( function(){
	
	var mediaUploader,
		widget_counter;
	$(document).on('click','.upload_image_button',function(e) {	

		e.preventDefault();

		widget_counter = e.currentTarget.attributes.getNamedItem("data-counter").value;

		
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
			$('#upload_image_button_id-'+widget_counter).prev().val(attachment.url);
			$('#preview-picture-id-'+widget_counter).css('width','50px');
			$('#preview-picture-id-'+widget_counter).css('height','50px');
			$('#preview-picture-id-'+widget_counter).css('background-image','url(' + attachment.url + ')');
			$('#preview-picture-id-'+widget_counter).css('background-repeat','no-repeat');
			$('#preview-picture-id-'+widget_counter).css('background-size','contain');

			$('#upload_image_button_id-'+widget_counter).val('Nahradiť Obrázok');
			if(!$('#remove_image_button_id-'+widget_counter).length){
				$('#upload_image_button_id-'+widget_counter).after('<input id="remove_image_button_id-'+widget_counter+'" class="remove_image_button button button-secondary" data-counter="'+widget_counter+'" type="button" value="Zmazať Obrázok" />');
			}
		});
		
		mediaUploader.open();

					
	});
	
	
	$(document).on('click','.remove_image_button',function(e) {


		e.preventDefault();
		widget_counter_delete = e.currentTarget.attributes.getNamedItem("data-counter").value
		var answer = confirm("Are you sure you want to remove your Profile Picture?");
		if( answer == true ){

			$('#upload_image_button_id-'+widget_counter_delete).prev().val('');

			if($('#preview-picture-id-'+widget_counter_delete).length){

				$('#preview-picture-id-'+widget_counter_delete).removeAttr('style');

				$('#remove_image_button_id-'+widget_counter_delete).remove();
				$('#upload_image_button_id-'+widget_counter_delete).val('Nahrať Obrázok');
			}
			
		}
		return;
	});
	
});