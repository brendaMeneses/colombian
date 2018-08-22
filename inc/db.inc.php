<?php
//$con = mysqli_connect("localhost","iaemembe_kevin","1qazxsw2!@"); // server
//$con = mysqli_connect("localhost","root","");
$con= mysqli_connect("198.1.65.140","iaemembe_brenda","iaebris1899");// local
mysqli_set_charset($con, 'utf8');
mysqli_select_db($con, "iaemembe_soldb_co")or die( "<p><span style=\"color: red;\">Unable to select database</span></p>");
?>
