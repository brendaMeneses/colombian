<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$beforeep = "";
$successUpdate = "";
if (isset($_GET['success']) && !empty($_GET['success']))
    $successUpdate = $_GET['success'];
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
    </style>

    <body>
<?php include "../inc/navigation.php"; ?>
    <form method="post" class="form-horizontal">
        <div class="container" style="border: 0;">
            <h3 style="letter-spacing: -1px;"><span
                        style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Study
                Fair
                <small> Site-registration</small>
            </h3>
        </div>
        <div class="container" style="margin-top: -60px;">

            <?php if ($successUpdate == "yes") { ?>
                <div class="entryRow"
                     style="background-color: #2a5d89; color: white; text-align: center; padding: 10px;">
                    <h3 style="letter-spacing: -1px; margin: 0; font-weight: 300;"><i class="fa fa-check-circle-o"
                                                                                      aria-hidden="true"></i> Good!
                        <strong>New student has been created! Please CHECK-IN first!!!</h3>
                    <span style="font-weight: 300;">If any field has not been updated, please report to BDT (ext num. 775/776 or bd@soledu.net) immediately.</span>
                </div>
            <?php } ?>
            <h4 style="color: #3d81bb;">General Information</h4>
            <div class="entryRow">
                <label for="how">How to know about SOL Study Fair</label>
                <select class="form-control" name="how" id="how" required>
                    <?php include "../inc/list_howtoknow.php"; ?>
                </select>
            </div>

            <div class="entryRow">
                <label for="languageSelection" required>Language</label>
                <select class="form-control" name="languageSelection" id="languageSelection">
                    <option value=""></option>
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="T_Chinese">Traditional Chinese</option>
                    <option value="S_Chinese">Simplified Chinese</option>
                    <option value="Korean">Korean</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Portuguese">Portuguese</option>
                    <option value="Thai">Thai</option>
                    <option value="Vietnamese">Vietnamese</option>
                </select>
            </div>

            <div class="entryRow">
                <label for="nationalitySelection">Nationality</label>
                <select class="form-control" name="nationalitySelection" id="nationalitySelection">
                    <?php include "../inc/list_nationality.php"; ?>
                </select>
            </div>

            <div class="entryRow">
                <label for="beforeep">Pervious Education Counselor Name</label>
                <select class="form-control" name="beforeep" id="beforeep">
                    <?php include "../inc/list_Before_EP.php"; ?>
                </select>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 30px;"></div>

            <h4 style="color: #3d81bb;">Personal Information</h4>

            <div class="entryRow">
                <label for="stdFirstName">Student Name</label><br/>
                <div class="col-xs-6">
                    <input class="form-control" type="text" name="stdFirstName" id="stdFirstName" required/>
                    <p class="help-block">First Name</p>
                </div>
                <div class="col-xs-6">
                    <input class="form-control" type="text" name="stdFamilyName" id="stdFamilyName" required/>
                    <p class="help-block">Last Name</p>
                </div>
                <p class="help-block" style="font-size: 10px; color: #941302;">** Student's name must match with the
                    passport name.</p>
            </div>

            <div class="entryRow">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" required/>
            </div>
            <div class="entryRow">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" required/>
            </div>

            <div class="entryRow">
                <label for="gender">Gender</label><br/>
                <div class="col-xs-6">
                    <input type="radio" name="gender" value="Male" required> Male</label>
                    <input type="radio" name="gender" value="Female" required> Female</label>
                </div>
            </div>

            <div class="entryRow">
                <label for="visatype">Current Visa</label>
                <select class="form-control" name="visatype" id="visatype">
                    <option value="NULL"></option>
                    <option value="W.H">Working Holiday</option>
                    <option value="Student">Student</option>
                    <option value="T.R">485 Visa</option>
                    <option value="P.R">Permanent Resident</option>
                    <option value="Tourist">Tourist / Visitor</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="entryRow">
                <label for="visaexpire">Visa expire date</label>
                <input class="form-control" type="date" min="2017-03-08" name="visaexpire" id="visaexpire"/>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 30px;"></div>

            <h4 style="color: #3d81bb;">Educational Information</h4>

            <div class="entryRow">
                <div class="col-xs-6">
                    <label for="currentc">Current Course</label>
                    <!--<input type="text" name="currentc" id="currentc" />-->
                    <select class="form-control" name="currentc" id="currentc">
                        <?php include "../inc/list_currentc.php"; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label for="currents">Current School</label>
                    <input class="form-control" type="text" name="currents" id="currents"/>
                </div>
            </div>

            <div class="entryRow">
                <div class="col-xs-6">
                    <label for="interestc">Interested Course/Visa</label>
                    <select class="form-control" name="interestc" id="interestc">
                        <?php include "../inc/list_interestc.php"; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label for="interestm">Interested Major</label>
                    <input class="form-control" type="text" name="interestm" id="interestm"/>
                </div>
            </div>

            <div class="entryRow">
                <label for="startdate">Expected Start Date</label>
                <select class="form-control" name="startdate" id="startdate" required>
                    <?php include "../inc/list_startdate.php"; ?>
                </select>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 30px;"></div>

            <div class="entryRow">
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-block"
                        style="height: 50px;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Register
                </button>
            </div>
        </div>
    </form>

<?php
include "../inc/footer.inc.php";


if (isset ($_POST['submit'])) {
    $register_status = 'site-register';
    $language_update = mysqli_real_escape_string($con, $_POST['languageSelection']);
    $nationality_update = mysqli_real_escape_string($con, $_POST['nationalitySelection']);
    $familyName_update = mysqli_real_escape_string($con, $_POST['stdFamilyName']);
    $firstName_update = mysqli_real_escape_string($con, $_POST['stdFirstName']);
    $gender_update = $_POST['gender'] == "Male" ? "Male" : "Female";

    $email_update = mysqli_real_escape_string($con, $_POST['email']);
    $phone_update = mysqli_real_escape_string($con, $_POST['phone']);
    $currents_update = mysqli_real_escape_string($con, $_POST['currents']);
    $currentc_update = mysqli_real_escape_string($con, $_POST['currentc']);
    $interestc_update = mysqli_real_escape_string($con, $_POST['interestc']);
    $interestm_update = mysqli_real_escape_string($con, $_POST['interestm']);

    $how_update = mysqli_real_escape_string($con, $_POST['how']);
    $startdate_update = mysqli_real_escape_string($con, $_POST['startdate']);
    $EstimatedTimeToVisit_update = "onsite";
    $beforeep_update = mysqli_real_escape_string($con, $_POST['beforeep']);
    $visaExpire_update = mysqli_real_escape_string($con, $_POST['visaexpire']);
    $currentVisa_update = mysqli_real_escape_string($con, $_POST['visatype']);
    $gift_update = 'No';
    $serve_update = 'No';
    $inAustralia_update = 'Yes';
    $link_update = mysqli_real_escape_string($con, "<a href='http://soledu.net/qrcode/tsf-kv.php?sid=" . $email_update . "' target='_blank'><img src='http://soledu.net/wp-content/uploads/2018/03/followup_school_apply.png' style='width: 80px;'/></a>");

    $sql_insert = "INSERT INTO students (registerstatus, `language`, nationality, familyName, firstName, gender, email, phone, currents, currentc, interestc, interestm, " .
        " how, startdate, EstimatedTimeToVisit, beforeep, visaexpire, visatype, application, link, gift, served, inAustralia) " .
        " VALUES ('$register_status','$language_update', '$nationality_update', '$familyName_update', '$firstName_update', '$gender_update', '$email_update', " .
        " '$phone_update', '$currents_update', '$currentc_update', '$interestc_update', '$interestm_update', " .
        " '$how_update', '$startdate_update', '$EstimatedTimeToVisit_update', '$beforeep_update', '$visaExpire_update', '$currentVisa_update', " .
        " 'No', '$link_update', '$gift_update', '$serve_update', '$inAustralia_update') ";

    if (!mysqli_query($con, $sql_insert)) {
        echo("Error description: " . mysqli_error($con));
    } else {
        //mysqli_query($con, $sql_insert) or die("error");
        echo "<script>window.open('http://soledu.net/qrcode/phpqrcode/qrsol/index.php?sid=$email_update');</script>";
        echo '<script>location.replace("waiting/siteRegistration.php?success=yes");</script>';
    }

    /*mysqli_query($con, "UPDATE students SET how = '" . $how_update . "', language = '" . $language_update . "', familyName = '" . $familyName_update .
        "', firstName = '" . $firstName_update . "', firstName = '" . $firstName_update . "', phone = '" . $phone_update . "', visatype = '" . $currentVisa_update .
        "', visaexpire = '" . $visaExpire_update . "', currentc = '" . $currentc_update . "', currents = '" . $currents_update .
        "', interestc = '" . $interestc_update . "', interestm = '" . $interestm_update . "', startdate = '" . $startdate_update .
        "', beforeep = '" . $beforeep_update . "'  WHERE email='$whoStudent' ") or die (mysqli_error());*/

    //echo '<script>location.replace("waiting/schoolBooking.php?sid=' . $whoStudent . '");</script>';
}
?>