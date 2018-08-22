<?php

require_once "../inc/db.inc.php";

if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];

mysqli_query($con, "UPDATE students SET checkinTime = NULL WHERE email = '$whoStudent' ") or die (mysqli_error());

header("Location: index.php");
die();