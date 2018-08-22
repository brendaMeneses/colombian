<?php
include "../../phpqrcode/phpqrcode.php";
include "../../inc/db.inc.php";

$whoStudent = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];

$result =
    mysqli_query($con, "SELECT familyName, firstName, email, phone, nationality FROM students WHERE email='$whoStudent'")
or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");

$num_rows = mysqli_num_rows($result);
if ($num_rows < 1) {
    die ("<div class='container'><div class='alert alert-error'><STRONG>STUDENT NOT FOUND!</STRONG></div></div>");
} else {
    mysqli_query($con, "UPDATE students SET link = CONCAT(\"<a href='http://soledu.net/qrcode/tsf-kv.php?sid=\",email,\"' target='_blank'><img src='http://soledu.net/wp-content/uploads/2018/03/followup_school_apply.png' style='width: 80px;'/></a>\") WHERE email='$whoStudent'");
}