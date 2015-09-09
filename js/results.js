// Email Footer Generator Scripts


 
 $(function() {
	if ($('#results-tabs').length) {
		$('#results-tabs').tabtab({
			tabMenu: '.tab-menu',             // direct container of the tab menu items
			tabContent: '.tab-content',       // direct container of the tab content items
			startSlide: 1,                    // starting slide on pageload
			arrows: false,                       // keyboard arrow navigation
			dynamicHeight: true,                // if true the height will dynamic and animated.
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
				$('#copy-button').html("Copied!");
				// document.selection.empty();
				window.getSelection().removeAllRanges();
		  } );
    } );
     
});





// COPY CODE FUNCTION
function copyCode() {
		$('#footer-download').val(($('#results-visual').html()));
  }

//Grab the footer code and append it to the XMP tag
$(document).ready(function(){
	$('#code-snippet').text($('#results-visual').html());
});