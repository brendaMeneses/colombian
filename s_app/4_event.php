<?php
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
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-handshake-o" aria-hidden="true"></i> Waiting</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/2_booking.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-comments-o" aria-hidden="true"></i> Booking</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/3_gift.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-gift" aria-hidden="true"></i> Gift</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="<?php echo "student/5_special.php?sid=$whoStudent"; ?>" class="btn btn-default"
                       style="font-size: 11px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Special</a>
                </div>
            </div>

            <!-- Space -->
            <div class="entryRow" style="margin-bottom: 20px;"></div>

            <div class="entryRow">
                <h4 style="color: #3d81bb;">Upcoming Events</h4>
                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="http://soledu.net/tw/byronbay-tour-260518/" target="_blank">
                        <img src="student/event/byron_bay.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">Byron Bay 拜倫灣一日游行程 (Saturday, 26/05/2018)</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">best price $18 per person / Inc. all
                        transportations and guide /
                        <mark>Only available for Chinese speakers</mark>
                    </p>
                    <dl>
                        <dt>About SIIT</dt>
                        <dd>Sydney Institute of Interpreting and Translating (SIIT) is a registered training
                            organisation for training interpreters and translators. Also, there is the Brisbane campus.
                            <a href="http://www.siit.nsw.edu.au/?page_id=3488" target="_blank"><i class="fa fa-link"
                                                                                                  aria-hidden="true"></i>
                                Visit Website</a></dd>
                    </dl>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="https://www.facebook.com/SOLEdu.Chinese" target="_blank">
                        <img src="student/event/tw_facebook.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">脸书五星评论活动</p>
                    <p style="font-size: 14px; letter-spacing: 0.3px; font-weight: 300;">給予粉絲團五星評論，并留言分享你的SOL經驗，既能參加【$20 GIFT CARD 週週抽】的活動。 *最佳人氣留言者可獲得價值百元的一日游（或等價獎品）
                        <mark>Only available for Chinese speakers</mark>
                    </p>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="http://soledu.net/kr/government-sponsor-seminar-27-04-2018/" target="_blank">
                        <img src="student/event/korea.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">
                        호주 전지역 주정부 스폰서 총정리 세미나 (Friday, 27/04/2018)</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">FREE EVENT
                        <mark>Only available for Korean</mark>
                    </p>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="https://www.facebook.com/SOLEdu.Chinese/" target="_blank">
                        <img src="student/event/tw_dream.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">SOL留言分享抽獎</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">公開分享粉絲頁影片到你的塗鴉墻，參與大抽獎活動。
                        <mark>Only available for Chinese speakers</mark>
                    </p>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="http://soledu.net/jp/gourmet-map-17-05-2018/" target="_blank">
                        <img src="student/event/japan.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">グルメマップをみんなで作ろう！ (Thursday,17/05/2018)</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">FREE EVENT
                        <mark>Only available for Japanese</mark>
                    </p>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="https://www.facebook.com/soledu.vietnam/" target="_blank">
                        <img src="student/event/pr.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">PR PATHWAYS Seminar (Upcoming in the middle of May)</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">FREE EVENT
                        <mark>Only available for Vietnamese</mark>
                    </p>
                </div>

                <div class="entryRow" style="margin-bottom: 15px; border-bottom: 1px solid #ccc;">
                    <a href="https://www.facebook.com/soledu.vietnam/" target="_blank">
                        <img src="student/event/pte.jpg" style="width: 100%;"/>
                    </a>
                    <p style="font-size: 18px; letter-spacing: -0.5px; font-weight: 300; margin-bottom: -3px;">PTE & IELTS (Upcoming in the early of May)</p>
                    <p style="font-size: 14px; letter-spacing: -0.3px; font-weight: 300;">FREE EVENT
                        <mark>Only available for Vietnamese</mark>
                    </p>
                </div>

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