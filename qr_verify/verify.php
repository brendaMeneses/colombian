<?php
session_start();

require_once "inc/db.inc.php"; // for server
//require_once "../inc/db.inc.php"; // for local

$student = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $student = $_GET['sid'];

//$domain = "http://localhost/SOLStudyFair/";
$domain = "http://soledu.net/sf/sol-214266/";

if (isset($_SESSION["authen"])) {
    if ($_SESSION["authen"] == "kevin-26688") {

        $result = mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, checkinTime FROM students WHERE email='$student' ") or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
        $num_rows = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $stdFamilyName = $row[0];
            $stdFirstName = $row[1];
            $stdEmail = $row[2];
            $stdPhone = $row[3];
            $stdNationality = $row[4];
            $checkinTime = $row[5];
        }
    }
} else {
    echo '<script>location.replace("authen.php?sid=' . $student . '");</script>';
}
?>
<html>
<head>
    <title>SOL Edu Scanner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link href="sol.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="http://soledu.net/wp-content/uploads/2018/01/soledu-logo-outline.png" alt="" width="114">
    <div style="padding-bottom: 20px;">
        <div>
            <h1 class="h3 mb-3 font-weight-normal">
                <?php echo $stdFirstName . " " . $stdFamilyName ?>
            </h1>
        </div>
        <div>
            <?php echo $stdPhone ?>
        </div>
        <div>
            <?php echo $stdEmail ?>
        </div>
        <div>
            <?php echo $stdNationality ?>
        </div>
    </div>
    <div class="form-group">
        <a href="<?php echo $domain . 'checkin/searchResult.php?sid=' . $student ?>"
           class="btn btn-lg btn-primary btn-block" target="_blank">Checkin</a>
        <a href="<?php echo $domain . 'waiting/schoolBooking.php?sid=' . $student ?>"
           class="btn btn-lg btn-secondary btn-block" target="_blank">Additional Booking</a>
        <a href="<?php echo $domain . 'application/studentDetail.php?sid=' . $student ?>"
           class="btn btn-lg btn-danger btn-block" target="_blank">Online Application</a>
        <a href="<?php echo $domain . 'giftarea/checkout.php?sid=' . $student ?>"
           class="btn btn-lg btn-success btn-block" target="_blank">Gift Area</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
