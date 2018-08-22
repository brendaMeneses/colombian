<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$whoStudent = $_GET['sid'];

$result = mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, id FROM students WHERE email='$whoStudent' ") or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows( $result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $stdFamilyName = $row[0];
    $stdFirstName = $row[1];
    $stdEmail = $row[2];
    $stdPhone = $row[3];
    $stdNationality = $row[4];
    $stdID = $row[5];
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
            <h4 style="color: #3d81bb;">General Information</h4>
            <div class="entryRow">
                <label for="how">How to know about SOL Study Fair</label>
                <select class="form-control" name="how" id="how" required>
                    <?php include "../inc/list_howtoknow.php"; ?>
                </select>
            </div>

            <div class="entryRow">
                <label for="languageSelection">Language</label>
                <select class="form-control" name="languageSelection" id="languageSelection">
                    <option value="NULL"></option>
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
                <label for="beforeep">Previous EP Name</label>
                <select class="form-control" name="beforeep" id="beforeep">
                    <?php $beforeep = "NULL"; include "../inc/list_Before_EP.php"; ?>
                </select>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 30px;"></div>

            <h4 style="color: #3d81bb;">Personal Information</h4>

            <div class="entryRow">
                <label for="stdFirstName">Student Name</label><br/>
                <div class="col-xs-6" style="padding: 0; margin: 0;">
                    <input class="form-control" type="text" name="stdFirstName" id="stdFirstName"
                           value="<?php echo $stdFirstName; ?>">
                    <p class="help-block">First Name</p>
                </div>
                <div class="col-xs-6" style="padding: 0; margin: 0;">
                    <input class="form-control" type="text" name="stdFamilyName" id="stdFamilyName"
                           value="<?php echo $stdFamilyName; ?>"/>
                    <p class="help-block">Last Name</p>
                </div>
                <p class="help-block" style="font-size: 10px; color: #941302;">** Student's name must match with the
                    passport name.</p>
            </div>

            <div class="entryRow">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $stdPhone; ?>"/>
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
                <div class="col-xs-6" style="padding: 0; margin: 0;">
                    <label for="currentc">Current Course</label>
                    <select class="form-control" name="currentc" id="currentc">
                        <?php include "../inc/list_currentc.php"; ?>
                    </select>
                </div>
                <div class="col-xs-6" style="padding: 0; margin: 0;">
                    <label for="currents">Current School</label>
                    <input class="form-control" type="text" name="currents" id="currents"/>
                </div>
            </div>

            <div class="entryRow">
                <div class="col-xs-6" style="padding: 0; margin: 0;">
                    <label for="interestc">Interested Course/Visa</label>
                    <select class="form-control" name="interestc" id="interestc">
                        <?php include "../inc/list_interestc.php"; ?>
                    </select>
                </div>
                <div class="col-xs-6" style="padding: 0; margin: 0;">
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
    $how_update = mysqli_real_escape_string($con, $_POST['how']);
    $language_update = mysqli_real_escape_string($con, $_POST['languageSelection']);

    $firstName_update = mysqli_real_escape_string($con, $_POST['stdFirstName']);
    $familyName_update = mysqli_real_escape_string($con, $_POST['stdFamilyName']);

    $phone_update = mysqli_real_escape_string($con, $_POST['phone']);
    $currentVisa_update = mysqli_real_escape_string($con, $_POST['visatype']);
    $visaExpire_update = mysqli_real_escape_string($con, $_POST['visaexpire']);

    $currentc_update = mysqli_real_escape_string($con, $_POST['currentc']);
    $currents_update = mysqli_real_escape_string($con, $_POST['currents']);
    $interestc_update = mysqli_real_escape_string($con, $_POST['interestc']);
    $interestm_update = mysqli_real_escape_string($con, $_POST['interestm']);

    $startdate_update = mysqli_real_escape_string($con, $_POST['startdate']);
    $beforeep_update = mysqli_real_escape_string($con, $_POST['beforeep']);


    mysqli_query($con, "UPDATE students SET how = '" . $how_update . "', language = '" . $language_update . "', familyName = '" . $familyName_update .
        "', firstName = '" . $firstName_update . "', firstName = '" . $firstName_update . "', phone = '" . $phone_update . "', visatype = '" . $currentVisa_update .
        "', visaexpire = '" . $visaExpire_update . "', currentc = '" . $currentc_update . "', currents = '" . $currents_update .
        "', interestc = '" . $interestc_update . "', interestm = '" . $interestm_update . "', startdate = '" . $startdate_update .
        "', beforeep = '" . $beforeep_update . "'  WHERE email='$whoStudent' ") or die (mysqli_error());

    echo '<script>location.replace("waiting/schoolBooking.php?sid=' . $whoStudent . '");</script>';

}
?>