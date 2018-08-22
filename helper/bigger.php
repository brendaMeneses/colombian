<?php
require_once "../inc/db.inc.php";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $whoStudent = $_GET['sid'];
$result = mysqli_query($con, "SELECT familyName, firstName, nationality FROM students WHERE email='$whoStudent' ")
or die("<div class='alert alert-error'>SOMETHING WRONG, GO BACK.</div>");
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $stdFamilyName = $row[0];
    $stdFirstName = $row[1];
    $stdNationality = $row[2];
}
?>
<html>
<head>
    <title>Name</title>
</head>
<body>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; min-height: 100vh;">
    <div style="font-size: 10em; ">
        <?php echo $stdFamilyName . ", " . $stdFirstName ?>
    </div>
    <div style="font-size: 3em; font-style: italic; ">
        (<?php echo $stdNationality ?>)
    </div>
</div>
</body>
</html>
