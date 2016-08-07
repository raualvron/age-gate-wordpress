jQuery(document).ready(function($){

  $("#group_country").hide();
  $(".country-adv").hide();
  

  if ( $("input[name = 'minimum_age']:checked" ).val() == "all" ) {

    $("#group_country").show();
    $(".country-adv").show();
  } 


  $("input[name = 'minimum_age']").click(function()  {
    
    if( $(this).val() == "all" ) {
      
      $("#group_country").show();
      $(".country-adv").show();
    
    } else {
      
      $("#group_country").hide();
      $(".country-adv").hide();
    
    } 

  });

  var mediaUploader;

  $('#upload-button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image-url').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });

});