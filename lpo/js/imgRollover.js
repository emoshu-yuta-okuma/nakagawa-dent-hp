$(document).ready( function() {
	function FlashBlock() {
		$("#photoList li img").hover(
			function(){$(this).fadeTo(100, 0.5);return false;},
			function(){$(this).fadeTo(100, 1);return false;}
		);
	}
	$(FlashBlock);
});
