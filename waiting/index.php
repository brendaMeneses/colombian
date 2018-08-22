<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";
?>

    <meta http-equiv="refresh" content="5">

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
    <div class="container" style="border: 0;">
        <h3 style="letter-spacing: -1px;"><span
                    style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Study
            Fair
            <small> Waiting List</small>
        </h3>
    </div>
    <div class="container" style="margin-top: -60px;">
        <!--<div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong>Assist Queen - Eileen (105)</strong> / Freya (54) / Nontouch (54) / Maria (49) / Keith (45) / Akiko
            (44) / Beto (42) /Nick (28)
        </div>-->
        <div class="entryRow">
            <div class="entryRow" style="padding: 10px;">
                <table class="table table-striped" style="text-align: center; font-size: 9pt; letter-spacing: -0.3px;"
                       valign="middle">
                    <thead>
                    <th style="width: 12%; text-align: center;">Waiting Time</th>
                    <th style="text-align: center;">Student Information</th>
                    <th style="width: 15%; text-align: center;">Action</th>
                    </thead>
                    <?php
                    $result = mysqli_query($con, "SELECT registerstatus, familyName, firstName, email, phone, nationality, checkinTime, gender, interestc FROM students WHERE checkinTime<>'' AND served='No' ORDER BY checkinTime ASC ") or die(mysqli_error());
                    while ($waitingList = mysqli_fetch_array($result)) {

                        date_default_timezone_set('Australia/Brisbane');

                        $registerStatus = $waitingList[0];
                        $stdFamilyName = $waitingList[1];
                        $stdFirstName = $waitingList[2];
                        $stdEmail = $waitingList[3];
                        $stdPhone = $waitingList[4];
                        $stdNationality = $waitingList[5];

                        $checkinTime = $waitingList[6];
                        $stdGender = $waitingList[7];
                        $current_time = date("Y-m-d H:i:s");

                        $interval = round((strtotime($current_time) - strtotime($checkinTime)) / 60);
                        ?>


                        <tr <?php if ($registerStatus == "Site-register") {
                            echo "class='danger'";
                        } ?>>
                            <td style="vertical-align: middle"><p
                                        style="font-size: 30px; margin: 0;"><?php echo $interval; ?></p>
                                <p style="margin: 0;">mins</p></td>
                            <td style="vertical-align: middle">
                                <p style="font-size: 15px; margin: 0;"><?php echo $stdFirstName . ' ' . $stdFamilyName ?></p>
                                <p style="font-size: 10px; margin: 0;"><?php echo $registerStatus . ' / ' . $stdNationality . ' / ' . $stdGender ?>
                            </td>
                            <td style="vertical-align: middle">
                                <a href="waiting/assistEP.php?sid=<?php echo $stdEmail; ?>">
                                    <?php if ($registerStatus == "Site-register") {
                                        echo '<img src="waiting/image/button_register_now.png" style="padding: 10px 0;" />';
                                    } else {
                                        echo '<img src="waiting/image/button_assit_now.png" style="padding: 10px 0;" />';
                                    } ?></a><br/>
                                <a href="waiting/cancelWaiting.php?sid=<?php echo $stdEmail; ?>"
                                   onclick="return confirm('Are you sure to cancel this <?php echo $stdFirstName . ' ' . $stdFamilyName ?>?')">
                                    Cancel
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php
include "../inc/footer.inc.php";
?>