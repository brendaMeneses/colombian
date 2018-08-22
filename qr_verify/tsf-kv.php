<?php

require_once "inc/db.inc.php"; // for hosting
//require_once "../inc/db.inc.php"; // for local

$student = "";
$t = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $student = $_GET['sid'];
if (isset($_GET['t']) && !empty($_GET['t']))
    $t = $_GET['t'];

$domain = "http://soledu.net/kevin-268/followup/?sid=";

$result = mysqli_query($con, "SELECT email FROM students WHERE email='$student' ") or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $stdEmail = $row[0];
}

if (!empty($stdEmail)) {
    if (!empty(t)) {
        header('Location: ' . $domain . trim($student) . "&t=" . $t);
    } else {
        header('Location: ' . $domain . trim($student));
    }
} else {
    echo "STUDENT NOT FOUND";
}

//http://soledu.net/studyfair_app/followup/?sid=kevin@soledu.net