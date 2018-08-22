<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$whoStudent = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
$epName = "";
if (isset($_GET['EPname']) && !empty($_GET['EPname']))
    $epName = $_GET['EPname'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
            background-color: #fff;
        }
    }

    @media only screen and (max-width: 767px) {
        .no-show, .no-show * {
            visibility: hidden !important;
        }
    }
</style>


<?php


$result = mysqli_query($con, "SELECT unique_id, stdID, stdName, epName, cnslDate, emailMD5, tr_class, start_time, finish_time, memoforschool, counselling_memo, rate, SMS FROM std_eps WHERE unique_id='$whoStudent'") or die(mysqli_error());

$num_rows = mysqli_num_rows($result);

if ($num_rows < 1) {
    die ("<div class='container'><div class='alert alert-error'><STRONG>STUDENT NOT FOUND!</STRONG></div></div>");
} else {
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $unique_id = $row[0];
        $stdID = $row[1];
        $stdName = $row[2];
        $epName = $row[3];
        $cnslDate = $row[4];
        $emailMD5 = $row[5];
        $tr_class = $row[6];
        $start_time = $row[7];
        $finish_time = $row[8];
        $memo_ep = $row[9];
        $counselling_memo = $row[10];
        $rate = $row[11];
        $SMS = $row[12];
    }

}
?>

<body>
<div class="container" style="border: 0;">
    <h3 style="letter-spacing: -1px;"><span
                style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span><?php echo substr($_GET['EPname'], 0, -6); ?>
        Review
        <small>for</small> <?php echo $stdName; ?></h3>
</div>
<div class="container" style="margin-top: -60px;">
    <form name="mainform" method="post" class="form-horizontal">
        <div class="entryRow">
            <label for="interestc">Potential Rate</label>
            <select class="form-control" name="rate" id="rate" required>
                <option value=""></option>
                <option value="5" <?php echo ($rate == "5") ? "selected='selected'" : "" ?>>5 (Very High)</option>
                <option value="4" <?php echo ($rate == "4") ? "selected='selected'" : "" ?>>4</option>
                <option value="3" <?php echo ($rate == "3") ? "selected='selected'" : "" ?>>3</option>
                <option value="2" <?php echo ($rate == "2") ? "selected='selected'" : "" ?>>2</option>
                <option value="1" <?php echo ($rate == "1") ? "selected='selected'" : "" ?>>1 (Very Low)</option>
            </select>
        </div>
        <div class="entryRow">
            <label for="memo">Counselling Note</label>
            <textarea class="form-control" name="memo" id="memo" autocomplete="off"
                      rows="5"/><?php echo $counselling_memo; ?></textarea>
        </div>
        <!-- Space -->
        <div class="entryRow" style="margin-bottom: 30px;">
            <?php

            $whoStudent_format = mysqli_real_escape_string($con, $stdID);

            $std_result =
                mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, " .
                    "gender, beforeep, language FROM students WHERE id='$whoStudent_format'")
            or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");

            $num_rows_std = mysqli_num_rows($std_result);

            $std_FamilyName = "";
            if ($num_rows_std < 1) {
                die ("<div class='container'><div class='alert alert-error'><STRONG>SOMETHING WRONG, Please ask SOL Edu Staff!</STRONG></div></div>");
            } else {
                while ($row_std = mysqli_fetch_array($std_result, MYSQLI_NUM)) {
                    $std_FamilyName = $row_std[0];
                    $std_FirstName = $row_std[1];
                    $std_Email = $row_std[2];
                    $std_Phone = $row_std[3];
                    $std_Nationality = $row_std[4];
                    $std_Gender = $row_std[5];
                    $std_BeforeEp = $row_std[6];
                    $std_Language = $row_std[7];
                }
            }

            $link = "";
            $is_language_school = 0;
            if ($epName == "ALS-B7eDe") {
                $is_language_school = 1;
                $link = "http://soledu.net/als-application-form/?url=$actual_link&firstName=$std_FirstName&lastName=$std_FamilyName&email=$std_Email&mobile=$std_Phone&nationality=$std_Nationality&ep=$std_BeforeEp&gender=$std_Gender&stdID=$whoStudent_format&language=$std_Language&from=SStaff";
            }
            if ($epName == "Embassy-fiEde") {
                $is_language_school = 1;
                $link = "http://soledu.net/embassy-application-form/?url=' . $actual_link . '&firstName=' . $std_FirstName 
                . '&lastName=' . $std_FamilyName . '&email=' . $std_Email . '&mobile=' . $std_Phone 
                . '&nationality=' . $std_Nationality . '&ep=' . $std_BeforeEp . '&gender=' . $std_Gender 
                . '&stdID=' . $whoStudent_format . '&language=' . $std_Language . '&from=SStaff";
            }
            if ($epName == "ILSC-biEDe") {
                $is_language_school = 1;
                $link = "http://soledu.net/ilsc-application-form/?url=' . $actual_link . '&firstName=' . $std_FirstName 
                . '&lastName=' . $std_FamilyName . '&email=' . $std_Email . '&mobile=' . $std_Phone 
                . '&nationality=' . $std_Nationality . '&ep=' . $std_BeforeEp . '&gender=' . $std_Gender 
                . '&stdID=' . $whoStudent_format . '&language=' . $std_Language . '&from=SStaff";
            }
            if ($epName == "QAT-gueEd") {
                $is_language_school = 1;
                $link = "http://soledu.net/qat-application-form/?url=' . $actual_link . '&firstName=' . $std_FirstName 
                . '&lastName=' . $std_FamilyName . '&email=' . $std_Email . '&mobile=' . $std_Phone 
                . '&nationality=' . $std_Nationality . '&ep=' . $std_BeforeEp . '&gender=' . $std_Gender 
                . '&stdID=' . $whoStudent_format . '&language=' . $std_Language . '&from=SStaff";
            }
            if ($epName == "Others-49b2a") {
                $is_language_school = 1;
                $link = "http://soledu.net/other-application-form/?url=' . $actual_link . '&firstName=' . $std_FirstName 
                . '&lastName=' . $std_FamilyName . '&email=' . $std_Email . '&mobile=' . $std_Phone 
                . '&nationality=' . $std_Nationality . '&ep=' . $std_BeforeEp . '&gender=' . $std_Gender 
                . '&stdID=' . $whoStudent_format . '&language=' . $std_Language . '&from=SStaff";
            }
            ?>
            <?php if ($is_language_school) {  ?>
                <!--
                <label for="ck-apply">
                    <input type="checkbox" name="ck-apply" id="ck-apply" value="apply"/> School Apply Now
                </label> -->
            <?php } ?>
        </div>

        <div class="entryRow" style="text-align: center;">
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit" id="submitok">
                SUBMIT
            </button>
        </div>
    </form>
</div>
</body>


<?php
include "../inc/footer.inc.php";
?>


<?php

if (isset ($_POST['submit'])) {
    $rate = $_POST['rate'];
    $memo = mysqli_real_escape_string($con, $_POST['memo']);

    if (!$rate) {
        echo '<script type="text/javascript">alert("Please record at least the potential rate);</script>';
    } else {
        mysqli_query($con, "UPDATE std_eps SET counselling_memo = '" . $memo . "', rate = '" . $rate . "' WHERE unique_id = '$unique_id' ") or die (mysqli_error());
    }

    if (isset ($_POST['ck-apply'])) {
        echo "<script>window.open('" . $link . "');</script>";
        echo '<script>location.replace("ss/std_list.php?EPname=' . $epName . '");</script>';
    } else {
        echo '<script>location.replace("ss/std_list.php?EPname=' . $epName . '");</script>';
    }
}

?>





