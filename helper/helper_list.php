<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";
?>
<meta http-equiv="refresh" content="10">

<style>
    @import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);

    @media (min-width: 1200px) {
        .container-fluid {
            width: 1200px !important;
            margin: 0 auto !important;
            padding: 0px !important;
        }

        .container {
            width: 1200px !important;
        }

        .no-show, .no-show * {
            visibility: hidden !important;
        }

        body {
            background-color: white;
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
                style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>Helper Page
        <small>for</small> <?php echo substr($_GET['EPname'], 0, -6); ?></h3>
</div>
<div class="container" style="margin-top: -60px;">
    <p class="lead text-warning">STUDENTS WAITING FOR COUNSELLING:</p>
    <?php
    $epName = $_GET['EPname'];
    $sql = mysqli_query($con, "SELECT familyName, firstName, gender, currentc, currents, interestc, interestm, nationality, cnslDate, id, tr_class, epName, startdate, unique_id, phone, email, epmemo, start_time, finish_time, counselling_memo, rate, SMS
FROM stdList WHERE epName = '$epName' ORDER BY cnslDate DESC") or die(mysqli_error());

    $check_done = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class='finish'")
    or die(mysqli_error());

    $check_waiting = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class=''")
    or die(mysqli_error());

    $num_rows = mysqli_num_rows($sql);
    if ($num_rows < 1) { ?>
        <div class="alert alert-error"><strong>You don't have any students waiting for counseling yet! </strong></div>
        <?php
    }
    else {
    ?>
    <h3>Total : <strong><?php echo $num_rows ?></strong> / Waiting :
        <strong><?php echo mysqli_num_rows($check_waiting) ?></strong> / Finished :
        <strong><?php echo mysqli_num_rows($check_done) ?></strong></h3>
    <table class="table table-striped table-bordered table-hover" style="font-size: 11px;">
        <thead>
        <tr>
            <th style='text-align: center;' width="5%">Wait#</th>
            <th style='text-align: center;' width="6%">Listed</th>
            <th style='text-align: center;' width="7%">Gender</th>
            <th style='text-align: center;'>Name</th>
            <th style='text-align: center;' width="10%">Nationality</th>
            <th style='text-align: center;' width="10%">Interested</th>
            <th style='text-align: center;' width="8%">Applied? (ELICOS)</th>
            <th style='text-align: center;' width="9%">Waiting</th>
            <th style='text-align: center;' width="10%">Counseling</th>
            <th style='text-align: center;' width="10%">Remove</th>
            <th style='text-align: center;' width="7%">SMS</th>
        </tr>
        </thead>
        <?php }
        $waitnum = $num_rows;
        date_default_timezone_set('Australia/Brisbane');
        $current_time = date('H:i:s', time());;

        while ($stdList = mysqli_fetch_array($sql)) {
            if ($stdList[10] != 'finish') {
                $hh_current = substr($current_time, 0, 2);
                $ii_current = substr($current_time, 3, 2);

                $hh_listed = substr($stdList[8], 0, 2);
                $ii_listed = substr($stdList[8], 3, 2);

                $waiting = ($hh_current * 60 + $ii_current) - ($hh_listed * 60 + $ii_listed);

                //echo "<div class='epStdTable' id='hideRow". $stdList[9] ."' style='border-bottom:1px dotted #BABABA; opacity:".$stdList[10].";'>";
                echo "<tr id='hideRow" . $stdList[13] . "' class='" . $stdList[10] . "'>";
                //echo "<ul id='epStdTable-list'>";
                echo "<td style='text-align: center; font-size: 9pt;'>" . $waitnum . "</td>";
                echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[8] . "</td>";
                echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[2] . "</td>";
                echo "<td style='text-align: center; font-size: 9pt;'><a href='helper/bigger.php?sid=$stdList[15]' target='_blank'>" . $stdList[0] . ", " . $stdList[1] . "</a></td>";
                echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[7] . "</td>";
                echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[5] . "</td>";

                $elicos_applied = mysqli_query($con, "SELECT epName FROM students_applied WHERE email='$stdList[15]' AND epName='$epName'") or die(mysqli_error());
                $elicos_applied_num = mysqli_num_rows($elicos_applied);

                $apply_link = "%s";
                if ($epName == "Applied and Collect the Gift-394ad") {
                    $apply_link = "<a href='application/studentDetail.php?sid=$stdList[15]' target='_blank'>%s</a>";
                }

                if ($elicos_applied_num == 1) {
                    echo "<td style='text-align: center; font-size: 9pt;'>" . sprintf($apply_link, "Yes") . "</td>";
                } else {
                    echo "<td style='text-align: center; font-size: 9pt;'>" . sprintf($apply_link, "No") . "</td>";
                }


                $waitnum--;

                $fieldName = "tr_class" . $stdList[13];
                $formName = "form" . $fieldName;

                $check_counselling = mysqli_query($con, "SELECT epName FROM stdList WHERE id = '$stdList[9]' && tr_class='start'") or die(mysqli_error());
                $check_counselling_num = mysqli_num_rows($check_counselling);

                while ($row = mysqli_fetch_array($check_counselling, MYSQLI_NUM)) {
                    $counsellingSchoolName = $row[0];
                }

                /*if ($stdList[10] == 'finish' && $stdList[20] > 0) {
                    echo "<td style='text-align: center; font-size: 8pt;' colspan='4'><span class='badge' style='margin-right: 10px;'>Counselling Finished</span>Time Record : " . $stdList[17] . " ~ " . $stdList[18] . "</td>";
                } else*/
                if ($check_counselling_num > 0 && $counsellingSchoolName == $epName) {
                    echo "
						<td style='text-align: center; font-size: 8pt;' colspan='4'><span class='badge' style='background-color: red;'>Counselling is On</span></td>
					";
                } else if ($check_counselling_num > 0 && $counsellingSchoolName != $epName) {
                    echo "
						<td style='text-align: center; font-size: 8pt;' colspan='3'><span class='badge'>Counselling Now at " . substr($counsellingSchoolName, 0, -6) . "</span><form method='post' name=$formName>
						</form></td>
						<td style='text-align: center; font-size: 8pt;'><span style='font-size: 8pt;'>
						
					";
                    if ($stdList[21] < 3) {
                        echo "
						<form method='post' name=$formName '>
							<button type='submit' id='sendSMS$fieldName' name='sendSMS$fieldName' class='btn btn-primary btn-xs' OnClick=\"return confirm('Do you want to send a text message?');\">SMS (" . $stdList[21] . ")</button>
						</form>
						</td>";
                    } else {
                        echo "Max</span></td>";
                    }
                } else if (empty($stdList[10])) {
                    echo "<td style='text-align: center; font-size: 9pt;'>" . $waiting . " mins</td>";

                    echo
                    "
					<form method='post' name=$formName '>
					<td style='text-align: center;'>
					<button id='start$fieldName' name='start$fieldName' type='submit' class='btn btn-success btn-xs' OnClick=\"return confirm('Counselling progress starts. Are you sure?');\">
					<i class='icon-ok icon-white'></i> Start</button></td>
					</form>";

                    echo
                    "
					<form method='post' name=$formName '>
					<td style='text-align: center;'><button id='remove$fieldName' name='remove$fieldName' type='submit' class='btn btn-warning btn-xs' OnClick=\"return confirm('Student will be removed from the waiting list. Are you sure?');\">
					<i class='icon-remove icon-white'></i>Remove</button></td>
					</form>
					<td style='text-align:center;'><span style='font-size: 8pt;'>";

                    if ($stdList[21] < 3) {
                        echo "
						<form method='post' name=$formName '>
							<button type='submit' id='sendSMS$fieldName' name='sendSMS$fieldName' class='btn btn-primary btn-xs' OnClick=\"return confirm('Do you want to send a text message?');\">SMS (" . $stdList[21] . ")</button>
						</form>
						</td>";
                    } else {
                        echo "Max</span></td>";
                    }
                } else if ($stdList[10] == 'start') {
                    echo "<form method='post' name=$formName >
						  <td style='text-align: center;' colspan='4'><button id='cancel$fieldName' name='cancel$fieldName' type='submit' class='btn btn-success btn-xs' OnClick=\"return confirm('The counselling is now on. Are you sure you want to cancel the counselling?');\">
						  <i class='icon-remove icon-white'></i>Counselling is On. Cancel?</button></td>
						  </form>";
                } else {
                    echo "<form method='post' name=$formName >
						  <td style='text-align: center;' colspan='4'><button id='cancel$fieldName' name='cancel$fieldName' type='submit'
						  class='btn btn-warning btn-xs' style='width:80px;' OnClick=\"return confirm('This will bring back to the student to the waiting list. Are you sure?');\">
						  <i class='icon-remove icon-white'></i>Cancel</button></td>
						  </form>";
                } ?>
                </tr>
                <?php

                $uniqueID2Hide = $stdList[13]; /*Take the unique_id number generated from the first query.*/

                if (isset($_POST["start" . $fieldName])) {

                    date_default_timezone_set('Australia/Brisbane');
                    $when = date('Y/m/d H:i:s', time());


                    $updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='start', start_time='$when' WHERE unique_id='$uniqueID2Hide'")
                    or die (mysqli_error());
                    echo "<script>window.location.href=window.location.href</script>";
                }

                $removestd = $stdList[13]; //Take the student ID number generated from the first query.


                if (isset($_POST["remove" . $fieldName])) {
                    $updateOpacity = mysqli_query($con, "UPDATE stdList SET tr_class='remove' WHERE unique_id='$removestd'")
                    or die (mysqli_error());
                    echo "<script>window.location.href=window.location.href</script>";
                }

                $cancelstd = $stdList[13]; //Take the student ID number generated from the first query.

                if (isset($_POST["cancel" . $fieldName])) {
                    $updateOpacity = mysqli_query($con, "UPDATE stdList SET tr_class='' WHERE unique_id='$cancelstd'")
                    or die (mysqli_error());
                    echo "<script>window.location.href=window.location.href</script>";
                }

                $SMSstd = $stdList[13]; //Take the student ID number generated from the first query.


                if (isset($_POST["sendSMS" . $fieldName])) {
                    $selectStudent = mysqli_query($con, "SELECT Phone from stdList WHERE unique_id='$SMSstd'")
                    or die (mysqli_error());

                    while ($selectStudentList = mysqli_fetch_array($selectStudent)) {
                        $textphone = $selectStudentList[0] . "@sms.clicksend.com";

                        $subject = "";
                        $txt = "Hi " . $stdList[1] . "! Your " . substr($epName, 0, -6) . " counselling will start soon. Please show this text to SOL staff near " . substr($epName, 0, -6) . " desk now.";
                        $headers = "From: sms@iaemember.com" . "\r\n";


                        mail($textphone, $subject, $txt, $headers);

                        $sms_count = $stdList[21] + 1;
                        mysqli_query($con, "UPDATE stdList SET SMS = '" . $sms_count . "' WHERE unique_id = '$stdList[13]' ") or die (mysqli_error());


                    }


                    echo "<script>window.location.href=window.location.href</script>";
                }
            }
        }
        echo "</table>";
        ?>
</div>
<p>&nbsp;</p>
<div class="container" style="margin-top: -60px;">
    <p class="lead text-warning">STUDENTS ALREADY FINISHED COUNSELLING</p>
    <?php
    $sql_done = mysqli_query($con, "SELECT familyName, firstName, gender, currentc, currents, interestc, interestm, nationality, cnslDate, id, tr_class, epName, startdate, unique_id, phone, email, epmemo, start_time, finish_time, counselling_memo, rate, SMS
FROM stdList WHERE epName = '$epName' AND tr_class='finish' ORDER BY cnslDate DESC") or die(mysqli_error());
    $num_rows_done = mysqli_num_rows($sql_done);
    if ($num_rows_done < 1) { ?>
        <div class="alert alert-error"><strong>There is no student finishes counselling! </strong></div>
        <?php
    }
    else {
    ?>
    <h3>Finished : <strong><?php echo $num_rows_done ?></strong></h3>
    <table class="table table-striped table-bordered table-hover" style="font-size: 11px;">
        <thead>
        <tr>
            <th style='text-align: center;' width="5%">Wait#</th>
            <th style='text-align: center;' width="6%">Listed</th>
            <th style='text-align: center;' width="7%">Gender</th>
            <th style='text-align: center;'>Name</th>
            <th style='text-align: center;' width="10%">Nationality</th>
            <th style='text-align: center;' width="10%">Interested</th>
            <th style='text-align: center;' width="8%">Applied? (ELICOS)</th>
            <th style='text-align: center;' width="9%">Waiting</th>
            <th style='text-align: center;' width="10%">Counseling</th>
            <th style='text-align: center;' width="10%">Remove</th>
            <th style='text-align: center;' width="7%">SMS</th>
        </tr>
        </thead>
        <?php }
        $waitnum_done = $num_rows_done;
        while ($stdList = mysqli_fetch_array($sql_done)) {
            //echo "<div class='epStdTable' id='hideRow". $stdList[9] ."' style='border-bottom:1px dotted #BABABA; opacity:".$stdList[10].";'>";
            echo "<tr id='hideRow" . $stdList[13] . "' class='" . $stdList[10] . "'>";
            //echo "<ul id='epStdTable-list'>";
            echo "<td style='text-align: center; font-size: 9pt;'>" . $waitnum_done . "</td>";
            echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[8] . "</td>";
            echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[2] . "</td>";
            echo "<td style='text-align: center; font-size: 9pt;'><a href='helper/bigger.php?sid=$stdList[15]'>" . $stdList[0] . ", " . $stdList[1] . "</a></td>";
            echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[7] . "</td>";
            echo "<td style='text-align: center; font-size: 9pt;'>" . $stdList[5] . "</td>";

            $elicos_applied = mysqli_query($con, "SELECT epName FROM students_applied WHERE email='$stdList[15]' AND epName='$epName'") or die(mysqli_error());
            $elicos_applied_num = mysqli_num_rows($elicos_applied);

            $apply_link = "%s";
            if ($epName == "Applied and Collect the Gift-394ad") {
                $apply_link = "<a href='application/studentDetail.php?sid=$stdList[15]' target='_blank'>%s</a>";
            }

            if ($elicos_applied_num == 1) {
                echo "<td style='text-align: center; font-size: 9pt;'>" . sprintf($apply_link, "Yes") . "</td>";
            } else {
                echo "<td style='text-align: center; font-size: 9pt;'>" . sprintf($apply_link, "No") . "</td>";
            }

            $waitnum_done--;

            if ($stdList[10] == 'finish') {
                echo "<td style='text-align: center; font-size: 8pt;' colspan='4'><span class='badge' style='margin-right: 10px;'>Counselling Finished</span>Time Record : " . $stdList[17] . " ~ " . $stdList[18] . "</td>";
            } ?>
            </tr>
            <?php
        }
        echo "</table>";
        ?>
</div>

<?php
include "../inc/footer.inc.php";
?>
