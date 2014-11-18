/* Copyright 2014 Zachary Doll */
jQuery(document).ready(function($) {

	function GetDiscussionPreview() {
		var url = gdn.url('/post/discussion');
		
		$.ajax({
			url: url,
			global: false,
			type: "GET",
			data: {DeliveryType: 'VIEW'},
			success: function(Data){
        $('#NewDiscussionPreview').html(Data);
        $('#DiscussionForm form').attr('action', '#');
			}
		});
	}

  GetDiscussionPreview();
  
  $(document).on('click', '#WipeTick input', function() {
    $('#WipeWarning').toggleClass('Hidden');
  });
});