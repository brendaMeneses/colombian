<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$epName = "";
if (isset($_GET['EPname']) && !empty($_GET['EPname']))
    $epName = $_GET['EPname'];
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
<div class="container" style="border: 0;">
    <h3 style="letter-spacing: -1px;"><span
                style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>School Staff Page
        <small>for <?php echo substr($epName, 0, -6); ?></small>
    </h3>
</div>
<div class="container" style="margin-top: -60px;">

    <p class="lead text-warning">STUDENTS WAITING FOR COUNSELLING:</p>
    <?php

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $sql = mysqli_query($con, "SELECT familyName, firstName, gender, currentc, currents, interestc, interestm, nationality, cnslDate, id, tr_class, epName, startdate, unique_id, phone, email, memoforschool, start_time, finish_time, counselling_memo, rate, beforeep, application, language, epmemo
		FROM stdList
		WHERE epName = '$epName' 
		ORDER BY cnslDate DESC
		") or die(mysqli_error());

    $check_done = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class='finish'")
    or die(mysqli_error());

    $check_waiting = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class=''")
    or die(mysqli_error());

    $num_rows = mysqli_num_rows($sql);
    if ($num_rows < 1) { ?>
        <div class="alert alert-error"><strong>You don't have any students waiting for counseling yet! </strong></div>
        <?php
    }
    else { ?>

    <h3>Total : <strong><?php echo $num_rows ?></strong> / Waiting :
        <strong><?php echo mysqli_num_rows($check_waiting) ?></strong> / Finished :
        <strong><?php echo mysqli_num_rows($check_done) ?></strong></h3>

    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th style='text-align: center; font-size: 10px;'><abbr title="Counselling Number">Waiting#</abbr></th>
            <th style='text-align: center; font-size: 10px;'>Name</th>
            <th style='text-align: center; font-size: 10px;'>Gender</th>
            <th style='text-align: center; font-size: 10px;'>Nationality</th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Current School">Current Course</th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Current Course / NO = Currently Not Enrolled">Current
                    School</abbr></th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Interested Course">Expected Course</th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Interested Major">Expected Major</th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Expected Start Date">Start Date</th>
            <th style='text-align: center; font-size: 10px;'><abbr title="Student Waiting Time">Waiting</th>
            <th style='text-align: center; font-size: 10px;'><abbr
                        title="Please Click The Associated 'Start' Button When You Start Counseling">Counseling</abbr>
            </th>
        </tr>
        </thead>


        <?php
        }
        $waitnum = $num_rows;
        while ($stdList = mysqli_fetch_array($sql)) {
        date_default_timezone_set('Australia/Brisbane');
        $current_time = date('H:i:s', time());;
        $hh_current = substr($current_time, 0, 2);
        $ii_current = substr($current_time, 3, 2);

        $hh_listed = substr($stdList[8], 0, 2);
        $ii_listed = substr($stdList[8], 3, 2);

        $waiting = ($hh_current * 60 + $ii_current) - ($hh_listed * 60 + $ii_listed);

        //echo "<div class='epStdTable' id='hideRow". $stdList[9] ."' style='border-bottom:1px dotted #BABABA; opacity:".$stdList[10].";'>";
        echo "<tr id='hideRow" . $stdList[13] . "' class='" . $stdList[10] . "'>";
        //echo "<ul id='epStdTable-list'>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $waitnum . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[0] . ", " . $stdList[1] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[2] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[7] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[3] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[4] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[5] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[6] . "</td>";
        echo "<td style='text-align: center; font-size: 10px;'>" . $stdList[12] . "</td>";
        $fieldName = "tr_class" . $stdList[13];
        $formName = "form" . $fieldName;
        $waitnum--;

        ?>
        <form method="post" name="<?php echo $formName; ?>"
              action="ss/std_list.php?EPname=<?php echo $epName; ?>">

            <?php

            $check_counselling = mysqli_query($con, "SELECT epName FROM stdList WHERE id = '$stdList[9]' && tr_class='start'") or die(mysqli_error());
            $check_counselling_num = mysqli_num_rows($check_counselling);

            while ($row = mysqli_fetch_array($check_counselling, MYSQLI_NUM)) {
                $counsellingSchoolName = $row[0];
            }

            if ($check_counselling_num > 0 && $counsellingSchoolName != $epName && $stdList[20] == 0) {
                echo "
					<td style='text-align: center; font-size: 8pt;' colspan='2'><span class='badge'>Counselling at other</span></td>
				";

            } else if (empty($stdList[10])) {
                echo "<td style='text-align: center;'>" . $waiting . " mins</td>";
                echo "<form method='post' name=$formName>
							<td style='text-align: center;'><button id='start$fieldName' name='start$fieldName' type='submit' class='btn btn-success btn-xs' style='width:80px;' onClick='hideRow$stdList[13].setAttribute('class', 'counsel');'>
							<i class='icon-ok icon-white'></i> Start</button></td>
							</form>
							
					";
            } else if ($stdList[10] == 'start') {
                echo "<form method='post' name=$formName>
					<td style='text-align: center;' colspan='2'>
						<button id='finish$fieldName' name='finish$fieldName' type='submit' class='btn btn-danger btn-xs' style='width:80px;' onClick='hideRow$stdList[13].setAttribute('class', 'finish');'><i class='icon-ok icon-white'></i> Finish</button>
						<button id='cancel$fieldName' name='cancel$fieldName' type='submit' class='btn btn-warning btn-xs' style='width:80px;' onClick='hideRow$stdList[13].setAttribute('class', 'cancel');'><i class='icon-remove icon-white'></i> Cancel</button>";

                if ($epName == "ALS-B7eDe" or $epName == "QAT-gueEd" or $epName == "Embassy-fiEde" or $epName == "Kaplan-buEdj" or $epName == "ILSC-biEDe" or $epName == "CTI-4igjA" or $epName == "LCB-3sT5i") {

                    $elicos_applied = mysqli_query($con, "SELECT epName FROM students_applied WHERE email='$stdList[15]' AND epName='$epName'") or die(mysqli_error());
                    $elicos_applied_num = mysqli_num_rows($elicos_applied);

                    if ($elicos_applied_num == 1) {
                        echo " <button class='btn btn-xs btn-secondary' style='width:80px;' disabled><i class='icon-ok icon-white'></i> Applied</button>";
                    } else {
                        echo " <button id='apply$fieldName' name='apply$fieldName' type='submit' class='btn btn-xs btn-info' style='width:80px;' OnClick=\"return confirm('This counselling automatically finished. Are you sure this student is ready to apply the course of your institution?');\"><i class='icon-ok icon-white'></i> Apply</button>";
                    }
                }


                if ($epName == "Others-49b2a") {
                    echo "</td></form><tr><td colspan='11'><span class='badge'>Memo from SOL Edu Staff</span> <span style='font-size: 8pt;'>" . $stdList[16] . "</span></td></tr>
					<tr><td colspan='11'><span class='badge'>EC Memo</span> <span style='font-size: 8pt;'>" . $stdList[24] . "</span></td></tr>";
                } else {
                    echo "</td></form><tr><td colspan='11'><span class='badge'>Memo from SOL Edu Staff</span> <span style='font-size: 8pt;'>" . $stdList[16] . "</span></td>";
                }


            } else if ($stdList[10] == 'remove') {
                echo "<td style='text-align: center; font-size: 8pt;' colspan='2'>Cancelled</td>";
            } else {
                echo "<td style='text-align: center; font-size: 8pt;' colspan='2'><a href='ss/std_record.php?sid=" . $stdList[13] . "&EPname=" . $epName . "'>Time Record : " . $stdList[17] . " ~ " . $stdList[18] . "</a></td>";
            }

            echo "</form>";
            echo "</tr>";


            $uniqueID2Hide = $stdList[13]; /*Take the unique_id number generated from the first query.*/

            if (isset($_POST["cancel" . $fieldName])) {

                date_default_timezone_set('Australia/Brisbane');
                $when = date('Y/m/d H:i:s', time());

                $updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='', start_time='' WHERE unique_id='$uniqueID2Hide'")
                or die (mysqli_error());
                echo "<script>window.location.href=window.location.href</script>";
            }

            if (isset($_POST["start" . $fieldName])) {

                date_default_timezone_set('Australia/Brisbane');
                $when = date('Y/m/d H:i:s', time());

                $updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='start', start_time='$when' WHERE unique_id='$uniqueID2Hide'")
                or die (mysqli_error($con));
                echo "<script>window.location.href=window.location.href</script>";
            }

            if (isset($_POST["finish" . $fieldName])) {

                date_default_timezone_set('Australia/Brisbane');
                $when = date('Y/m/d H:i:s', time());

                $updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='finish', finish_time='$when' WHERE unique_id='$uniqueID2Hide'")
                or die (mysqli_error());
                echo '<script>location.replace("ss/std_record.php?sid=' . $uniqueID2Hide . '&EPname=' . $epName . '");</script>';
            }

            if (isset($_POST["apply" . $fieldName])) {
                date_default_timezone_set('Australia/Brisbane');
                $when = date('Y/m/d H:i:s', time());

                $updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='finish', finish_time='$when', rate='5', counselling_memo='Application Submitted.' WHERE unique_id='$uniqueID2Hide'")
                or die (mysqli_error());

                if ($epName == "ALS-B7eDe") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/als-application-form';
                } else if ($epName == "QAT-gueEd") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/qat-application-form';
                } else if ($epName == "Embassy-fiEde") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/embassy-application-form';
                } else if ($epName == "ILSC-biEDe") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/ilsc-application-form';
                } else if ($epName == "CTI-4igjA") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/cti-application-form';
                } else if ($epName == "Kaplan-buEdj" or $epName == "LCB-3sT5i" or $epName == "Others-49b2a") {
                    echo '<script>window.onload = function(){window.open("http://soledu.net/other-application-form';
                }

                echo '/?url=' . $actual_link . '&firstName=' . $stdList[1] . '&lastName=' . $stdList[0] . '&email=' . $stdList[15]
                    . '&mobile=' . $stdList[14] . '&ep=' . $stdList[21] . '&nationality=' . $stdList[7] . '&gender=' . $stdList[2]
                    . '&language=' . $stdList[23] . '&from=SStaff' . '", "_self");}</script>';

            }
            }

            echo "</table>"; ?>
</div>

<?php
include "../inc/footer.inc.php";
?>
	

	