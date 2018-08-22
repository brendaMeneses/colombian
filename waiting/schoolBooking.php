<?php

$schoolBooked = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
if (isset($_GET['success']) && !empty($_GET['success']))
    $schoolBooked = $_GET['success'];

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
//mysqli_query($con, "UPDATE students SET link = CONCAT(\"<a href='http://soledu.net/studyfair_app/followup/?sid=\",email,\"' target='_blank'><img src='http://soledu.net/studyfair_app/image/followup_school_apply.png' style='width: 80px;'/></a>\")");

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
            width: 1060px !important;
            margin: 0 auto !important;
            padding: 0px !important;
        }

        .container {
            width: 1060px !important;
        }

        .no-show, .no-show * {
            visibility: hidden !important;
        }

        body {
            background-color: #FFF;
        }
    }

    @media only screen and (max-width: 767px) {
        .no-show, .no-show * {
            visibility: hidden !important;
        }
    }

    @media print {
        @page {
            size: 210mm 297mm;
        }

        html, body {
            font-family: arial, serif;
            font-size: 12pt;
            background: #FFF;
        }

        table, th, td {
            border: 1px solid black;
            border-spacing: 0px;
            margin-bottom: 10px;
        }

        th, td {
            padding: 10px;
        }

        .no-print, .no-print * {
            display: none !important;
        }

        .print {
            font-size: 16pt;
        }

        hr {
            display: block;
            height: 1px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 1px #aaa;
        }
    }
</style>

<body>
<?php include "../inc/navigation.php"; ?>
<!-- Form start -->
<form method="post" class="form-horizontal">
    <div class="container no-print" style="border: 0;">
        <h3 style="letter-spacing: -1px;"><span
                    style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Study
            Fair
            <small>School Booking</small>
            <button type="submit" id="sendSMS" name="sendSMS" class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"
                                                                                                aria-hidden="true"></i>
                Re-send Link
            </button>
            <button type="submit" id="print" name="print" class="btn btn-success btn-xs"
                    onclick="window.print();return false"><i class="fa fa-print" aria-hidden="true"></i> Print
            </button>
        </h3>
    </div>
    <div class="container no-print" style="margin-top: -60px;">
        <?php if ($schoolBooked == "yes") { ?>
            <div class="entryRow" style="background-color: #2a5d89; color: white; text-align: center; padding: 10px;">
                <h3 style="letter-spacing: -1px; margin: 0; font-weight: 300; margin-bottom: 10px;"><i
                            class="fa fa-check-circle-o" aria-hidden="true"></i> All Done!
                    <strong><?php echo $stdFirstName; ?></strong> has been successfully booked.</h3>
                <button type="submit" name="goBack" id="goBack" class="btn btn-info btn-sm btn-block"
                        style="height: 50px;"><i class="fa fa-undo" aria-hidden="true"></i> Go back to help another
                    students
                </button>
            </div>
        <?php } ?>
        <h4 style="color: #3d81bb;">Personal Info</h4>
        <?
        if ($beforeep == "No EP") {
            ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong>Important!</strong> This is the first time for this student to join our event. Please promote
                the events with our student app.
            </div>
            <?
        }
        ?>

        <div class="entryRow ">
            <label for="stdFirstName">Student Name</label><br/>
            <div class="col-xs-6" style="padding: 0;">
                <input class="form-control" type="text" name="stdFirstName" id="stdFirstName"
                       value="<?php echo $stdFirstName; ?>" readonly="readonly"/>
                <p class="help-block">First Name</p>
            </div>
            <div class="col-xs-6" style="padding: 0;">
                <input class="form-control" type="text" name="stdFamilyName" id="stdFamilyName"
                       value="<?php echo $stdFamilyName; ?>" readonly="readonly"/>
                <p class="help-block">Last Name</p>
            </div>
        </div>
        <div class="entryRow">
            <label for="visatype">Visa Type</label>
            <input class="form-control" type="text" name="visatype" id="visatype" value="<?php echo $visatype; ?>"
                   readonly="readonly"/>
        </div>
        <div class="entryRow">
            <label for="visaexpire">Visa expire date</label>
            <input class="form-control" type="text" name="visaexpire" id="visaexpire" value="<?php echo date('d/m/Y', strtotime($visaexpire)) ; ?>"
                   readonly="readonly"/>
        </div>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 20px;"></div>

        <div class="entryRow">
            <h4 style="color: #3d81bb;">Educational Information</h4>
            <div class="col-xs-6" style="padding: 0; margin: 0;">
                <label for="currentc">Current Course</label>
                <input class="form-control" type="text" name="currentc" id="currentc" value="<?php echo $currentc; ?>"
                       readonly="readonly"/>
            </div>
            <div class="col-xs-6" style="padding: 0; margin: 0;">
                <label for="currents">Current School</label>
                <input class="form-control" type="text" name="currents" id="currents" value="<?php echo $currents; ?>"
                       readonly="readonly"/>
            </div>
        </div>

        <div class="entryRow">
            <div class="col-xs-6" style="padding: 0; margin: 0;">
                <label for="interestc">Interested Course/Visa</label>
                <input class="form-control" type="text" name="interestc" id="interestc"
                       value="<?php echo $interestc; ?>" readonly="readonly"/>
            </div>
            <div class="col-xs-6" style="padding: 0; margin: 0;">
                <label for="interestm">Interested Major</label>
                <input class="form-control" type="text" name="interestm" id="interestm"
                       value="<?php echo $interestm; ?>" readonly="readonly"/>
            </div>
        </div>

        <div class="entryRow">
            <label for="startdate">Expected Start Date</label>
            <input class="form-control" type="text" name="startdate" id="startdate" value="<?php echo $startdate; ?>"
                   readonly="readonly"/>
        </div>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 20px;"></div>

        <div class="entryRow">
            <div class="col-xs-6" style="padding: 0;">
                <h4 style="color: #3d81bb;">Follow Up</h4>
                <div class="entryRow">
                    <label for="beforeep">Previous Staff Name</label>
                    <input class="form-control" type="text" name="beforeep" id="beforeep"
                           value="<?php echo $beforeep; ?>" readonly="readonly"/>
                </div>

                <div class="entryRow">
                    <label for="followup">Followed by</label>
                    <input class="form-control" type="text" name="followup" id="followup"
                           value="<?php echo $followup; ?>" readonly="readonly"/>
                </div>
            </div>
            <div class="col-xs-6" style="padding: 0;">
                <h4 style="color: #3d81bb;">Application Status</h4>
                <div class="entryRow">
                    <label for="application">University / VET</label>
                    <input class="form-control" type="text" name="application" id="application"
                           value="<?php echo $application; ?>" readonly="readonly"/></div>
                <div class="entryRow">
                    <label for="application">ELICOS</label><br/>
                    <?php
                    $elicos_applied = mysqli_query($con, "SELECT epName FROM students_applied WHERE email='$whoStudent'") or die(mysqli_error());
                    $elicos_applied_num = mysqli_num_rows($elicos_applied);

                    while ($elicos_a = mysqli_fetch_array($elicos_applied)) {
                        $elicos_a_name = $elicos_a[0];
                        if ($elicos_a_name == "ALS-B7eDe") {
                            $elicos_applied_als = 1;
                        }
                        if ($elicos_a_name == "Browns-38Fed") {
                            $elicos_applied_browns = 1;
                        }
                        if ($elicos_a_name == "Embassy-fiEde") {
                            $elicos_applied_embassy = 1;
                        }
                        if ($elicos_a_name == "ILSC-biEDe") {
                            $elicos_applied_ilsc = 1;
                        }
                        if ($elicos_a_name == "CTI-4igjA") {
                            $elicos_applied_cti = 1;
                        }
                        if ($elicos_a_name == "QAT-gueEd") {
                            $elicos_applied_qat = 1;
                        }
                        if ($elicos_a_name == "LEXIS-dkAda") {
                            $elicos_applied_lexis = 1;
                        }
                        if ($elicos_a_name == "Others-49b2a") {
                            $elicos_applied_other = 1;
                        }
                    }


                    // ALS Application
                    if (!empty($elicos_applied_als)) {
                        echo '<img src="image/application_icons/school icons_als_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/als-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_als_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }

                    // Browns Application
                    //if(!empty($elicos_applied_browns)){
                    //	echo '<img src="image/application_icons/school icons_browns_on.png" style="max-width: 60px; margin: 2px;" /> <span style="font-size:8pt;">Already Applied</span><br />';
                    //}
                    //else{
                    //	echo '<a href="http://iaemember.com/studyfair/school-application-form-browns/?url='.$actual_link.'&firstName='.$stdFirstName.'&lastName='.$stdFamilyName.'&email='.$stdEmail.'&mobile='.$stdPhone.'&nationality='.$stdNationality.'&ep='.$beforeep.'&gender='.$gender.'&stdID='.$stdID.'&language='.$language.'"><img src="image/application_icons/school icons_browns_off.png" style="max-width: 60px; margin: 2px;" /></a> <span style="font-size:8pt;">Hasn\'t applied yet</span><br />';
                    //}

                    // Embassy Application
                    if (!empty($elicos_applied_embassy)) {
                        echo '<img src="image/application_icons/school icons_embassy_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/embassy-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_embassy_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }

                    // ILSC Application
                    if (!empty($elicos_applied_ilsc)) {
                        echo '<img src="image/application_icons/school icons_ilsc_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/ilsc-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_ilsc_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }

                    // QAT Application
                    if (!empty($elicos_applied_qat)) {
                        echo '<img src="image/application_icons/school icons_qat_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/qat-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_qat_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }

                    // CTI Application
                    if (!empty($elicos_applied_cti)) {
                        echo '<img src="image/application_icons/school icons_cti_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/cti-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_cti_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }

                    /*// LEXIS Application
                    if (!empty($elicos_applied_lexis)) {
                        echo '<img src="image/application_icons/school icons_lexis_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/studyfair/school-application-form-lexis/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_lexis_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }*/

                    // Other ELICOS
                    if (!empty($elicos_applied_other)) {
                        echo '<img src="image/application_icons/school icons_other_on.png" style="max-width: 60px; margin: 2px;" />';
                    } else {
                        echo '<a href="http://soledu.net/other-application-form/?url=' . $actual_link . '&firstName=' . $stdFirstName . '&lastName=' . $stdFamilyName . '&email=' . $stdEmail . '&mobile=' . $stdPhone . '&nationality=' . $stdNationality . '&ep=' . $beforeep . '&gender=' . $gender . '&stdID=' . $stdID . '&language=' . $language . '&from=EP"><img src="image/application_icons/school icons_other_off.png" style="max-width: 60px; margin: 2px;" /></a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 20px;"></div>

        <div class="entryRow">
            <h4 style="color: #3d81bb;">Current Booking</h4>

            <?php
            // GET LIST OF PREVIOUS REGISTRATIONS FOR THE SELECTED STUDENT
            $prev = mysqli_query($con, "SELECT epName, cnslDate FROM std_eps WHERE emailMD5='$whoStudent' ORDER BY cnslDate")
            or die(mysqli_error());
            $prev_num = mysqli_num_rows($prev);

            while ($prevEps = mysqli_fetch_array($prev)) {
                $prevEpName = $prevEps[0];
                $prevCnslDate = $prevEps[1];
                ?>
                <span class="recentEpDate"><a target="_blank"
                                              href="helper/helper_list.php?EPname=<?php echo $prevEpName; ?>"><?php echo substr($prevEpName, 0, -6); ?></a>
					@ <?php echo $prevCnslDate; ?></span>

                <?php

            }
            ?>
        </div>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 20px;"></div>

        <div class="entryRow">
            <h4 style="color: #3d81bb;">Counselling Booking</h4>
            <label for="ep1">Counselling School 1</label>
            <?php include "../inc/list_Booking_Schoool1.php"; ?>
            <input type="hidden" name="previous_ep1" id="previous_ep1" value="<?php echo $ep1; ?>"/>
        </div>

        <div class="entryRow">
            <label for="ep2">Counselling School 2</label>
            <?php include "../inc/list_Booking_Schoool2.php"; ?>
            <input type="hidden" name="previous_ep2" id="previous_ep2" value="<?php echo $ep2; ?>"/>
        </div>

        <?php if (!empty($ep2)) { ?>
            <div class="entryRow">
                <label for="ep3">Counselling School 3</label>
                <?php include "../inc/list_Booking_Schoool3.php"; ?>
                <input type="hidden" name="previous_ep3" id="previous_ep3" value="<?php echo $ep3; ?>"/>
            </div>
        <?php } ?>

        <?php if (!empty($ep3)) { ?>
            <div class="entryRow">
                <label for="ep4">Additional Booking</label>
                <?php include "../inc/list_Booking_Schoool4.php"; ?>
                <input type="hidden" name="previous_ep4" id="previous_ep4" value="<?php echo $ep4; ?>"/>
            </div>
        <?php } ?>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 20px;"></div>

        <div class="entryRow">
            <h4 style="color: #3d81bb;">Memo
                <small>(English Only)</small>
            </h4>
            <label for="epmemo"><abbr
                        title="This memo box is only for you and our staff. Please write any comment for the student in English only.">Memo
                    for Counsellors</abbr></label>
            <textarea class="form-control" rows="3" name="epmemo" id="epmemo"><?php echo $epmemo; ?></textarea>
        </div>
        <div class="entryRow">
            <label for="memoforschool"><abbr
                        title="This memo box is for all school staff. Please write the student's background or additional information to help for the counselling.">Memo
                    for School Staff</abbr></label>
            <textarea class="form-control" rows="3" name="memoforschool"
                      id="memoforschool"><?php echo $memoforschool; ?></textarea>
        </div>

        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 30px;"></div>

        <div class="entryRow">
            <button type="submit" name="bookSchool" id="bookSchool" class="btn btn-primary btn-sm btn-block"
                    style="height: 50px;"><i class="fa fa-spinner" aria-hidden="true"></i> Process Booking
            </button>
        </div>

    </div>
</form>
<div class="clear"></div>
</body>


<?php


if (isset ($_POST['bookSchool'])) {

    if (isset($_POST['ep1']) && !empty($_POST['ep1']))
        $ep1b4 = $_POST['ep1'];
    if (isset($_POST['ep2']) && !empty($_POST['ep2']))
        $ep2b4 = $_POST['ep2'];
    if (isset($_POST['ep3']) && !empty($_POST['ep3']))
        $ep3b4 = $_POST['ep3'];
    if (isset($_POST['ep4']) && !empty($_POST['ep4']))
        $ep4b4 = $_POST['ep4'];

    if (isset($_POST['previous_ep1']) && !empty($_POST['previous_ep1']))
        $previous_ep1 = $_POST['previous_ep1'];
    if (isset($_POST['previous_ep2']) && !empty($_POST['previous_ep2']))
        $previous_ep2 = $_POST['previous_ep2'];
    if (isset($_POST['previous_ep3']) && !empty($_POST['previous_ep3']))
        $previous_ep3 = $_POST['previous_ep3'];
    if (isset($_POST['previous_ep4']) && !empty($_POST['previous_ep4']))
        $previous_ep4 = $_POST['previous_ep4'];

    date_default_timezone_set('Australia/Brisbane');
    $when = date('Y/m/d H:i:s', time());

    $stdFullName = $stdFirstName . " " . $stdFamilyName;
    $std_eps_id = 0;

    $memoforschool_update = mysqli_real_escape_string($con, $_POST['memoforschool']);
    $epmemo_update = mysqli_real_escape_string($con, $_POST['epmemo']);

    mysqli_query($con, "UPDATE students SET epmemo = '" . $epmemo_update . "', memoforschool = '" . $memoforschool_update . "'  WHERE id = '$stdID' ") or die (mysqli_error());

    if (!empty($ep1b4)) {
        $check_booking = mysqli_query($con, "SELECT epName, unique_id FROM stdList WHERE id = '$stdID' && epName='$previous_ep1'") or die(mysqli_error($con));
        $check_booking_num = mysqli_num_rows($check_booking);

        mysqli_query($con, "UPDATE students SET epsuggestschool1 = '" . $ep1b4 . "' WHERE id = '$stdID' ") or die (mysqli_error());

        if ($check_booking_num == 0) {
            if ($ep1b4 == "NP-38gA3" || $ep1b4 == "Applied and Collect the Gift-394ad") {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo, tr_class ) VALUES ('$stdID', '$stdFullName ', '$ep1b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update', 'finish')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            } else {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo ) VALUES ('$stdID', '$stdFullName ', '$ep1b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            }

        } else {
            while ($ep_row = mysqli_fetch_array($check_booking)) {
                $std_eps_id = $ep_row[1];
            }
            if ($ep1b4 == "Applied and Collect the Gift-394ad") {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep1b4', tr_class='finish' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
                $sql_cancel_all = mysqli_query($con, "UPDATE std_eps SET tr_class = 'cancel' WHERE stdID='$stdID' AND tr_class = '' ")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            } else {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep1b4' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            }
        }
    }

    if (!empty($ep2b4)) {
        $check_booking = mysqli_query($con, "SELECT epName, unique_id FROM stdList WHERE id = '$stdID' && epName='$previous_ep2'") or die(mysqli_error($con));
        $check_booking_num = mysqli_num_rows($check_booking);

        mysqli_query($con, "UPDATE students SET epsuggestschool2 = '" . $ep2b4 . "' WHERE id = '$stdID'") or die (mysqli_error());

        if ($check_booking_num == 0) {
            if ($ep2b4 == "NP-38gA3" || $ep2b4 == "Applied and Collect the Gift-394ad") {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo, tr_class ) VALUES ('$stdID', '$stdFullName ', '$ep2b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update', 'finish')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            } else {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo ) VALUES ('$stdID', '$stdFullName ', '$ep2b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            }
        } else {
            while ($ep_row = mysqli_fetch_array($check_booking)) {
                $std_eps_id = $ep_row[1];
            }

            if ($ep2b4 == "Applied and Collect the Gift-394ad") {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep2b4', tr_class='finish' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
                $sql_cancel_all = mysqli_query($con, "UPDATE std_eps SET tr_class = 'cancel' WHERE stdID='$stdID' AND tr_class = '' ")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            } else {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep2b4' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            }
        }
    }

    if (!empty($ep3b4)) {
        $check_booking = mysqli_query($con, "SELECT epName, unique_id FROM stdList WHERE id = '$stdID' && epName='$previous_ep3'") or die(mysqli_error($con));
        $check_booking_num = mysqli_num_rows($check_booking);

        mysqli_query($con, "UPDATE students SET epsuggestschool3 = '" . $ep3b4 . "' WHERE id = '$stdID'") or die (mysqli_error());

        if ($check_booking_num == 0) {
            if ($ep3b4 == "NP-38gA3" || $ep3b4 == "Applied and Collect the Gift-394ad") {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo, tr_class ) VALUES ('$stdID', '$stdFullName ', '$ep3b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update', 'finish')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            } else {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo ) VALUES ('$stdID', '$stdFullName ', '$ep3b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            }
        } else {
            while ($ep_row = mysqli_fetch_array($check_booking)) {
                $std_eps_id = $ep_row[1];
            }

            if ($ep3b4 == "Applied and Collect the Gift-394ad") {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep3b4', tr_class='finish' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
                $sql_cancel_all = mysqli_query($con, "UPDATE std_eps SET tr_class = 'cancel' WHERE stdID='$stdID' AND tr_class = '' ")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            } else {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep3b4' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            }
        }
    }

    if (!empty($ep4b4)) {
        $check_booking = mysqli_query($con, "SELECT epName, unique_id FROM stdList WHERE id = '$stdID' && epName='$previous_ep4'") or die(mysqli_error($con));
        $check_booking_num = mysqli_num_rows($check_booking);

        mysqli_query($con, "UPDATE students SET epsuggestschool4 = '" . $ep4b4 . "' WHERE id = '$stdID'") or die (mysqli_error());

        if ($check_booking_num == 0) {
            if ($ep4b4 == "NP-38gA3" || $ep4b4 == "Applied and Collect the Gift-394ad") {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo, tr_class ) VALUES ('$stdID', '$stdFullName ', '$ep4b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update', 'finish')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            } else {
                $addStdHistory = mysqli_query($con, "INSERT INTO std_eps (stdID, stdName, epName, cnslDate, emailMD5, memoforschool, epmemo ) VALUES ('$stdID', '$stdFullName ', '$ep4b4', '$when', '$whoStudent', '$memoforschool_update', '$epmemo_update')")
                or die ("<p><span style=\"color: red;\">Error adding to History Table</span></p>");
            }
        } else {
            while ($ep_row = mysqli_fetch_array($check_booking)) {
                $std_eps_id = $ep_row[1];
            }

            if ($ep4b4 == "Applied and Collect the Gift-394ad") {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep4b4', tr_class='finish' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
                $sql_cancel_all = mysqli_query($con, "UPDATE std_eps SET tr_class = 'cancel' WHERE stdID='$stdID' AND tr_class = '' ")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            } else {
                $sql_change = mysqli_query($con, "UPDATE std_eps SET epName='$ep4b4' WHERE unique_id='$std_eps_id'")
                or die ("<p><span style=\"color: red;\">Error changing to History Table</span></p>");
            }
        }
    }
    echo '<script>location.replace("waiting/schoolBooking.php?sid=' . $whoStudent . '&success=yes");</script>';

}

if (isset ($_POST['goBack'])) {
    echo '<script>location.replace("waiting/index.php");</script>';
}

if (isset ($_POST['print'])) {
    mysqli_query($con, "UPDATE students SET print = 'Yes' WHERE id = '$stdID'") or die (mysqli_error($con));
}

if (isset ($_POST['sendSMS'])) {
    $textphone = $stdPhone . "@sms.clicksend.com";

    $subject = "";
    $txt = $stdFirstName . ", Welcome to SOL Study Fair. Your personal link is http://soledu.net/sf/r.php?sid=" . $stdEmail;
    $headers = "From: sms@iaemember.com" . "\r\n";

    mail($textphone, $subject, $txt, $headers);
}

?>


<div class="container no-show">
    <h1>(<?php echo $stdID; ?>) <?php echo $stdFirstName, " ", $stdFamilyName; ?></h1>

    <?php
    if ($registerstatus == "Pre-register") {
        echo "<h2>Pre-Registered student / " . $language . "</h2> ";
    } else {
        echo "<h2>Site-Registered student / " . $language . "</h2> ";
    }

    ?>

    <hr/>
    <fieldset>
        <div style="float:left; width: 280px; margin-right: 20px;">
            <div class="entryRow">
                <h3>[Student details]</h3>
            </div>

            <div class="entryRow">
                <label for="nationality">Nationality</label>
                <input class="print" type="text" style="width: 95%;" name="nationality" id="nationality"
                       value="<?php echo $stdNationality; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="fullname">Full Name(First Last)</label>
                <input type="text" class="print" style="width: 95%;" name="fullname" id="fullname"
                       value="<?php echo $stdFirstName; ?> <?php echo $stdFamilyName; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="firstName">Gender </label>
                <input type="text" class="print" style="width: 95%;" name="firstName" id="firstName"
                       value="<?php echo $gender; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="firstName">Mobile </label>
                <input type="text" class="print" style="width: 95%;" name="firstName" id="firstName"
                       value="<?php echo $stdPhone; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="email">Email </label>
                <input type="text" class="print" style="width: 95%;" name="email" id="email"
                       value="<?php echo $stdEmail; ?>" readonly="readonly"/>
            </div>
        </div>


        <div style="float:left; width: 280px; margin-right: 20px;">
            <div class="entryRow">
                <h3>[Education Details]</h3>
            </div>

            <div class="entryRow">
                <label for="currentc">Current Course</label>
                <input type="text" class="print" style="width: 95%;" name="currentc" id="currentc"
                       value="<?php echo $currentc; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="currents">Current School</label>
                <input type="text" class="print" style="width: 95%;" name="currents" id="currents"
                       value="<?php echo $currents; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="interestc">Interested Course</label>
                <input type="text" class="print" style="width: 95%;" name="interestc" id="interestc"
                       value="<?php echo $interestc; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="interestm">Interested Major</label>
                <input type="text" class="print" style="width: 95%;" name="interestm" id="interestm"
                       value="<?php echo $interestm; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="startdate">Expected Start Date</label>
                <input type="text" class="print" style="width: 95%;" name="startdate" id="startdate"
                       value="<?php echo $startdate; ?>" readonly="readonly"/>
            </div>


        </div>

        <div style="float:left; width: 280px; margin-right: 20px;">
            <div class="entryRow">
                <h3>[Pre-counselling]</h3>
            </div>

            <div class="entryRow">
                <label for="beforeep">Before Education Counselor name</label>
                <input class="print" type="text" style="width: 95%;" name="beforeep" id="beforeep"
                       value="<?php echo $beforeep; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="followup">Follow up by</label>
                <input class="print" type="text" style="width: 95%;" name="followup" id="followup"
                       value="<?php echo $followup; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="visatype">Visa Type</label>
                <input class="print" type="text" style="width: 95%;" name="visatype" id="visatype"
                       value="<?php echo $visatype; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="visaexpire">Visa expire date</label>
                <input class="print" type="text" style="width: 95%;" name="visaexpire" id="visaexpire"
                       value="<?php echo $visaexpire; ?>" readonly="readonly"/>
            </div>

            <div class="entryRow">
                <label for="application">Application Submitted</label>
                <input class="print" type="text" style="width: 95%;" name="application" id="application"
                       value="<?php echo $application; ?>" readonly="readonly"/>
            </div>


        </div>

        <div class="clear"></div>
    </fieldset>
    <div class="no-show"
         style="margin-top: 30px; margin-bottom: 30px; font-size: 20pt; text-align: center; letter-spacing: -1px;">
        <?php
        if (strpos($language, "T_Chinese") !== false) {
            echo "<strong>注意事項</strong><br />請確認您的個人信息<br />如果填寫資料不正確，你將無法獲得免費的禮品，抽獎和學校優惠。";
        } else if ($language == "Japanese") {
            echo "<strong>注意！</strong><br />詳細を必ずご確認下さい。 間違っている場合、無料ギフト、抽選会、学校スペシャルの対象から外れます。";
        } else if ($language == "Vietnamese") {
            echo "<strong>Cần lưu ý！</strong><br />Vui lòng kiểm tra thông tin của bạn một cách cẩn thận<br />Vui lòng kiểm tra thông tin, nếu không đúng bạn có thể sẽ không nhận được phần quà miễn phí, giải thưởng sổ xố và giá học ưu đãi từ các trường. ";
        } else if ($language == "Spanish") {
            echo "<strong>Importante!</strong><br />Por favor revisa tus datos. Si no están correctos, no podrás participar en rifas, regalos sorpresas y promociones.";
        } else if (strpos($language, "S_Chinese") !== false) {
            echo "<strong>注意事项</strong><br />请确认您的个人信息<br />如果填写资料不正确，你将无法获得免费的礼品，抽奖和学校特惠。";
        } else if ($language == "Korean") {
            echo "<strong>중요사항!</strong><br />본인의 정보가 정확한지 다시 한번 확인해 주세요!<br />정보가 다를 시, 박람회스페셜/무료선물/상품추첨의 혜택을 받기 어렵습니다.";
        } else if ($language == "Portuguese") {
            echo "<strong>Importante</strong><br />Por favor, cheque todas suas informações.<br />Se não estiver correto, talvez você não receberá o presente grátis, o cupom do sorteio e as ofertas das escolas.";
        } else if ($language == "Thai") {
            echo "<strong>สำคัญ</strong><br />กรุณาตรวจเช็ครายละเอียด<br />หากข้อมูลผิดพลาด คุณอาจพลาดของแจกฟรี รางวัลจับฉลาก และ โปรโมชั่นพิเศษจากโรงเรียน";
        } // else if ($language == "Arabic"){echo "<strong> !مهم </strong><br /> يرجى التحقق من جميع المعلومات الخاصة بك <br /> * ايضا  بعد حصولك على المشورة من وكلاء المعاهد, يمكنك الحصول على معكرونة كورية اذا أردت . ";}
        else {
            echo "<strong>Important!</strong><br />Please check all your information.<br />If it is not correct, you may not get the free gift, lucky draw and school special.";
        }
        ?>

    </div>

    <table width="100%" border="1" class="no-show" style="font-size: 9pt">
        <tr>
            <td height="80px" width="25%" valign="top">1st School : <br/>
                <p style="font-size: 15pt; margin-top: 10px;"><strong><?php echo substr($ep1, 0, -6); ?></strong></p>
            </td>
            <td valign="top" width="25%">2nd School : <br/>
                <p style="font-size: 15pt; margin-top: 10px;"><strong><?php echo substr($ep2, 0, -6); ?></strong></p>
            </td>
            <td valign="top" width="25%">3rd School : <br/>
                <p style="font-size: 15pt; margin-top: 10px;"><strong><?php echo substr($ep3, 0, -6); ?></strong></p>
            </td>
            <td valign="top" width="25%">4th School : <br/>
                <p style="font-size: 15pt; margin-top: 10px;"><strong><?php echo substr($ep4, 0, -6); ?></strong></p>
            </td>
        </tr>
        <tr height="200px;">
            <td height="60px" valign="top">Waiting # :</td>
            <td valign="top">Waiting # :</td>
            <td valign="top">Waiting # :</td>
            <td valign="top">Waiting # :</td>
        </tr>
    </table>
    <?php
    include "../inc/footer.inc.php";
    ?>
    <div class="clear"></div>
</div>
</div>
<div class="page-break"></div>
<div class="no-show" style="font-size: 25pt; text-align: center;"><img src="image/iae_study_fair_map_turn.jpg"
                                                                       style="width: 100%" class="no-show"/></div>