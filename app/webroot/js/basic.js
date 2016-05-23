
jQuery.noConflict();
jQuery(document).ready(function () {
	jQuery('a.b_sendtofriend').click(function (e) {
		e.preventDefault();
		jQuery('#basic-modal-content').modal();
	});
	
		jQuery('a.b_send_inquiry' ).click(function (e) {
		e.preventDefault();
		jQuery('#basic-modal-content2').modal();
	});
		
		jQuery('p.links a.a_image_sort').click(function (e) {
		e.preventDefault();
		jQuery('#basic-modal-content3').modal();
	});
	
});