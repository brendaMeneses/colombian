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
	    background-color: white;
    }
}
@media only screen and (max-width: 767px) {	
	.no-show, .no-show *
    {
        visibility: hidden !important;
    }
}
</style>

<body>
	<?php include "../inc/navigation.php"; ?>
	<div class="container" style="border: 0;">
		<h3 style="letter-spacing: -1px;"><span style="width: 5px; background-color: #3881BD; padding: 4px; margin-right: 4px;"></span>SOL Edu Study Fair <small>School Staff Page</small></h3>
	</div>
	<div class="container" style="margin-top: -60px;">
		<?php
			$sql = mysqli_query ($con, "SELECT DISTINCT epName FROM eduPlanners WHERE isPublished = 1 ORDER BY epName ASC")
			or die(mysqli_error());
			while($epList = mysqli_fetch_array($sql)) {
				echo "<div class='span2 well well-small col-xs-6 col-sm-4'><a href='ss/std_list.php?EPname=".$epList['epName']."' target='_blank'>".substr($epList['epName'], 0, -6)."</a></div> ";
			}
		?>
	</div>

<?php
include "../inc/footer.inc.php";
?>