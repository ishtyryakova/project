$("#menu li a").bind({
	'mouseover': function(){
		var body = $(this).attr('data-body');
		console.log(body);
		$('#title').text(body).css('color', 'blue');
		
	},
	'mouseout': function(){
		$("#title").text('Welcome to our web-site!').css('color', 'black');
		
	},	
	
	
	'click': function(e){
		e.preventDefault();
		var data = $(this).attr('href');
			if ($('.modal-window').length ==0)	{
				var background = $('<div>').addClass('background').appendTo('body')
								.click(function(){
				
									$('.modal-window').remove();
									$('.background').remove();
				
								}); 
								
				var modal = $('<div>').addClass('modal-window').appendTo(background);
				var url = $(this).attr('href');
						$.ajax({
							url: "ajax.php",
							type: "post",
							data: "url="+url,
							success: function(data)	{
								modal.append(data);
								
							},
							error: function(msg)	{
								modal.append(msg);
							}
							
							
							
							
						})
				
				$('<a>').attr('href','#')
					.addClass('modal-close-btn')
					.html('&times;')
					.click(function(e){
				
						e.preventDefault();
						$('.modal-window').remove();
						$('.background').remove();
				
				
					})
					.appendTo(modal);
					
					
				
			}
		
			else {
				var modal = $('.modal-window');
				
		
			}
			
			
		
	}
	
});



