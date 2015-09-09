<?php
$input_fields = [
    'fname' => 'First Name',
    'mname' => 'Middle Name',
    'lname' => 'Last Name',
    'title' => 'Title',
    'email' => 'Email',
    'phone' => 'Phone',
    'facebook' => 'Facebook URL',
    'linkedin' => 'LinkedIn URL'
]
?>

<?php
$active = 'form';
include('header.php');
?>

<!--Facebook JS SDK Setup-->
<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            getInfo();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            console.log('Please log into the app');
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            console.log('Please log into Facebook');
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '770856626367341',
            cookie     : true,  // enable cookies to allow the server to access
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.4' // use version 2.4
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function getInfo() {
        FB.api('/me?fields=id, first_name, middle_name, last_name, email', function (response) {
                var info =
                {
                    fname: response.first_name,
                    mname: response.middle_name,
                    lname: response.last_name,
                    email: response.email,
                    facebook: "https://www.facebook.com/" + response.id
                }
                for (var key in info) {
                    if ($('#' + key).val().length == 0) {
                        $('#' + key).val(info[key]);
								$('#' + key).parent().addClass('input--filled');
                    }
                }
            }
        )
    }
</script>

<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 77z94v2w9emnix
    onLoad: onLinkedInLoad
</script>

<script type="text/javascript">

    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    // Handle the successful return from the API call
    function onSuccess(data) {
        var info = {
            fname: data.firstName,
            lname: data.lastName,
            email: data.emailAddress,
            title: data.headline,
            linkedin: data.publicProfileUrl
        }
        console.log(info);
        for (var key in info) {
            if ($('#' + key).val().length == 0) {
                $('#' + key).val(info[key]);
					  $('#' + key).parent().addClass('input--filled');
            }
        }
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        IN.API.Raw("/people/~:(first-name,last-name,email-address,headline,public-profile-url)?format=json").result(onSuccess).error(onError);
    }

</script>

<div class="wrapper form-wrapper">
	<section id="form-outer">
		<div class="form-header">
			<div class="ad-logo">
				<?php include('svg/ad-logo.svg'); ?>
			</div>
			<h1>Email Footer Generator</h1>
			<div class="autocomplete-btns">
				<div class="row">
					<div class="col-sm-12">
						<div class="autocomplete-prompt">
							Sign in to autocomplete
						</div>
						<div class="btn-wrapper">
							<div class="fb-btn">
								<fb:login-button data-size="medium" scope="public_profile,email" onlogin="checkLoginState();" data-auto-logout-link="true"></fb:login-button>
							</div>
							<div class="li-btn">
								<script type="in/Login"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-content">
			<form id="form" method="post" action="results.php" >
				<div class="row">
					
					<?php foreach ($input_fields as $key => $value): ?>
					<div class="<?php
						if($key == 'title') { echo('col-md-12'); }
						elseif($key == 'email' || $key == 'phone' || $key == 'facebook' || $key == 'linkedin') { echo('col-md-6'); }
						else { echo('col-md-4'); }
					?>">
						<span class="input input--hoshi">
							<input class="input__field input__field--hoshi" type="text" id="<?php echo $key ?>"
                           name="<?php echo $key ?>" />
							<label class="input__label input__label--hoshi" for="<?php echo $key ?>">
								<span class="input__label-content input__label-content--hoshi">
									<?php echo $value ?>
									<?php if(!($key == 'mname' || $key == 'facebook' || $key == 'linkedin')): ?>
									<span class="icon-required">*</span>
									<?php endif ?>
									<?php if ($key == 'facebook' || $key == 'linkedin'): ?>
                              <i class="fa fa-question-circle fa-lg tooltip"
                                 title="<?php echo "If you don&apos;t have a " . $value . " page, please leave this field blank. The " . $value . " link on your footer will be replaced with the link to Ankit Designs&apos;s " . $value . " page." ?>"></i>
                            <?php endif ?></span>
								</span>
							</label>
						</span>
					</div>
					<?php endforeach ?>
					
					<div class="col-md-12">
						<div class="form-btns">
							<button type="submit">Generate</button>
							<button type="reset">Clear</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>

<?php include('footer.php'); ?>