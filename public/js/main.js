(function($){
	
	$(document).ready(function(){
		
		$('#generate').click(function(){
			$.ajax({
			  url: APP_URL  + "/generate/password",
			  data: $('#data-wrapper').serialize(),
			  method: "POST",
			  dataType: "JSON",
			  success : function(data){
					if (typeof(data.error) != 'undefined')
					{
						alert(data.error);
						return;
					}
				  $('.stong-password').html(data.result);
			  }
			});
		})
		
		$('#lorem').click(function(){
			$.ajax({
			  url: APP_URL  + "/generate/lorem",
			  data: $('#lorem-wrapper').serialize(),
			  method: "POST",
			  dataType: "JSON",
			  success : function(data){
					if (typeof(data.error) != 'undefined')
					{
						alert(data.error);
						return;
					}
				  $('.lorem').show().html(data.result);
			  }
			});
		})

		$('#users').click(function(){
			$.ajax({
			  url: APP_URL  + "/generate/users",
			  data: $('#users-wrapper').serialize(),
			  method: "POST",
			  dataType: "JSON",
			  success : function(data){
					if (typeof(data.error) != 'undefined')
					{
						alert(data.error);
						return;
					}
				  $('.users').show().html(data.result);
			  }
			});
		})		
		
	})
})(window.jQuery);