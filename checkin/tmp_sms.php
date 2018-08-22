<?php
	$textphone = "0412622579@sms.clicksend.com";
	
	$subject = "";
	$txt = "test, Welcome to SOL Edu Study Fair. Your personal link is testing";
	$headers = "From: sms@iaemember.com" . "\r\n";
	
	mail($textphone,$subject,$txt,$headers);

	echo "ok";
?>