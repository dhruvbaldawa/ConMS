$(document).ready(function () {
	$('#content #resume a').click(function() {  
		$.scrollTo($(this)[0].getAttribute('href'), 1000); 
		return false;   
	});

	$('#toolbar .top a').click(function() {  
		$.scrollTo('#logo', 1000); 
		return false;   
	});	
	$('#toolbar').css({height: 0}).animate({ height: '38' }, 'slow');	
});
