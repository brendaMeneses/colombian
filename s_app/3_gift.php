<?php
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
if (isset($_GET['success']) && !empty($_GET['success']))
    $successUpdate = $_GET['success'];

include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";
?>

    <meta http-equiv="refresh" content="5">

<?php
// GET THE DETAILS OF THE CURRENT STUDENT BASED ON THE GIVE SID IN THE LINK

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$result =
    mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, currents, currentc, interestc, interestm, how, id, startdate, time, registerstatus, language, gender, EstimatedTimeToVisit, epsuggestschool1, epsuggestschool2, epsuggestschool3, epsuggestschool4, beforeep, followup, memoforschool, epmemo, application, visatype, visaexpire, gift FROM students WHERE email='$whoStudent' ")
or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

// kevin
// mysqli_query($con, "UPDATE students SET link = CONCAT(\"<a href='http://soledu.net/studyfair_app/followup/?sid=\",email,\"' target='_blank'><img src='http://iaemember.com/studyfair_app/image/followup_school_apply.png' style='width: 80px;'/></a>\")");

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
        $gift = $row[28];
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
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-handshake-o" aria-hidden="true"></i> Waiting</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/2_booking.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-comments-o" aria-hidden="true"></i> Booking</a>
                </div>
                <!-- <div class="btn-group" role="group">
                    <button type="submit" name="Gift" id="Gift" class="btn btn-primary" style="font-size: 11px;"><i
                                class="fa fa-gift" aria-hidden="true"></i> Gift
                    </button>
                </div> -->
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/4_event.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/5_special.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Special</a>
                </div>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 20px;"></div>

            <div class="entryRow">
                <?php if ($registerstatus == "Pre-register") {
                    echo '<h4 style="color: #3d81bb;">Free Gift for Pre-registration</h4>';
                    if ($gift == "Yes") {
                        echo '<img src="student/image/pre_received.jpg" style="width: 100%;"/>';
                    } else {
                        echo '<img src="student/image/pre_available.jpg" style="width: 100%;"/>';
                    }
                } else {
                    echo '<h4 style="color: #3d81bb;">Free Gift for Site-registration</h4>';
                    if ($gift == "Yes") {
                        echo '<img src="student/image/site_received.jpg" style="width: 100%;"/>';
                    } else {
                        echo '<img src="student/image/site_available.jpg" style="width: 100%;"/>';
                    }
                }
                ?>

            </div>


            <div class="entryRow" style="letter-spacing: -0.2px; font-size: 11px; font-weight: 300;">
                <dl>
                    <dt>How can I receive the free gift?</dt>
                    <dd>This image is not valid to claim the free gift to any other shop. You need to exchange to the
                        real coupon for the free gift. Please come to the gift area to exchange your free gift.
                    </dd>
                </dl>
                <dl>
                    <dt>What does "Pre-registration" mean?</dt>
                    <dd>This is for students who have registered on our study fair beforehand.</dd>
                </dl>
                <dl>
                    <dt>What does "Site-registration" mean?</dt>
                    <dd>This is for students who have registered on the event date.</dd>
                </dl>
                <dl>
                    <dt>Why the free gift is different?</dt>
                    <dd>We would like to give more benefits to the students who applied before the event day. If you
                        want to get more benefits, we highly recommend you to apply our event beforehand.
                    </dd>
                </dl>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 10px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">Lucky Draw Winner</h4>
                <table class="table table-striped" style="text-align: center; font-size: 9pt; letter-spacing: -0.3px;"
                       valign="middle">
                    <thead>
                    <th style="text-align: center;">Order<br/>#</th>
                    <th style="text-align: center;">Gift<br/>Name</th>
                    <th style="text-align: center;">Winner<br/>Name</th>
                    <th style="text-align: center;">Winner Mobile<br/>(last 4 digits)</th>
                    </thead>

                    <tr>
                        <?php
                        $luckyDraw = mysqli_query($con, "SELECT id, giftName, winnerName, winnerMobile FROM studyfair_luckydraw ORDER BY id")
                        or die(mysqli_error());

                        while ($luckyDrawLow = mysqli_fetch_array($luckyDraw)) {
                        $giftID = $luckyDrawLow[0];
                        $giftName = $luckyDrawLow[1];
                        $giftWinner = $luckyDrawLow[2];
                        $giftWinMobile = $luckyDrawLow[3];
                        ?>
                    <tr>
                        <td><?php echo $giftID; ?></td>
                        <td><?php echo $giftName; ?></td>
                        <td><?php echo $giftWinner; ?></td>
                        <td><?php echo substr($giftWinMobile, 6, 4); ?></td>
                    </tr>
                    <?php

                    }
                    ?>
                    </tr>
                </table>
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
?>