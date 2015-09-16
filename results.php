<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: index.php');
}
?>

<?php
$active = 'results';
include('header.php');
?>

    <section id="results">
        <div class="results-ad-logo">
            <?php include('svg/ad-logo.svg'); ?>
        </div>
        <div class="results-header">
            <h1>Email Footer Results for <span><?php echo $_POST['fname'] ?></span></h1>

            <h3 class="redo-btn"><a href="index.php">Redo</a></h3>
        </div>
        <div class="wrapper">
            <div id="results-tabs">
                <ul class="tab-menu">
                    <li class="tab-menu-item">
                        <a href="#">Results</a>
                    </li>
                    <li class="tab-menu-item">
                        <a href="#">Gmail</a>
                    </li>
                    <li class="tab-menu-item">
                        <a href="#">Mac Mail</a>
                    </li>
                    <li class="tab-menu-item">
                        <a href="#">Outlook</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <!--Result Tab-->
                    <div class="tab-content-item">
                        <div class="row">
                            <div class="col-md-12 col-results-visual">
                                <div id="results-visual" class="results-visual" contenteditable="false">
                                    <table style="margin-top:40px;margin-left:20px;margin-bottom:30px;width:95%"
                                           border="0">
                                        <tr height="60">
                                            <td width="60">
                                                <img src="http://www.ankitdesigns.com/email_sig/images/logo_2.jpg"
                                                     alt="Ankit Designs Logo" width="60" height="60"/>
                                            </td>
                                            <td>
			 <span
                 style="font-family:'Trebuchet MS',helvetica,San-Serif;font-size:11px;color:#888888;line-height:20px;">
				  <b style="color:#d40404;text-transform:uppercase;letter-spacing:2px"><?php echo $_POST['fname'] ?><?php
                      if ($_POST['mname'] != '') {
                          echo ' &nbsp;' . $_POST['mname'];
                      }
                       ?>&nbsp;<?php echo $_POST['lname'] ?></b><?php
                 if ($_POST['title'] != '') {
                     echo '/&nbsp;' . $_POST['title'];
                 } ?>
			 </span>
                                                <br/>
			 <span style="font-family:'Trebuchet MS',helvetica,San-Serif;font-size:11px;color:#b2b2b2;">
				  <b style="color:#888888">e:</b>&nbsp;&nbsp;<a href="mailto:<?php echo $_POST['email'] ?>"
                                                                title="email <?php echo $_POST['fname'] ?>"
                                                                style="text-decoration:none; border-bottom:1px dotted #b2b2b2;color:#b2b2b2"><?php echo $_POST['email'] ?></a>&nbsp;&nbsp;<b
                     style="color:#888888">t:</b>&nbsp;&nbsp;<a href="tel:<?php echo $_POST['phone'] ?>"
                                                                style="text-decoration:none; border-bottom:1px dotted #b2b2b2;color:#b2b2b2"><?php echo $_POST['phone'] ?></a>
			 </span>
                                                <br/>
                                                <span
                                                    style="font-family:'Trebuchet MS',helvetica,San-Serif;font-size:11px;color:#b2b2b2; text-decoration:none;"><b
                                                        style="color:#888888">a:</b>&nbsp;&nbsp;<a
                                                        href="https://goo.gl/maps/6tp9j" title="View On Google Maps"
                                                        style="text-decoration:none; border-bottom:1px dotted #b2b2b2;color:#b2b2b2">2355
                                                        Derry Road East, Unit 38, Mississauga, ON L5S 1V6</a></span>
                                                <br/>
			 <span
                 style="font-family:'Trebuchet MS',helvetica,San-Serif;font-size:11px;color:#b2b2b2; text-decoration:none;">
				  <b style="color:#888888">w:</b>&nbsp;&nbsp;<a href="http://www.ankitdesigns.com"
                                                                title="Visit Ankit Designs Website"
                                                                style="text-decoration:none; border-bottom:1px dotted #888888;color:#b2b2b2">www.ankitdesigns.com</a>
			 </span>
                                                <br/>
			 <span
                 style="font-family:'Trebuchet MS',helvetica,San-Serif;font-size:11px;color:#888888;line-height: 40px;"><a
                     href="<?php
                     if ($_POST['facebook'] == '') {
                         echo 'http://www.facebook.com/viewankitdesigns';
                     } else {
                         echo $_POST['facebook'];
                     }
                     ?>" title="Like On Facebook"><img
                         src="http://www.ankitdesigns.com/email_sig/images/fb.jpg"/></a>&nbsp;&nbsp;<a href="<?php
                 if ($_POST['linkedin'] == '') {
                     echo 'http://www.linkedin.com/company/ankit-designs';
                 } else {
                     echo $_POST['linkedin'];
                 }
                 ?>" title="Connect On Linked In"><img src="http://www.ankitdesigns.com/email_sig/images/li.jpg"/></a>
			 </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <a class="results-dl-btn">
                                    <form action="download.php" method="post">
                                        <input type="hidden" name="footer-download" id="footer-download">
                                        <input type="hidden" name="username" value="<?php
                                        echo $_POST['fname'] . $_POST['lname']
                                        ?>">
                                        <input type="submit" formtarget="_blank" class="dl-btn"
                                               value="Download source code" onclick="copyCode();">
                                    </form>
                                </a>
                            </div>
                            <div class="col-md-12">

                                <div class="copy-button-wrapper">
                                    <div id="copy-button-prompt">Successfully copied!</div>
                                    <button id="copy-button" data-clipboard-target="hidden-code-snippet"
                                            title="Click to copy me.">Copy to Clipboard
                                    </button>
                                </div>

                                <div class="results-code" contentEditable="true">
                                    <!--                                    <xmp class="prettyprint" id="code-snippet"-->
                                    <!--                                         onclick="document.execCommand('selectAll',false,null)">-->
                                    <!--                                    </xmp>-->
                                    <xmp class="prettyprint" id="code-snippet"></xmp>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--GMail Steps-->
                    <div class="tab-content-item steps">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="steps-needed">
                                    <h3>Things you'll need</h3>
                                    <ul>
                                        <li>HTML email signature file</li>
                                        <li>A Gmail account</li>
                                        <li>Safari or Chrome browser</li>
                                    </ul>
                                    <div class="steps-hint">
                                        <i class="fa fa-picture-o"></i> View a screenshot
                                    </div>
                                </div>
                            </div>
                            <div id="gmail-instructions" class="col-md-9">
                                <div class="step-item" id="gmail-caption-1">
                                    <h2 class="gallery-link" data-src="img/gmail/step1.jpg" data-sub-html="#gmail-caption-1">
													Step One: Copying HTML Signature <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>
                                        Open up yoursignature.html file in Safari and 'Select All' contents on the page
                                        (Command + A) and copy (Command + C).
                                    </p>
                                </div>
                                <div class="step-item" id="gmail-caption-2">
                                    <h2 class="gallery-link" data-src="img/gmail/step2.jpg" data-sub-html="#gmail-caption-2">
													Step Two: Open Gmail Settings <i class="fa fa-picture-o"></i></a>
												</h2>

                                    <p>In Gmail, Click the Machine Bearing icon on the upper right hand side. Then
                                        select 'Settings' from the dropdown menu.</p>
                                </div>
                                <div class="step-item" id="gmail-caption-3">
                                    <h2 class="gallery-link" data-src="img/gmail/step3.jpg" data-sub-html="#gmail-caption-3">
													Step Three: Paste HTML Signatue and Save <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>Under the General tab scroll down until you see the Signature section. Click
                                        inside the signature box and paste the copied email signature (Command + V).
                                        Once you have pasted the footer, click 'Save Changes' at the bottom of the
                                        page.</p>
                                </div>
                                <div class="step-item" id="gmail-caption-4">
                                    <h2 class="gallery-link" data-src="img/gmail/step4.jpg" data-sub-html="#gmail-caption-4">
													Step Four: Check installation <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>After saving your changes, click the 'Compose' button to check to see that your
                                        email footer is showing up properly. Take a break and reward yourself for
                                        setting up your email footer!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Mac Mail Steps-->
                    <div class="tab-content-item steps">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="steps-needed">
                                    <h3>Things you'll need</h3>
                                    <ul>
                                        <li>HTML email signature file</li>
                                        <li>A Mac Running OSX</li>
                                        <li>Mac Mail</li>
                                        <li>Safari</li>
                                    </ul>
                                    <div class="steps-hint">
                                        <i class="fa fa-picture-o"></i> View a screenshot
                                    </div>
                                </div>
                            </div>
                            <div id="mac-instructions" class="col-md-9">
                                <div class="step-item" id="mac-caption-1">
                                    <h2 class="gallery-link" data-src="img/macmail/step1.jpg" data-sub-html="#mac-caption-1">
													Step One: Copying HTML Signature <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>Open up yoursignature.html file in Safari and go to Safari > Right Click > Choose
                                        Show Page Source.
                                        Select all of the HTML code and copy (Command + C)
                                    </p>
                                </div>
                                <div class="step-item" id="mac-caption-2">
                                    <h2 class="gallery-link" data-src="img/macmail/step2.jpg" data-sub-html="#mac-caption-2">
													Step Two: Create Placeholder Signature in Mail <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>In Mail.app, open Preferences and click on the Signatures tab. There you will see
                                        3 columns, the 1st one are your mail box accounts, the 2nd one are your custom
                                        signatures and the 3rd column is the signature detail preview. Create a new
                                        placeholder signature by clicking on the plus icon at the bottom of the 2nd
                                        column and name it. Drag your new signature from column 2 into your preferred
                                        mail box in column 1. Select your preferred mail box in the first column and go
                                        down to Choose Signature at the bottom. In the drop down menu, find and select
                                        your new signature. Note: At this point you will not see your HTML signature
                                        design on the 3rd column yet. Leave the 3rd column as is for now. Close window
                                        and quit Mail.app.</p>
                                </div>
                                <div class="step-item" id="mac-caption-3">
                                    <h2 class="gallery-link" data-src="img/macmail/step3.jpg" data-sub-html="#mac-caption-3">
													Step Three: Open The  Signatures Folder <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>On Finder’s top navigation, drop down the Go menu and than hold down the Option
                                        key to see the hidden Library folder. Once the Library folder is open, go to:
                                        ~/Library/Mail/V2/MailData/Signatures/.</p>
                                </div>
                                <div class="step-item" id="mac-caption-4">
                                    <h2 class="gallery-link" data-src="img/macmail/step4.jpg" data-sub-html="#mac-caption-4">
													Step Four: Update Placeholder Signature <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>Find the signature that you just added (a file ending with a .mailsignature
                                        extension). If there are multiple files in the folder, switch to list view. The
                                        signature that you just added in Mail.app should be the file that with the most
                                        recent modified date. When you have located the .mailsignature file, open it
                                        with TextEdit. You may see some metadata info on top and some HTML code below
                                        it. Delete all the HTML code (highlighted in picture below) and leave the
                                        metadata info untouched. Under the metadata info, paste the HTML code of your
                                        email signature (Read bottom of Step 1 for instructions on how to reveal and
                                        copy the HTML code of your email signature design with Safari). Hit Save and
                                        quit TextEdit.
                                    </p>
                                </div>
                                <div class="step-item" id="mac-caption-5">
                                    <h2 class="gallery-link" data-src="img/macmail/step5.jpg" data-sub-html="#mac-caption-5">
													Step Five: Lock Updated Signature File – IMPORTANT <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>This step must be followed correctly in order for this signature to work or else
                                        Mail.app will use the original version of the signature instead of the new one.
                                        Locate the .mailsignature file that you just updated in Finder again. Press
                                        Command+I or right click on file to Get Info. In the Get Info window, mark the
                                        Locked check box.</p>
                                </div>
                                <div class="step-item" id="mac-caption-6">
                                    <h2 class="gallery-link" data-src="img/macmail/step6.jpg" data-sub-html="#mac-caption-6">
													Step Six: Check Installation <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>Restart Mail.app. Your new custom signature should appear automatically when you
                                        click on Compose Mail. If not, make sure you have followed Step 2 correctly.
                                        Links will not work and the images if any may not show when composing an email.
                                        But the links will work and the images will show on the receiving end if the
                                        source locations are correct. Compose and send yourself a test email with your
                                        new signature selected. If the images show, the links working and everything
                                        looks as it should, then you have done this correctly. Good Job!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Outlook Steps-->
                    <div class="tab-content-item steps">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="steps-needed">
                                    <h3>Things you'll need</h3>
                                    <ul>
                                        <li>HTML Email Signature File</li>
                                        <li>A Mac Running OSX</li>
                                        <li>Microsoft Outlook</li>
                                        <li>Google Chrome</li>
                                    </ul>
                                    <div class="steps-hint">
                                        <i class="fa fa-picture-o"></i> View a screenshot
                                    </div>
                                </div>
                            </div>
                            <div id="outlook-instructions" class="col-md-9">
                                <div class="step-item" id="outlook-caption-1">
                                    <h2>Step One</h2>

                                    <p>Open up yoursignature.html file in Chrome (if your default browser is set to
                                        another browser, right click the file and choose open with)</p>
                                </div>
                                <div class="step-item" id="outlook-caption-2">
                                    <h2 class="gallery-link" data-src="img/outlook/step2.jpg" data-sub-html="#outlook-caption-2">
													Step Two <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>With the browser open with your signature displaying properly, press Command + A
                                        on your keyboard to “Select All” and then press Command + C to copy the
                                        signature.</p>
                                </div>
                                <div class="step-item" id="outlook-caption-3">
                                    <h2>Step Three</h2>

                                    <p>Open Outlook > Select “Preferences” > and “Signature”</p>
                                </div>
                                <div class="step-item" id="outlook-caption-4">
                                    <h2 class="gallery-link" data-src="img/outlook/step4.jpg" data-sub-html="#outlook-caption-4">
													Step Four <i class="fa fa-picture-o"></i>
												</h2>
                                    <p>Create a new signature by clicking the “+” button. If there is content in the
                                        window on the right after you’ve clicked the “+” button, delete it all.
                                        *Normally it will display your first and last name in plain text, just delete
                                        it.</p>
                                </div>
                                <div class="step-item" id="outlook-caption-5">
                                    <h2 class="gallery-link" data-src="img/outlook/step5.jpg" data-sub-html="#outlook-caption-5">
													Step Five <i class="fa fa-picture-o"></i>
												</h2>

                                    <p>Press Command + V on your keyboard to paste in your signature that you copied
                                        from your browser.</p>
                                </div>
                                <div class="step-item" id="outlook-caption-6">
                                    <h2>Step Six</h2>

                                    <p>Set your “Default Signatures” and you’re DONE!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="hidden-results">
        <xmp id="hidden-code-snippet">
        </xmp>
    </div>

<?php include('footer.php'); ?>