<?php
require "mailer/PHPMailerAutoload.php";
require("mailer/class.phpmailer.php");

$to = $_POST['email'];
$name =$_POST['firstName'];

$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host     = "mail.iaemember.com"; // SMTP server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Port     = 26;                    // set the SMTP port for the GMAIL server
$mail->Username = "sms@iaemember.com"; // SMTP account username
$mail->Password = "sms007!";        // SMTP account password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From="info@iaemember.com";
$mail->FromName="SOL Edu";
$mail->Sender="sms@iaemember.com";
$mail->AddReplyTo("no_reply@iaeoz.com", "Please Don't Reply");

$mail->addAddress($to,$name);     // Add a recipient
$mail->isHTML(true);                    // Set email format to HTML

$mail->Subject = 'Thank you your Pre-Registration has been accepted';

//Okay what do you want to appear if it displays the HTML version?
$mail->Body    = 

"
<html>
<head>
<style type=\"text/css\">

.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important;
	clear:both!important;
}

.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}

.clear { display: block; clear: both; }


</style>
</head>

<body>
  <div class=\"container\">
	<div class=\"content\">
		<center>
			<img src=\"http://www.iaemember.com/studyfair2015mar/img/pre_regi_thank_you.png\" />
			
			<h3>This is a great opportunity for getting information about Australia's schools.</h3>
			<h3>If you want to apply for a school on the day, please bring</h3></br></br>	
		
			<img src=\"http://www.iaemember.com/studyfair2015mar/img/pre_regi_passport.png\" alt=\"passport\"/>
			<img src=\"http://www.iaemember.com/studyfair2015mar/img/pre_regi_transcript.png\" alt=\"transcript\"/>
			<img src=\"http://www.iaemember.com/studyfair2015mar/img/pre_regi_certification.png\" alt=\"certification\"/>

		
			<h3 style=\"letter-spacing: -1pt;\">Why do you have to come to us on <strong>20th of August (WED) 11am - 6pm</strong>?</h3>
		
			<p>- To get more Scholarship opportunities from Universities up to $ 65,000*</br> 
				- Free Application Fee for all schools including Universities<br>
				- Lowest Price guaranteed + Free English School Weeks<br>
				- Professional advice about PR from a Migration Agent for free<br>
				* Conditions Apply
			</p>
		</center>
    </div>
   </div>
</body>
</html>

";


//Okay what do you want to appear if it displays the plain text version?
$mail->AltBody =
"
Thank you your Pre-Registration has been accepted

Why do you have to come to us on <strong>20th of August (WED) 11am - 6pm
-To get more Scholarship opportunities from Universities up to $ 65,000*
-Free Application Fee for all schools including Universities
-Lowest Price guaranteed + Free English School Weeks
-Professional advice about PR from a Migration Agent for free


* Conditions Apply
";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}