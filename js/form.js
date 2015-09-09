$(document).ready(function () {

	// Enable tooltipser
	$('.tooltip').tooltipster();

    //Disable Enter key
    $('html').bind('keypress', function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    $("#clear").click(function () {
        $('form').find("input").val("");
    });

    $("#phone").mask("(999) 999-9999");

    jQuery.validator.addMethod("ankitEmail", function (value, element) {
        return this.optional(element) || /^.+@ankitdesigns.com$/.test(value);
    }, "Please only use ankitdesigns.com email address.");

    jQuery.validator.addMethod("fbDomain", function (value, element) {
        return this.optional(element) || /^https:\/\/www.facebook.com/.test(value);
    }, "Please enter url with facebook.com domain");

    jQuery.validator.addMethod("linkedinDomain", function (value, element) {
        return this.optional(element) || /^https:\/\/www.linkedin.com/.test(value);
    }, "Please enter url with linkedin.com domain");

    jQuery.validator.addMethod("websiteUrl", function (value, element) {
        return this.optional(element) || /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/.test(value);
    }, "Please enter a valid url");

    $("#form").validate({

        //turn debug to true and check console if validation not working properly
        debug: false,
			errorElement: "div",
			// focusCleanup: true,
		  
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true,
                ankitEmail: true
            },
            phone: {
                required: true
            },
            facebook: {
                fbDomain: true
            },
            linkedin: {
                linkedinDomain: true
            },
            website: {
                websiteUrl: true
            }
        },

        messages: {
            fname: {
                required: 'Please enter your first name'
            },
            lname: {
                required: 'Please enter your last name'
            },
            email: {
                required: 'Please enter your email address'
            },
            phone: {
                required: 'Please enter your phone number'
            }
        }
    });
	 
});



// INPUT FIELDS

(function() {
	// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
	if (!String.prototype.trim) {
		(function() {
			// Make sure we trim BOM and NBSP
			var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
			String.prototype.trim = function() {
				return this.replace(rtrim, '');
			};
		})();
	}

	[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
		// in case the input is already filled..
		if( inputEl.value.trim() !== '' ) {
			classie.add( inputEl.parentNode, 'input--filled' );
		}

		// events:
		inputEl.addEventListener( 'focus', onInputFocus );
		inputEl.addEventListener( 'blur', onInputBlur );
	} );

	function onInputFocus( ev ) {
		classie.add( ev.target.parentNode, 'input--filled' );
	}

	function onInputBlur( ev ) {
		if( ev.target.value.trim() === '' ) {
			classie.remove( ev.target.parentNode, 'input--filled' );
		}
	}
})();

// On form clear, remove any filled input classes
$("button[type='reset']").click(function() {
  $('.input').removeClass('input--filled');
});

// END INPUT FIELDS