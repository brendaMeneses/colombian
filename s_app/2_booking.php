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
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-handshake-o" aria-hidden="true"></i> Waiting</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/3_gift.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-gift" aria-hidden="true"></i> Gift</a>
                </div>
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
                <h4 style="color: #3d81bb;">Your booking</h4>
                <?php
                // GET LIST OF PREVIOUS REGISTRATIONS FOR THE SELECTED STUDENT
                $prev = mysqli_query($con, "SELECT epName, cnslDate, counselling_memo, unique_id, tr_class FROM std_eps WHERE emailMD5='$whoStudent' ORDER BY cnslDate")
                or die(mysqli_error());

                while ($prevEps = mysqli_fetch_array($prev)) {
                    $prevEpName = $prevEps[0];
                    $prevCnslDate = $prevEps[1];
                    $memo = $prevEps[2];
                    $uniqueID = $prevEps[3];
                    $status = $prevEps[4];
                    ?>
                    <div class="entryRow">
                        <label for="<?php echo $prevEpName ?>">School name : <span
                                    style="font-size: 20px; letter-spacing: -0.2px; color: #3d81bb;">
                                <?php
                                $str_school = substr($prevEpName, 0, -6);
                                if ($str_school == "LCB") {
                                    echo "Le Cordon Bleu";
                                } else {
                                    echo $str_school;
                                }
                                ?></span></label>
                        <table class="table table-striped"
                               style="text-align: center; font-size: 9pt; letter-spacing: -0.3px;" valign="middle">
                            <thead>
                            <th style="width: 30%; text-align: center;">Waiting #</th>
                            <th style="text-align: center;">Brochure</th>
                            </thead>


                            <?php

                            $waitingNumber = mysqli_query($con, "SELECT * FROM std_eps WHERE epName = '$prevEpName' AND cnslDate <= '$prevCnslDate' ORDER BY cnslDate DESC") or die(mysqli_error());
                            $waitingNumberCount = mysqli_num_rows($waitingNumber);

                            $queueNumber = mysqli_query($con, "SELECT * FROM std_eps WHERE epName = '$prevEpName' AND cnslDate < '$prevCnslDate' AND tr_class='' ORDER BY cnslDate DESC") or die(mysqli_error());
                            $queueNumberCount = mysqli_num_rows($queueNumber);


                            if ($status == "") {
                                echo '<tr><td style="vertical-align: middle; border-right: 1px solid #ccc;"><p style="font-size: 40px; margin: 0;">' . $waitingNumberCount . '</p><span>' . $queueNumberCount . ' students in front of you.</span>';
                            } else if ($status == "cancel") {
                                echo '<tr class="danger"><td style="vertical-align: middle; border-right: 1px solid #ccc;"><p style="font-size: 20px; margin: 0;">Cancelled</p><p class="help-block">Please ask SOL Edu staff for re-booking.</p>';
                            } else {
                                echo '<tr class="success"><td style="vertical-align: middle; border-right: 1px solid #ccc;"><p style="font-size: 20px; margin: 0;">Finished</p><p class="help-block">Please ask SOL Edu staff to apply to school.</p>';

                            }

                            ?>


                            </td>
                            <td style="vertical-align: middle; text-align: left;">
                                <?php
                                if ($prevEpName == "ALS-B7eDe") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/als/ALS-International-House-Brisbane-Brochure-2017-2.pdf"
                                               target="_blank">ALS Brochures 2018</a></li>
                                    </ul>
                                    <p><a href="http://www.ihbrisbane.com.au/" target="_blank"><i class="fa fa-home"
                                                                                                  aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "Bond-3jY3f") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/bond/Bond-University-College-International-Brochure_LRV3_small.pdf"
                                               target="_blank">Bond University College International Brochure</a></li>
                                        <li>
                                            <a href="download/bond/2019-Undergraduate-Guide.pdf"
                                               target="_blank">Bond Undergraduate Guide 2019</a></li>
                                        <li>
                                            <a href="download/bond/2019-Postgraduate-Guide.pdf"
                                               target="_blank">Bond Postgraduate Guide 2019</a></li>
                                    </ul>
                                    <p><a href="https://bond.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                            aria-hidden="true"></i>
                                            CSU Study Centres</a></p>
                                    <?php
                                } else if ($prevEpName == "CQU-75ysT") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/cqu/CQU-International_Student_2018_Postgraduate_Course_Guide.pdf"
                                               target="_blank">
                                                CQU International Student 2018 Postgraduate Course Guide</a></li>
                                        <li>
                                            <a href="download/cqu/CQU-International_Student_2018_Vocational_and_Undergraduate_Course_Guide.pdf"
                                               target="_blank">
                                                CQU International Student 2018 Vocational And Undergraduate Course
                                                Guide</a></li>
                                    </ul>
                                    <p><a href="https://www.cqu.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                            aria-hidden="true"></i>
                                            CSU Study Centres</a></p>
                                    <?php
                                } else if ($prevEpName == "CSU-gU3ea") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/csu/CSU-Brochure-2018-English.pdf" target="_blank">
                                                CSU Brochure 2018
                                            </a></li>
                                    </ul>
                                    <p><a href="http://www.csustudycentres.edu.au/" target="_blank"><i
                                                    class="fa fa-home"
                                                    aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "CTI-4igjA") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/cti/CTI_2018 Brochure-PRINT-FINAL.pdf" target="_blank">CTI
                                                International Brochure 2018</a></li>
                                        <li><a href="download/cti/CTI-IT-flyer.pdf" target="_blank">CTI Flyer</a></li>
                                    </ul>
                                    <p><a href="http://cti.qld.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                           aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "Embassy-fiEde") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/embassy/Embassy-English-Brochure-2018_LR.pdf"
                                               target="_blank">Embassy English Brochure 2018</a></li>
                                    </ul>
                                    <p><a href="https://www.embassyenglish.com/" target="_blank"><i class="fa fa-home"
                                                                                                    aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "Griffith-89hH9") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/griffith/Griffith-english-language-institute-guide-2018.pdf"
                                               target="_blank">Griffith English Language Institute Guide 2018</a></li>
                                        <li><a href="download/griffith/Griffith-student-guide-2018-international.pdf"
                                               target="_blank">International Student Guide 2018</a></li>
                                    </ul>
                                    <p><a href="https://www.griffith.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                                 aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "ILSC-biEDe") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/ilsc/ILSC-AUS-LS-brochure.pdf" target="_blank">ILSC
                                                Australia Brochure</a></li>
                                    </ul>
                                    <p><a href="http://www.ilsc.com/brisbane" target="_blank"><i class="fa fa-home"
                                                                                                 aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "JCUB-83Tsj") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/jcub/JCUB-Study-Guide-2018.pdf" target="_blank">JCUB Study
                                                Guide 2018</a></li>

                                    </ul>
                                    <p><a href="https://www.jcub.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                             aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "Kaplan-buEdj") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/kaplan/KBS-2018-Tuition-Fees-(002).pdf"
                                               target="_blank">Kaplan Tuition Fees 2018</a></li>
                                        <li><a href="download/kaplan/KBS_2018_Prospectus_Nov2017.pdf" target="_blank">Kaplan
                                                English Course 2018</a></li>

                                    </ul>
                                    <p><a href="http://www.kaplan.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                              aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "LCB-3sT5i") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/lcb/Le-Cordon-Bleu-Brochure.pdf" target="_blank">Le Cordon
                                                Bleu Brochure</a></li>
                                        <li><a href="download/lcb/Le-Cordon-Bleu-Scholarship-application.pdf"
                                               target="_blank">Le Cordon Bleu Scholarship Application</a></li>
                                    </ul>
                                    <p><a href="https://www.cordonbleu.edu/australia/home/en" target="_blank"><i
                                                    class="fa fa-home" aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "QAT-gueEd") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/qat/QAT-Brochure-2017.pdf" target="_blank">QAT
                                                Brochure</a></li>
                                    </ul>
                                    <p><a href="http://qat.qld.edu.au/QAT-International/" target="_blank"><i
                                                    class="fa fa-home" aria-hidden="true"></i> School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "QUT-3bjE4") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/qut/QUT-22839-International-Prospectus-2019-COMPLETE-F3-Web.pdf"
                                               target="_blank">QUT International Courses 2019</a></li>
                                        <li>
                                            <a href="download/qut/QUT-2018-QUTI-study-guide-for-onshore-Yr12-international-students-page.pdf"
                                               target="_blank">QUT Study Guide for International Students (in
                                                Australia)</a></li>
                                        <li>
                                            <a href="download/qut/QUT-21949-QUTI-study-guide-for-offshore-international-students_final.pdf"
                                               target="_blank">QUT Study Guide for International Students (outside
                                                Australia)</a></li>
                                        <li><a href="download/qut/QUT-2018-QUTI-Study-Guide-Chinese-version_for-web.pdf"
                                               target="_blank">QUT Study Guide (Chinese)</a></li>
                                    </ul>
                                    <p><a href="http://qut.edu.au" target="_blank"><i class="fa fa-home"
                                                                                      aria-hidden="true"></i> School
                                            Website</a></p>
                                    <?php
                                } else if ($prevEpName == "TAFE Queensland-S89aA") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/tafe/TAFE-QLD-Course-Guide-2018.pdf" target="_blank">TAFE
                                                Queensland Course Guide 2018</a></li>
                                        <li><a href="download/tafe/TAFE-QLD-English-Program-2018.pdf" target="_blank">TAFE
                                                Queensland English Program 2018</a></li>
                                        <li><a href="download/tafe/TAFE-QLD-International-Pathways-2018.pdf"
                                               target="_blank">TAFE Queensland International Pathways 2018</a></li>
                                        <li><a href="download/tafe/TAFE-QLD-Price-List-2018.pdf" target="_blank">TAFE
                                                Queensland Price List 2018</a></li>

                                    </ul>
                                    <p><a href="http://tafeqld.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                           aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "UQ-9jIUE") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li><a href="download/uq/UQ-college-guide.pdf" target="_blank">UQ College
                                                Guide</a></li>
                                        <li><a href="download/uq/UQ-English-Language-Courses.pdf" target="_blank">UQ
                                                English Language Courses</a></li>
                                        <li><a href="download/uq/UQ-IB-guide-for-international-students.pdf"
                                               target="_blank">UQ Information For International Baccalaureate Students
                                                2019</a>
                                        </li>
                                        <li><a href="download/uq/UQ-IES-Foundation-Year-Brochure-2017-v6-final.pdf"
                                               target="_blank">
                                                UQ IES Foundation Year Brochure 2018</a></li>
                                        <li><a href="download/uq/UQ-international-onshore-y12-guide-2019.pdf"
                                               target="_blank">
                                                UQ International Students Completing Year 12 In Australia</a></li>
                                        <li><a href="download/uq/UQ-international-postgraduate-guide.pdf"
                                               target="_blank">
                                                UQ International Postgraduate Guide 2019</a></li>
                                        <li><a href="download/uq/UQ-international-undergraduate-guide 2019.pdf"
                                               target="_blank">
                                                UQ International Undergraduate Guide 2019</a></li>
                                        <li><a href="download/uq/UQ-Scholarship-Guide-2018.pdf" target="_blank">
                                                UQ Scholarship Guide 2018</a></li>

                                    </ul>
                                    <p><a href="http://www.uq.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                          aria-hidden="true"></i> School
                                            Website</a></p>
                                    <?php
                                } else if ($prevEpName == "USC-18iud") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/usc/USC-International-Student-Guide-2018.pdf"
                                               target="_blank">International Student Guide 2018</a></li>
                                    </ul>
                                    <p><a href="https://www.usc.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                            aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else if ($prevEpName == "UTAS-as3sT") {
                                    ?>

                                    <h5>School Brochure</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="download/utas/UTAS-International-Student-Guide-WEB.pdf"
                                               target="_blank">UTAS International Student Guide</a></li>
                                    </ul>
                                    <p><a href="http://www.utas.edu.au/" target="_blank"><i class="fa fa-home"
                                                                                            aria-hidden="true"></i>
                                            School Website</a></p>
                                    <?php
                                } else {
                                    ?>

                                    <h5>SOL Edu Guide</h5>
                                    <ul style="margin-left: 30px;">
                                        <li>
                                            <a href="http://soledu.net/wp-content/uploads/2018/02/study-guide-book-5th-edition.pdf"
                                               target="_blank">Download SOL Edu Study Guide book 5th-edition</a></li>
                                    </ul>
                                    <p><a href="http://soledu.net" target="_blank">
                                            <i class="fa fa-home" aria-hidden="true"></i> SOL Edu website</a></p>
                                    <?php
                                }
                                ?>
                            </td>
                            </tr>
                        </table>


                        <!-- Space -->
                        <div class="entryRow" style="margin-bottom: 20px;"></div>
                    </div>

                    <?php

                }
                ?>
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