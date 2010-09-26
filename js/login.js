function InitNotifications () {
	$('.message .close').click(function () {
		$(this).parent().fadeOut('slow');
		return false;
	});
}
