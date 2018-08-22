<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$whoStudent = "";
$phone = "";
$data = "";
$checkinTime = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
if (isset($_GET['phone']) && !empty($_GET['phone']))
    $phone = $_GET['phone'];
if (isset($_GET['data']) && !empty($_GET['data']))
    $data = $_GET['data'];

$result = mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality, checkinTime FROM students WHERE email='$whoStudent' ") or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $stdFamilyName = $row[0];
    $stdFirstName = $row[1];
    $stdEmail = $row[2];
    $stdPhone = $row[3];
    $stdNationality = $row[4];
    $checkinTime = $row[5];
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

    <form name="mainform" method="post" class="form-horizontal">
        <?php include "../inc/navigation.php"; ?>
        <div class="container" style="border: 0;">
            <h3 style="letter-spacing: -1px;"><span
                        style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Edu Study
                Fair Check-in
                <small> Search Result</small>
            </h3>
        </div>
        <div class="container" style="margin-top: -60px;">
            <?php

            if ($checkinTime == "") {
                if ($data == "no") {
                    echo '
						<p style="font-size: 100px; text-align: center;"><i class="fa fa-frown-o" aria-hidden="true" style="margin: 0;"></i><p>
						<p style="font-size: 30px; letter-spacing: -1px; text-align: center;">Lo sentimos,<br />No encontramos al estudiante.</p>
						<p style="font-size: 16px; text-align: center; margin-bottom: 30px;">¿Quieres buscar de nuevo? ó ¿Registrarte de nuevo?</p>

						<div class="col-xs-6">
							<button type="submit" name="search" id="search" class="btn btn-primary btn-sm btn-block" style="height: 50px;"><i class="fa fa-search" aria-hidden="true"></i> Buscar de nuevo</button>
						</div>
						<div class="col-xs-6">
							<button type="submit" name="siteCheckin" id="siteCheckin" class="btn btn-warning btn-sm btn-block" style="height: 50px;"><i class="fa fa-address-book" aria-hidden="true"></i> Registrarse</button>
						</div>
						';
                } else {
                    echo '
						<p style="font-size: 100px; text-align: center;"><i class="fa fa-smile-o" aria-hidden="true" style="margin: 0;"></i><p>
						<p style="font-size: 16px; text-align: center; margin-bottom: 30px; letter-spacing: -1px;">Please say "Bienvenido, ' . $stdFirstName . '" </p>
						<div class="entryRow">
				    		<label for="stdNationality">Nationality</label>
							<input class="form-control" type="text" name="stdNationality" id="stdNationality" value="' . $stdNationality . '" readonly="readonly" />
				    	</div>
						<div class="entryRow">
				    		<label for="stdFirstName">First Name</label>
							<input class="form-control" type="text" name="stdFirstName" id="stdFirstName" value="' . $stdFirstName . '" readonly="readonly" />
				    	</div>
				    	<div class="entryRow">
				    		<label for="stdLastName">Last Name</label>
							<input class="form-control" type="text" name="stdLastName" id="stdLastName" value="' . $stdFamilyName . '" readonly="readonly" />
				    	</div>
				    	<div class="entryRow">
					    	<label for="email">Email</label>
					    	<input class="form-control" type="email" name="email" id="email" value="' . $stdEmail . '" readonly="readonly" />
						</div>
						<div class="entryRow">
					    	<label for="phone">Mobile Number</label>
					    	<input class="form-control" type="phone" name="phone" id="phone" value="' . $stdPhone . '" readonly="readonly" />
						</div>
						<div class="entryRow" style="text-align: center;">
							<h4>¿La siguiente informacion es correcta?</h4>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<button type="submit" name="finalCheckin" id="finalCheckin" class="btn btn-success btn-lg btn-block" style="height: 50px;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Yes</button>
								<p class="help-block" style="text-align: center; font-size: 11px;">Finalizar el proceso de  check-in.</p>
							</div>
							<div class="col-xs-6">
								<button type="submit" name="search" id="search" class="btn btn-danger btn-lg btn-block" style="height: 50px;"><i class="fa fa-times" aria-hidden="true"></i> No</button>
								<p class="help-block" style="text-align: center; font-size: 11px;">Volver a la página de busqueda</p>
							</div>
						</div>
				    </div>
					';
                }
            } else {
                echo '
					<p style="font-size: 100px; text-align: center;"><i class="fa fa-meh-o" aria-hidden="true" style="margin: 0;"></i><p>
					<p style="font-size: 30px; letter-spacing: -1px; text-align: center; font-weight: 300;">hummmm...<br /><strong>' . $stdFirstName . '</strong> Ya se ha realizado el check in para este estudiante</p>
					<p style="font-size: 16px; text-align: center; margin-bottom: 30px; font-weight: 300;">Please let <strong>' . $stdFirstName . '</strong> go to the waiting room.</p>

					<div class="entryRow">
						<button type="submit" name="search" id="search" class="btn btn-primary btn-sm btn-block" style="height: 50px;"><i class="fa fa-search" aria-hidden="true"></i> Buscar otro estudiante</button>
					</div>
				';
            }


            ?>
        </div>
    </form>

<?php
include "../inc/footer.inc.php";
?>


<?php

if (isset ($_POST['search'])) {
    echo '<script>location.replace("checkin/index.php");</script>';
}

if (isset ($_POST['siteCheckin'])) {
    echo '<script>location.replace("checkin/siteCheckin.php?stdEmail=' . $whoStudent . '&stdPhone=' . $phone . '");</script>';
}

if (isset ($_POST['finalCheckin'])) {

    date_default_timezone_set('Australia/Brisbane');
    $whenCheckedin = date('Y/m/d H:i:s', time());

    mysqli_query($con, "UPDATE students SET checkinTime = '" . $whenCheckedin . "', Checkedin='Yes' WHERE email = '$whoStudent' ") or die (mysqli_error());

    $textphone = $stdPhone . "@sms.clicksend.com";

    $subject = "";
    $txt = $stdFirstName . ", Welcome to SOL Study Fair. Your personal link is http://soledu.net/sf/r.php?sid=" . $stdEmail;
    $headers = "From: sms@iaemember.com" . "\r\n";

    mail($textphone, $subject, $txt, $headers);

    echo '<script>location.replace("checkin/index.php?stdFirstName=' . $stdFirstName . '&successCheckedin=yes");</script>';
}
?>
