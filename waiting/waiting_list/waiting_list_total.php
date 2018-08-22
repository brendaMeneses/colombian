<?php
include "../../inc/header.staff.inc.php";
require_once "../../inc/db.inc.php";
?>
<meta http-equiv="refresh" content="10; url=
<?php
	$epName = $_GET['EPname'];
	if($epName=="TAFE Queensland-S89aA"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=QAT-gueEd";}
	else if($epName=="QAT-gueEd"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Embassy-fiEde";}
	else if($epName=="Embassy-fiEde"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=ILSC-biEDe";}
	else if($epName=="ILSC-biEDe"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Navitas English-oodED";}
	else if($epName=="Navitas English-oodED"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Browns-38Fed";}
	else if($epName=="Browns-38Fed"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=CTI-4igjA";}
	else if($epName=="CTI-4igjA"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Torrens-di4Ea";}
	else if($epName=="Torrens-di4Ea"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Kaplan-buEdj";}

	else if($epName=="Kaplan-buEdj"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=UQ-9jIUE";}
	else if($epName=="UQ-9jIUE"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Griffith-89hH9";}
	else if($epName=="Griffith-89hH9"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=CQU-IUPde";}
	else if($epName=="CQU-IUPde"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=USQ-2985A";}
	else if($epName=="USQ-2985A"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=USC-18iud";}
	else if($epName=="USC-18iud"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=QUT-3bjE4";}
	else if($epName=="QUT-3bjE4"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Peter Migration-389cd";}
	else if($epName=="Peter Migration-389cd"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Namo Migration-r95jF";}
	else if($epName=="Namo Migration-r95jF"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=Others-49b2a";}
	else if($epName=="Others-49b2a"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=ALS-B7eDe";}	
	else if($epName=="ALS-B7eDe"){echo "http://iaemember.com/studyfair2016nov/waiting_list_total.php?EPname=TAFE Queensland-S89aA";}
	
	
?>" >

<style>
@media (min-width:1200px) {		

	.container-fluid{width: 1200px !important; margin:0 auto !important; padding:0px !important;}
}
</style>

    <div class="container" style="margin-top: 50px; width: 95%;">
    	<legend style="font-size: 80px; height:100px; margin-top: 20px;">
    		<?php
    			if($epName=="QUT-3bjE4"){echo "<span style='background: black; color: white; maring: 5px;'>20</span> Queensland University of Technology (QUT)";}
				else if($epName=="UQ-9jIUE"){echo "<span style='background: black; color: white; maring: 5px;'>12</span> The University of Queensland (UQ)";}
				else if($epName=="Griffith-89hH9"){echo "<span style='background: black; color: white; maring: 5px;'>13</span> Griffith University";}
				else if($epName=="USQ-2985A"){echo "<span style='background: black; color: white; maring: 5px;'>15</span> University of Southern Queensland (USQ)";}
				else if($epName=="CQU-IUPde"){echo "<span style='background: black; color: white; maring: 5px;'>14</span> CQUniversity (CQU)";}
				else if($epName=="USC-18iud"){echo "<span style='background: black; color: white; maring: 5px;'>16</span> University of the Sunshine Coast (USC)";}
				else if($epName=="TAFE Queensland-S89aA"){echo "<span style='background: black; color: white; maring: 5px;'>01</span>~<span style='background: black; color: white; maring: 5px;'>02</span> TAFE Queensland";}
				else if($epName=="Navitas English-oodED"){echo "<span style='background: black; color: white; maring: 5px;'>07</span> Navitas English";}
				else if($epName=="ALS-B7eDe"){echo "<span style='background: black; color: white; maring: 5px;'>21</span>~<span style='background: black; color: white; maring: 5px;'>10</span> ih-ALS";}
				else if($epName=="Browns-38Fed"){echo "<span style='background: black; color: white; maring: 5px;'>08</span> Browns";}
				else if($epName=="QAT-gueEd"){echo "<span style='background: black; color: white; maring: 5px;'>03</span> Queensland Academy of Technology (QAT)";}
				else if($epName=="Embassy-fiEde"){echo "<span style='background: black; color: white; maring: 5px;'>04</span> Embassy English";}
				else if($epName=="Kaplan-buEdj"){echo "<span style='background: black; color: white; maring: 5px;'>11</span> Kaplan";}
				else if($epName=="ILSC-biEDe"){echo "<span style='background: black; color: white; maring: 5px;'>05</span>~<span style='background: black; color: white; maring: 5px;'>06</span> ILSC";}
				else if($epName=="Others-49b2a"){echo "<span style='background: black; color: white; maring: 5px;'>19</span> Other Schools (State)";}
				else if($epName=="Peter Migration-389cd"){echo "<span style='background: black; color: white; maring: 5px;'>17</span> Migration (Peter)";}
				else if($epName=="Namo Migration-r95jF"){echo "<span style='background: black; color: white; maring: 5px;'>18</span> Migration (Namo)";}
				else if($epName=="Torrens-di4Ea"){echo "<span style='background: black; color: white; maring: 5px;'>10</span> Torrens University";}
				else if($epName=="CTI-4igjA"){echo "<span style='background: black; color: white; maring: 5px;'>09</span> Canterbury Technical Institute";}
    		?>
    	</legend>
    	
    	    	<!-- PRE-REGISTER -->
    	
		    <?php
				$sql = mysqli_query($con, "SELECT familyName, firstName, gender, currentc, currents, interestc, interestm, nationality, 
cnslDate, id, tr_class, epName, startdate, unique_id, phone, email, epmemo, start_time, finish_time, counselling_memo, rate, SMS
FROM stdList WHERE epName = '$epName' ORDER BY cnslDate ASC") or die(mysqli_error($con));
				
				$check_done = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class='finish'")
							or die(mysqli_error($con));
							
				$check_waiting = mysqli_query($con, "SELECT * FROM stdList WHERE epName = '$epName' && tr_class=''")
							or die(mysqli_error($con));
				
				$num_rows = mysqli_num_rows( $sql);
				if ($num_rows < 1) {?>
					<div class="alert alert-error" style="text-align: center; font-size: 20pt; background-color: black; color: yellow;"><strong>Please keep your mobile on your hand! You will get a text when your turn is ready.</strong></div>
				<?php 
					}
				else { ?>
					<div class="alert alert-error" style="text-align: center; font-size: 20pt; background-color: black; color: yellow;"><strong>Please keep your mobile on your hand! You will get a text when your turn is ready.</strong></div>
	<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
		<th style='text-align: center;' width="10%"><abbr title="Counselling Number">Waiting#</abbr></th>
		<th style='text-align: center;' width="60%">Name</th>
		<th style='text-align: center;' width="30%">Estimated Wait Time</th>
	
		<!--
		<th>Cancel</th>
		-->
		</tr>
	</thead>
		
		
	<?php
	}
			$waitnum = 1;
			$EwaittimeA = 0;
			$EwaittimeB = 5;
			date_default_timezone_set('Australia/Brisbane');
			$current_time = date('H:i:s', time());;
			
			while($stdList = mysqli_fetch_array($sql))
			{
				$hh_current = substr($current_time, 0, 2);
			    $ii_current = substr($current_time, 3, 2);
		
				$hh_listed = substr($stdList[8], 0, 2);
			    $ii_listed = substr($stdList[8], 3, 2);
				
				$waiting = ($hh_current * 60 + $ii_current) - ($hh_listed * 60 + $ii_listed);	
				
				if(empty($stdList[10])){
					//echo "<ul id='epStdTable-list'>";
					echo "<td style='text-align: center; font-size: 30pt; height: auto; padding: 20px; '>". $waitnum ."</td>";
					echo "<td style='text-align: center; font-size: 30pt; height: auto; padding: 20px; '>". $stdList[0] .", " . $stdList[1] . "</td>";
					echo "<td style='text-align: center; font-size: 30pt; height: auto; padding: 20px; '>". $EwaittimeA ." ~ ".$EwaittimeB." mins</td>";
					$EwaittimeA = $EwaittimeA + 5;
					$EwaittimeB = $EwaittimeB + 5;
				}
				else{
					//echo "<ul id='epStdTable-list'>";
					echo "<td style='text-align: center; display: none;'>". $waitnum ."</td>";
					echo "<td style='text-align: center; display: none;'>". $stdList[0] .", " . $stdList[1] . "</td>";
				}
				
				$waitnum++;
				
				
				$fieldName = "tr_class".$stdList[13];
				$formName = "form".$fieldName;
				
				$check_counselling = mysqli_query("SELECT epName FROM stdList WHERE id = '$stdList[9]' && tr_class='start'") or die(mysqli_error());
				$check_counselling_num = mysqli_num_rows( $check_counselling);
				
				while ($row = mysqli_fetch_array($check_counselling, MYSQLI_NUM)) {
					$counsellingSchoolName = $row[0];
				}
			
				
				

	?>
		
		
		
		
		<!--
		<form method="post" name="<?php echo $formName; ?>" action="helper_list.php?EPname=<?php echo $epName; ?>">
		<td><button id="button<?php echo $fieldName; ?>" name="<?php echo $fieldName; ?>" type="submit" class="btn btn-success btn-small" style="width:80px;" onClick="hideRow<?php echo $stdList[13]; ?>.setAttribute('class', 'success');">
		<i class="icon-ok icon-white"></i> Start</button></td>
		</form>
		-->
		
		<!--
		<form method="post" name="cancel<?php echo $formName; ?>" action="helper_list.php?EPname=<?php echo $epName; ?>">
		<td><button id="cancel<?php echo $fieldName; ?>" name="cancel<?php echo $fieldName; ?>" type="submit" class="btn btn-success btn-small" onClick="return confirm('Are you sure you want to cancel <?php echo $stdList[1]; ?> from <?php echo $epName; ?>')">
		<i class="icon-remove icon-white"></i> Cancel</button></td>
		</form>
		-->
		
		</tr>
		<?php
		
		$uniqueID2Hide = $stdList[13]; /*Take the unique_id number generated from the first query.*/
		
		
		
		if (isset($_POST[start.$fieldName])) {
			
			date_default_timezone_set('Australia/Brisbane');
			$when = date('Y/m/d H:i:s', time());
			
			
			$updateBackgroundColor = mysqli_query($con, "UPDATE stdList SET tr_class='start', start_time='$when' WHERE unique_id='$uniqueID2Hide'")
			or die (mysqli_error());
			echo "<script>window.location.href=window.location.href</script>";
		}
		
		$removestd = $stdList[13]; //Take the student ID number generated from the first query.
		if (isset($_POST[remove.$fieldName])) {
			$updateOpacity = mysqli_query($con, "UPDATE stdList SET tr_class='remove' WHERE unique_id='$removestd'")
			or die (mysqli_error());
			echo "<script>window.location.href=window.location.href</script>";
		}
		
		
		$cancelstd = $stdList[13]; //Take the student ID number generated from the first query.
		if (isset($_POST[cancel.$fieldName])) {
			$updateOpacity = mysqli_query($con, "UPDATE stdList SET tr_class='' WHERE unique_id='$cancelstd'")
			or die (mysqli_error());
			echo "<script>window.location.href=window.location.href</script>";
		}
	}
	
	echo "</table>"; ?>