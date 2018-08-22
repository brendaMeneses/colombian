<?php
include "../inc/header.staff.inc.php";
require_once "../inc/db.inc.php";

$stdFirstName = "";
$successCheckedin = "";
if (isset($_GET['stdFirstName']) && !empty($_GET['stdFirstName']))
    $stdFirstName = $_GET['stdFirstName'];
if (isset($_GET['successCheckedin']) && !empty($_GET['successCheckedin']))
    $successCheckedin = $_GET['successCheckedin'];
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
                        style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>Check in Tour por Colombia
                <small>Pagina principal</small>
            </h3>
        </div>
        <div class="container" style="margin-top: -60px;">
            <?php if ($successCheckedin == "yes") { ?>
                <div class="entryRow"
                     style="background-color: #2a5d89; color: white; text-align: center; padding: 10px;">
                    <h3 style="letter-spacing: -1px; margin: 0; font-weight: 300;"><i class="fa fa-check-circle-o"
                                                                                      aria-hidden="true"></i>Bien!
                        <strong><?php echo $stdFirstName; ?></strong> Has hecho checked-in satisfactoriamente.</h3>
                    <span style="font-weight: 300;">Por favor  <strong><?php echo $stdFirstName; ?></strong> Toma asiento, la conferencia esta a minutos de comenzar <i
                                class="fa fa-smile-o" aria-hidden="true"></i></span>
                </div>
            <?php } ?>
            <div class="entryRow">
                <label for="phone">Teléfono</label>
                <input class="form-control" type="text" name="phone" id="phone" placeholder="Número de Teléfono"
                       autocomplete="off" style="font-size: 40px; height: 60px; text-align: center;"/>
            </div>

            <div class="entryRow">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email "
                       autocomplete="off" style="font-size: 40px; height: 60px; text-align: center;"/>
            </div>
        </div>
        <div class="container" style="border: 0; margin-top: -40px;">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"
                                                                                            aria-hidden="true"></i>
                Buscar
            </button>
        </div>
    </form>


<?php
include "../inc/footer.inc.php";
?>

<?php

if (isset ($_POST['submit'])) {

    $phoneb4 = $_POST['phone'];
    $phone = mysqli_real_escape_string($con, $phoneb4);  // $phone = mysqli_real_escape_string( $con, $con, $phoneb4);

    $emailb4 = $_POST['email'];
    $email = mysqli_real_escape_string($con, $emailb4);  // $email = mysqli_real_escape_string( $con, $con,$emailb4);

    if ($phone == "" && $email == "") {
        echo '<script type="text/javascript">alert("Please put at least one information");</script>';
    } else {
        $result_phone = mysqli_query($con, "SELECT id, familyName, firstName, email, phone FROM students WHERE
			phone='$phone'") or die("<p><span style=\"color: red;\">Unable to select table</span></p>");
        $num_rows_phone = mysqli_num_rows($result_phone);

        $result_email = mysqli_query($con, "SELECT id, familyName, firstName, email, phone  FROM students WHERE
			email='$email'") or die("<p><span style=\"color: red;\">Unable to select table</span></p>");
        $num_rows_email = mysqli_num_rows($result_email);

        if ($num_rows_phone > 0) {
            while ($row = mysqli_fetch_array($result_phone, MYSQLI_NUM)) {
                $id = $row[0];
                $familyName = $row[1];
                $firstName = $row[2];
                $email = $row[3];
                $phone = $row[4];
                //$emailMD5 = $row[5];
                $language = $row[5];
                $nationality = $row[6];
            }
            echo '<script>location.replace("checkin/searchResult.php?sid=' . $email . '");</script>';
        } else if ($num_rows_email > 0) {
            while ($row = mysqli_fetch_array($result_email, MYSQLI_NUM)) {
                $id = $row[0];
                $familyName = $row[1];
                $firstName = $row[2];
                $email = $row[3];
                $phone = $row[4];
                //$emailMD5 = $row[5];
                $language = $row[5];
                $nationality = $row[6];
            }
            echo '<script>location.replace("checkin/searchResult.php?sid=' . $email . '");</script>';
        } else {
            //echo "phone" . $num_rows_phone;
            //echo "email" . $num_rows_email;

            echo '<script>location.replace("checkin/searchResult.php?sid=' . $email . '&phone=' . $phone . '&data=no");</script>';
        }
    }
}
?>
