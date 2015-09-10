// Email Footer Generator Scripts


 
 $(function() {
	if ($('#results-tabs').length) {
		$('#results-tabs').tabtab({
			tabMenu: '.tab-menu',             // direct container of the tab menu items
			tabContent: '.tab-content',       // direct container of the tab content items
			startSlide: 1,                    // starting slide on pageload
			// dynamicHeight: true,                // if true the height will dynamic and animated.
			arrows: false,                       // keyboard arrow navigation
			animateHeight:!1,fixedHeight:!1
		});
	}
	
	$('.open-popup-link').magnificPopup({
		type:'inline',
		midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',
		gallery:{
			enabled:true
		}
	 });
	
	// Zero Clipboard
	var client = new ZeroClipboard( document.getElementById("copy-button") );

    client.on( "ready", function( readyEvent ) {
         //alert( "ZeroClipboard SWF is ready!" );

        client.on( "aftercopy", function( event ) {
            //event.target.style.display = "none";
            //alert("Copied text to clipboard: " + event.data["text/plain"] );
				// $('#copy-button').html("Copied!");
				$('#copy-button-prompt').fadeIn().delay(1000).fadeOut();
				// document.selection.empty();
				window.getSelection().removeAllRanges();
		  } );
    } );
     
});





// COPY CODE FUNCTION
function copyCode() {
		$('#footer-download').val(($('#results-visual').html()));
  }