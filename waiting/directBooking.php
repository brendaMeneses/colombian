<?php
	include "../inc/header.staff.inc.php";
	require_once "../inc/db.inc.php";
?>
<style>
@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);
@media (min-width:1200px) {
	.container-fluid{width: 1060px !important; margin:0 auto !important; padding:0px !important;}
	.container {width: 1060px !important;}
	.no-show, .no-show *
    {
        visibility: hidden !important;
    }
    body {
	    background-color: #white;
    }
}
@media only screen and (max-width: 767px) {
	.no-show, .no-show *
    {
        visibility: hidden !important;
    }
}
</style>

<form name="mainform" method="post" class="form-horizontal">
	<?php include "../inc/navigation.php"; ?>
	<div class="container" style="border: 0;">
		<h3 style="letter-spacing: -1px;"><span style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Study Fair <small>Direct School Booking</small></h3>
	</div>
	<div class="container" style="margin-top: -60px;">
		<div class="row" style="background-color: #b42403; color: white; text-align: center; padding: 30px;">
	    	<h3 style="letter-spacing: -1px; margin: 0; font-weight: 300; margin-bottom: 10px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><br />This page is for a student who already finished the previous counselling.</h3>
	    </div>
		<div class="entryRow">
	    	<label for="phone">Phone</label>
	    	<input class="form-control" type="text" name="phone" id="phone" placeholder="Mobile Number" autocomplete="off" style="font-size: 40px; height: 60px; text-align: center;" />
	    </div>

	    <div class="entryRow">
	    	<label for="email">Email</label>
	    	<input class="form-control" type="email" name="email" id="email" placeholder="Email Address" autocomplete="off" style="font-size: 40px; height: 60px; text-align: center;" />
    	</div>
	</div>
	<div class="container" style="border: 0; margin-top: -40px;">
		<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
	</div>
</form>


<?php
include "../inc/footer.inc.php";
?>

<?php

if ( isset ( $_POST['submit'] ) ){

	$phoneb4 = $_POST['phone'];
	$phone = mysqli_real_escape_string($con, $phoneb4);

	$emailb4 = $_POST['email'];
	$email = mysqli_real_escape_string($con, $emailb4);

	if ($phone == "" && $email == "") {
		echo '<script type="text/javascript">alert("Please put at least one information");</script>';
	}
	else{

		$result_phone=mysqli_query($con, "SELECT id, familyName, firstName, email, phone, language, nationality FROM students WHERE 
			phone='$phone'") or die( "<p><span style=\"color: red;\">Unable to select table</span></p>");
		$num_rows_phone = mysqli_num_rows( $result_phone);

		$result_email=mysqli_query($con, "SELECT id, familyName, firstName, email, phone, language, nationality FROM students WHERE 
			email='$email'") or die( "<p><span style=\"color: red;\">Unable to select table</span></p>");
		$num_rows_email = mysqli_num_rows( $result_email);

		if($num_rows_phone > 0){
			while ($row = mysqli_fetch_array($result_phone, MYSQLI_NUM)) {
				$id = $row[0];
				$familyName = $row[1];
				$firstName = $row[2];
				$email = $row[3];
				$phone = $row[4];
				$language = $row[5];
				$nationality = $row[5];
			}
			echo '<script>location.replace("waiting/schoolBooking.php?sid='.$email.'");</script>';
		}
		else if($num_rows_email > 0){
			while ($row = mysqli_fetch_array($result_email, MYSQLI_NUM)) {
				$id = $row[0];
				$familyName = $row[1];
				$firstName = $row[2];
				$email = $row[3];
				$phone = $row[4];
				$language = $row[5];
				$nationality = $row[6];
			}
			echo '<script>location.replace("waiting/schoolBooking.php?sid='.$email.'");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Sorry, Our system cannot find the student. Please try again.");</script>';
		}
	}
}
?>