<?php
require_once "inc/db.inc.php"; // for hosting
//require_once "../inc/db.inc.php"; // for local

$whoStudent = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$result =
    mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality FROM students WHERE email='$whoStudent'")
or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);
if ($num_rows < 1) {
    die ("<div class='container'><div class='alert alert-error'><STRONG>STUDENT NOT FOUND!</STRONG></div></div>");
} else {
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   //MYSQLI_NUM
        $stdFamilyName = $row[0];
        $stdFirstName = $row[1];
        $stdEmail = $row[2];
        $stdPhone = $row[3];
        $stdNationality = $row[4];

    }
}
?>
<html>
<head>
    <title>Thank you for your pre-registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <style>
        .kv-padding-bottom-20 {
            padding-bottom: 20px;
        }

        .kv-padding-bottom-10 {
            padding-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        h2 {
            font-size: 14px;
            font-weight: bold;
        }

        body {
            font-size: 14px;
            text-align: center;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            line-height: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center text-center" style="padding: 35px 0 0;">
        <div class="col-md-12 col-sm-12">
            <img src="http://soledu.net/wp-content/uploads/2018/01/soledu-logo-outline.png" alt="" width="120">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center" style="padding: 10px 0;">
            <h1>Study Fair 24<sup>th</sup> April 2018</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center kv-padding-bottom-10">
            <h2>Thank you for your event registration</h2>
            <div class="kv-padding-bottom-20">
                We have received all your information.
                SOL Edu Education Counsellors will get in touch with you shortly.
            </div>
            <div>
                Please bring a copy of your QR code that shows as below to the event for registration check in.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center kv-padding-bottom-10">
            <img src="http://soledu.net/qrcode/phpqrcode/qrsol/<?php echo $stdPhone ?>.png"/>
        </div>
    </div>
    <div class="row" style="padding-bottom: 40px;">
        <div class="col-md-12 col-sm-12 text-center kv-padding-bottom-10">
            Please email us at <a href="javascript:void(0);">info@soledu.net</a> for any questions.<br/>
        </div>
        <div class="col-md-12 col-sm-12 text-center">
            We look forward to seeing you on <strong>24<sup>th</sup> April 2018!</strong>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-md-12 col-sm-12 text-center">
            &copy; SOL Edu 2002-2018. Ph: 07 3003 1899
        </div>
    </div>
</footer>
<!--
<h1 style="text-align: center;"><img class="aligncenter wp-image-893"
                                     src="http://iaemember.com/wp-content/uploads/2016/06/tick-300x300.png" alt="tick"
                                     width="75" height="71"/></h1>
<h1 style="text-align: center;"><strong>Thank You</strong></h1>
<p style="text-align: center;">We have received all your information. Our Education Counsellors will get in touch with
    you shortly.</p>
<p style="text-align: center;">The QR code below will be used to check in on study fair. Please save it in your
    phone. </p>
<p style="text-align: center;"><img
            src="http://soledu.net/qrcode/phpqrcode/qrsol/<?php echo $stdPhone ?>.png"/></p>
<p style="text-align: center;">If you have any questions, please contact your Education Counsellor.</p>-->
</body>
</html>