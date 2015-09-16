// Email Footer Generator Scripts


$(function () {
    if ($('#results-tabs').length) {
        $('#results-tabs').tabtab({
            tabMenu: '.tab-menu',             // direct container of the tab menu items
            tabContent: '.tab-content',       // direct container of the tab content items
            startSlide: 1,                    // starting slide on pageload
            // dynamicHeight: true,                // if true the height will dynamic and animated.
            arrows: false,                       // keyboard arrow navigation
            animateHeight: !1, fixedHeight: !1
        });
    }
	 
	 /* --------------- Light Gallery  --------------- */

     $("#gmail-instructions").lightGallery({
			selector: '.gallery-link',
			loop: false,
			download: false,
		});
	  $("#mac-instructions").lightGallery({
			selector: '.gallery-link',
			loop: false,
			download: false,
		}); 
	  $("#outlook-instructions").lightGallery({
			selector: '.gallery-link',
			loop: false,
			download: false,
		}); 

	 
	/* --------------- Page Loader --------------- */
	
	if ($('#page-loader').length) {
		$('#page-loader').delay(300).fadeOut(1000);
	}



});


// COPY CODE FUNCTION
function copyCode() {
    $('#footer-download').val(($('#results-visual').html()));
}

$(document).ready(function () {
    //Grab the footer code and append it to the XMP tag
    var footer = $.trim($('#results-visual').html());
    $('xmp').text(footer);

    // Zero Clipboard
    var client = new ZeroClipboard(document.getElementById("copy-button"));
    client.on("ready", function (readyEvent) {
        console.log( "ZeroClipboard SWF is ready!" );

        client.on("aftercopy", function (event) {
            //event.target.style.display = "none";
            //alert("Copied text to clipboard: " + event.data["text/plain"] );
            // $('#copy-button').html("Copied!");
            $('#copy-button-prompt').fadeIn().delay(1000).fadeOut();
            // document.selection.empty();
            window.getSelection().removeAllRanges();
        });
    });
});