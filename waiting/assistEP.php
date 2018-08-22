<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];

$result = mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, checkinTime, registerStatus FROM students WHERE email='$whoStudent' ") or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $stdFamilyName = $row[0];
    $stdFirstName = $row[1];
    $stdEmail = $row[2];
    $stdPhone = $row[3];
    $stdNationality = $row[4];
    $checkinTime = $row[5];
    $registerStatus = $row[6];
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
<?php include "../inc/navigation.php"; ?>
    <form method="post" class="form-horizontal">
        <div class="container" style="border: 0;">
            <h3 style="letter-spacing: -1px;"><span
                        style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Study
                Fair
                <small> Ready for school booking</small>
            </h3>
        </div>
        <div class="container" style="margin-top: -60px;">
            <div class="entryRow">
                <p style="font-size: 100px; text-align: center;"><i class="fa fa-handshake-o" aria-hidden="true"
                                                                    style="margin: 0;"></i>
                <p>
                <p style="font-size: 30px; letter-spacing: -1px; text-align: center; font-weight: 300;">You will assist
                    <strong><?php echo $stdFirstName . ' ' . $stdFamilyName; ?></strong></p>
                <p style="font-size: 16px; text-align: center; margin-bottom: 30px; font-weight: 300;">Please check the
                    student information again before you process the school booking.</p>
            </div>
            <div class="entryRow">
                <h4 style="color: #3d81bb;">Student Detail</h4>
            </div>
            <div class="entryRow">
                <label for="stdNationality">Nationality</label>
                <input class="form-control" type="text" name="stdNationality" id="stdNationality"
                       value="<?php echo $stdNationality; ?>" readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $stdEmail; ?>"
                       readonly="readonly"/>
            </div>
            <div class="entryRow">
                <label for="phone">Mobile Number</label>
                <input class="form-control" type="phone" name="phone" id="phone" required value="<?php echo $stdPhone; ?>"/>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 30px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">School Booking</h4>
            </div>
            <div class="entryRow" style="text-align: center;">
                <h5>Are you ready to process the school booking step?</h5>
            </div>
            <div class="entryRow">
                <label for="EPname">If yes, please select your name</label>
                <select class="form-control" name="EPname" id="EPname" required>
                    <option value="">Please select your name</option>
                    <option value="Freya">Freya</option>
                    <option value="Momo">Momo</option>
                    <option value="Tin">Tin</option>
                    <option value="Elieen">Elieen</option>
                    <option value="Kauro">Kauro</option>
                    <option value="Fame">Fame</option>
                    <option value="Tess">Tess</option>
                    <option value="Grace">Grace</option>
                    <option value="Keith">Keith</option>
                    <option value="Other Staff">Other Staff</option>
                </select>
            </div>
            <div class="entryRow">
                <div class="row">
                    <div class="col-xs-6">
                        <?php
                        if ($registerStatus == "Pre-register") {
                            echo '<button type="submit" name="startBooking" id="startBooking" class="btn btn-primary btn-sm btn-block" style="height: 50px;"><i class="fa fa-list-alt" aria-hidden="true"></i> Start School Booking</button>
								<p class="help-block" style="text-align: center; font-size: 11px;">The student will be removed from the waiting list and move to the school booking page.</p>';
                        } else {
                            echo '<button type="submit" name="completeSite" id="completeSite" class="btn btn-primary btn-sm btn-block" style="height: 50px;"><i class="fa fa-list-alt" aria-hidden="true"></i> Complete Site-registration</button>
								<p class="help-block" style="text-align: center; font-size: 11px;">You will move to the site-registration page to fill out additional information.</p>';
                        }
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" name="search" id="search" class="btn btn-danger btn-lg btn-block"
                                style="height: 50px;"><i class="fa fa-times" aria-hidden="true"></i> No
                        </button>
                        <p class="help-block" style="text-align: center; font-size: 11px;">Go back to the waiting list
                            page and find the correct student.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php
include "../inc/footer.inc.php";
if (isset($_POST['EPname']) && !empty($_POST['EPname']))
    $EPname_update = mysqli_real_escape_string($con, $_POST['EPname']);
if (isset($_POST['phone']) && !empty($_POST['phone']))
    $phone_update = mysqli_real_escape_string($con, $_POST['phone']);


if (isset ($_POST['search'])) {
    echo '<script>location.replace("waiting/index.php");</script>';
}

if (isset ($_POST['startBooking'])) {
    if ($EPname_update == "NULL") {
        echo '<script type="text/javascript">alert("EC Name cannot be empty");</script>';
    } else {
        mysqli_query($con, "UPDATE students SET served = 'Yes', phone = '$phone_update', servedBy = '$EPname_update'  WHERE email = '$whoStudent' ") or die (mysqli_error());
        echo '<script>location.replace("waiting/schoolBooking.php?sid=' . $stdEmail . '");</script>';
    }
}
if (isset ($_POST['completeSite'])) {
    if ($EPname_update == "NULL") {
        echo '<script type="text/javascript">alert("EC Name cannot be empty");</script>';
    } else {
        mysqli_query($con, "UPDATE students SET served = 'Yes', phone = '$phone_update', servedBy = '$EPname_update'  WHERE email = '$whoStudent' ") or die (mysqli_error());
        echo '<script>location.replace("waiting/siteRegistration.php?sid=' . $stdEmail . '");</script>';
    }
}
?>