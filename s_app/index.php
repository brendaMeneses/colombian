<?php
$whoStudent = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
if (isset($_GET['success']) && !empty($_GET['success']))
    $successUpdate = $_GET['success'];

include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";
?>

<?php
// GET THE DETAILS OF THE CURRENT STUDENT BASED ON THE GIVE SID IN THE LINK

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$result =
    mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, currents, currentc, interestc, interestm, how, id, startdate, time, registerstatus, language, gender, EstimatedTimeToVisit, epsuggestschool1, epsuggestschool2, epsuggestschool3, epsuggestschool4, beforeep, followup, memoforschool, epmemo, application, visatype, visaexpire FROM students WHERE email='$whoStudent' ")
or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

// kevin
//mysqli_query($con, "UPDATE students SET link = CONCAT(\"<a href='http://soledu.net/studyfair_app/followup/?sid=\",email,\"' target='_blank'><img src='http://iaemember.com/studyfair_app/image/followup_school_apply.png' style='width: 80px;'/></a>\")");

if ($num_rows < 1) {
    die ("<div class='container'><div class='alert alert-error'><STRONG>STUDENT NOT FOUND!</STRONG></div></div>");
} else {

    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $stdFamilyName = $row[0];
        $stdFirstName = $row[1];
        $stdEmail = $row[2];
        $stdPhone = $row[3];
        $stdNationality = $row[4];
        $currents = $row[5];
        $currentc = $row[6];
        $interestc = $row[7];
        $interestm = $row[8];
        $how = $row[9];
        $stdID = $row[10];
        $startdate = $row[11];
        $time = $row[12];
        $registerstatus = $row[13];
        $language = $row[14];
        $gender = $row[15];
        $EstimatedTimeToVisit = $row[16];
        $ep1 = $row[17];
        $ep2 = $row[18];
        $ep3 = $row[19];
        $ep4 = $row[20];
        $beforeep = $row[21];
        $followup = $row[22];
        $memoforschool = $row[23];
        $epmemo = $row[24];
        $application = $row[25];
        $visatype = $row[26];
        $visaexpire = $row[27];
    }
}


?>

    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);

        @media (min-width: 1200px) {
            .container-fluid {
                width: 700px !important;
                margin: 0 auto !important;
                padding: 0px !important;
            }

            .container {
                width: 700px !important;
            }

            .no-show, .no-show * {
                visibility: hidden !important;
            }

            body {
                background-color: #white;
            }
        }

        @media only screen and (max-width: 767px) {
            .no-show, .no-show * {
                visibility: hidden !important;
            }
        }
    </style>

    <body>
    <div class="container" style="border: 0;">
        <h3 style="letter-spacing: -1px;"><span
                    style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Edu Study
            Fair
            <small>for <?php echo $stdFirstName; ?> <?php echo $stdFamilyName; ?></small>
        </h3>
    </div>

    <form method="post" class="form-horizontal">
        <div class="container" style="margin-top: -60px;">
            <div class="btn-group btn-group-justified" role="group" aria-label="menu">
                <!-- <div class="btn-group" role="group">
                    <button type="submit" name="Waiting" id="Waiting" class="btn btn-primary" style="font-size: 11px;">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i> Waiting
                    </button>
                </div> -->
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/2_booking.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-comments-o" aria-hidden="true"></i> Booking</a>
                    <!-- <button type="submit" name="Booking" id="Booking" class="btn btn-default" style="font-size: 11px;">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> Booking
                    </button> -->
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/3_gift.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-gift" aria-hidden="true"></i> Gift</a>
                    <!-- <button type="submit" name="Gift" id="Gift" class="btn btn-default" style="font-size: 11px;"><i
                                class="fa fa-gift" aria-hidden="true"></i> Gift
                    </button> -->
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/4_event.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a>
                    <!-- <button type="submit" name="Events" id="Events" class="btn btn-default" style="font-size: 11px;"><i
                                class="fa fa-calendar" aria-hidden="true"></i> Events
                    </button> -->
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/5_special.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Special</a>
                    <!-- <button type="submit" name="Special" id="Special" class="btn btn-default" style="font-size: 11px;">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Special Info
                    </button> -->
                </div>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 10px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">Waiting Area</h4>
                <p style="font-size: 20px; letter-spacing: -0.5px; font-weight: 300;">
                    Hi, <?php echo $stdFirstName; ?></p>
                <p style="font-size: 15px; letter-spacing: -0.3px; font-weight: 300;">Welcome to SOL Edu Study Fair! Our
                    staff will assist you shortly. If you have any question regarding to our study fair, please ask any
                    SOL Edu staff.</p>
            </div>
            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 10px;"></div>

            <div class="entryRow">
                <div class="text-center">
                    <img src="http://soledu.net/qrcode/phpqrcode/qrsol/<?php echo $stdPhone ?>.png"/>
                </div>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 10px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">Your Detail</h4>
                <label for="stdNationality">Nationality</label>
                <input class="form-control" type="text" name="stdNationality" id="stdNationality"
                       value="<?php echo $stdNationality; ?>" readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="stdFirstName">First Name</label>
                <input class="form-control" type="text" name="stdFirstName" id="stdFirstName"
                       value="<?php echo $stdFirstName; ?>" readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="stdLastName">Last Name</label>
                <input class="form-control" type="text" name="stdLastName" id="stdLastName"
                       value="<?php echo $stdFamilyName; ?>" readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $stdEmail; ?>"
                       readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="phone">Mobile Number</label>
                <input class="form-control" type="phone" name="phone" id="phone" value="<?php echo $stdPhone; ?>"
                       readonly="readonly"/>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 10px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">Study Fair Map</h4>
                <p class="help-block">If you want to see the bigger size, please press map to see in pdf version.</p>
                <a href="download/soledu-study-fair-map.pdf" target="_blank">
                    <img src="image/sol-edu-map.jpg" style="width: 100%;"/></a>
            </div>
        </div>
    </form>
    </body>


<?php
include "../inc/footer.inc.php";
?>


<?php
if (isset ($_POST['Waiting'])) {
    echo '<script>location.replace("student/?sid=' . $whoStudent . '");</script>';
}

if (isset ($_POST['Booking'])) {
    echo '<script>location.replace("student/2_booking.php?sid=' . $whoStudent . '");</script>';
}

if (isset ($_POST['Gift'])) {
    echo '<script>location.replace("student/3_gift.php?sid=' . $whoStudent . '");</script>';
}

if (isset ($_POST['Events'])) {
    echo '<script>location.replace("student/4_event.php?sid=' . $whoStudent . '");</script>';
}

if (isset ($_POST['Special'])) {
    echo '<script>location.replace("student/5_special.php?sid=' . $whoStudent . '");</script>';
}
?>