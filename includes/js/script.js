/* scripts for Open Source High */
 
$('.content_trigger').on('click', function(){
	var url = $(this).attr('href');

  $("#video-modal").fadeIn('medium');
  $("#bg_mask").show();
  $("#modal_close_btn").show(); 

  var video_id = $('.content_trigger').parent().find('.url_id_holder').val();

  $("#video-modal").html("<iframe width='560' height='315' src='https://www.youtube.com/embed/"+video_id+"?autoplay=true' frameborder='0' allowfullscreen></iframe>")
  
  return false;
});

$("#modal_close_btn, #bg_mask").on('click', function() {
  $("#video-modal").html('');
  $("#video-modal").hide();
  $("#bg_mask").fadeOut('medium');
  $("#modal_close_btn").hide(); 	
}); 
