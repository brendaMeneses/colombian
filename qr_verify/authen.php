<?php
session_start();
$error = "none";
$error_msg = "Wrong password. Try again!";

$student = "";
if (isset($_GET['sid']) && !empty($_GET['sid']))
    $student = $_GET['sid'];

if (isset ($_POST['signin'])) {
    $passcode = $_POST['passcode'];

    if (strtolower($passcode) == "1qaz2wsx") {
        $_SESSION["authen"] = "kevin-26688";
        if(!empty($student)) {
            echo '<script>location.replace("verify.php?sid=' . $student . '");</script>';
        } else {
            $error = "block";
            $error_msg = "Cannot find student. Please scan QR code again";
        }
    } else {
        $error = "block";
    }
}
?>
<html>
<head>
    <title>SOL Edu Authentication</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link href="sol.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="http://soledu.net/wp-content/uploads/2018/01/soledu-logo-outline.png" alt="" width="114">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <div class="alert alert-danger" role="alert" style="display:<?php echo $error; ?>;">
        <?php echo $error_msg; ?>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="passcode" name="passcode" class="form-control" placeholder="Passcode" required
               autofocus>
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>