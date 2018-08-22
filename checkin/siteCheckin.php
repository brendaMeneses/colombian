<?php

$stdEmail = "";
$stdPhone = "";
if (isset($_GET['stdEmail']) && !empty($_GET['stdEmail']))
    $stdEmail = $_GET['stdEmail'];
if (isset($_GET['stdPhone']) && !empty($_GET['stdPhone']))
    $stdPhone = $_GET['stdPhone'];

include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";
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

    <form name="mainform" method="post" class="form-horizontal">
        <?php include "../inc/navigation.php"; ?>
        <div class="container" style="border: 0;">
            <h3 style="letter-spacing: -1px;"><span
                        style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Edu
                Study
                Fair Check-in
                <small>Check-in for Site-registration</small>
            </h3>
        </div>
        <div class="container" style="margin-top: -60px;">
            <div class="entryRow">
                <label for="nationality">Student's Nationality</label>
                <select class="form-control" name="nationality" id="nationality">
                    <?php include "../inc/list_nationality.php"; ?>
                </select>
            </div>
            <div class="entryRow">
                <label for="stdFirstName">First Name</label>
                <input class="form-control" type="text" name="stdFirstName" id="stdFirstName"/>
            </div>
            <div class="entryRow">
                <label for="stdLastName">Last Name</label>
                <input class="form-control" type="text" name="stdLastName" id="stdLastName"/>
            </div>
            <div class="entryRow">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="entryRow">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $stdEmail; ?>"
                       required/>
            </div>
            <div class="entryRow">
                <label for="phone">Mobile Number</label>
                <input class="form-control" type="phone" name="phone" id="phone" value="<?php echo $stdPhone; ?>"/>
            </div>
            <div class="entryRow">
                <blockquote>
                    <p>[Important] Please double check the student's detail before you submit.</p>
                    <footer>Most of our study fair system is working with these information. Please check again!
                    </footer>
                </blockquote>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block"><i
                            class="icon-plus icon-white"></i> Submit
                </button>
            </div>
        </div>
    </form>

<?php
include "../inc/footer.inc.php";
?>


<?php

if (isset ($_POST['submit'])) {

    date_default_timezone_set('Australia/Brisbane');
    $whenCheckedin = date('Y/m/d H:i:s', time());

    $nationality = $_POST['nationality'];
    $registerstatus = "Site-register";
    $familyName = mysqli_real_escape_string($con, $_POST['stdLastName']);
    $firstName = mysqli_real_escape_string($con, $_POST['stdFirstName']);
    $gender = $_POST['gender'];
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if ($phone == "") {
        $phone = '0400000000';
    }

    mysqli_query($con, "INSERT INTO students (familyName,firstName,email,phone,nationality,checkinTime,registerstatus,gender,Checkedin) VALUES ('$familyName', '$firstName', '$email', '$phone', '$nationality', '$whenCheckedin', '$registerstatus', '$gender','Yes')")
    or die (mysqli_error($con));

    $output = file_get_contents('http://soledu.net/qrcode/phpqrcode/qrsol/index.php?sid='.$email);
    //curl_post_async();

    $textphone = $phone . "@sms.clicksend.com";

    $subject = "";
    $txt = $firstName . ", Welcome to SOL Study Fair. Your personal link is http://soledu.net/sf/r.php?sid=" . $email; //Joker changed it
    $headers = "From: sms@iaemember.com" . "\r\n";

    mail($textphone, $subject, $txt, $headers);

    echo '<script>location.replace("checkin/index.php?stdFirstName=' . $firstName . '&successCheckedin=yes");</script>';
}
/*
function curl_post_async($url, $params)
{
    foreach ($params as $key => &$val) {
        if (is_array($val)) $val = implode(',', $val);
        $post_params[] = $key.'='.urlencode($val);
    }
    $post_string = implode('&', $post_params);

    $parts=parse_url($url);

    $fp = fsockopen($parts['host'],
        isset($parts['port'])?$parts['port']:80,
        $errno, $errstr, 30);

    $out = "POST ".$parts['path']." HTTP/1.1\r\n";
    $out.= "Host: ".$parts['host']."\r\n";
    $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
    $out.= "Content-Length: ".strlen($post_string)."\r\n";
    $out.= "Connection: Close\r\n\r\n";
    if (isset($post_string)) $out.= $post_string;

    fwrite($fp, $out);
    fclose($fp);
}
*/

?>