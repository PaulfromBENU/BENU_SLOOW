function toggleMobileSideMenu(menuStatus)
{
	if (menuStatus == 1) {
		$('#side-mobile').css('left', '100vw');
		menuActive = 0;
	} else {
		$('#side-mobile').css('left', '0');
		menuActive = 1;
	}
}

let menuActive = 0;

$(function() {
	$('#mobile-menu-btn').on('click', function() {
		toggleMobileSideMenu(menuActive);
	})
});