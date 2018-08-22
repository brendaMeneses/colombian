/*$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});*/
  
 $(document).ready(function() {
 	
	 $('.confirm').on('click', function () {
        return confirm('Are you sure you want to send a message?');
    });
 		
     $(".schoollist").click(function() {
     	$(".list").toggle("normal");
    });

     $(".next1").click(function() {
     	
     	if($("#nationality").val() == "" || $("#familyName").val() == "" || $("#firstName").val() == "" || $("#email").val() == "" || $("#gender").val() == "" || $("#phone").val() == ""){
     		alert("Please fill all the blank");
     	}
     	else if($("#phone").val().substring(0,2) != "04"){
			alert("Please check your mobile number. You can put only Australian number.");
		}
		else if($("#phone").val().length != "10"){
			alert("Please check your mobile number. The number must be 10 digits.");
		}
     	else {
        $(".educational").slideDown("normal");
        $("#next13").hide();
        $(".next1").hide();
       }
    });

     $('#how').change(function() {
	 	$('#submitok').removeClass('btn btn-large btn-success disabled').addClass('btn btn-large btn-success');
     });



     $('#BookingYes').click(function() {
       if($("#BookingYes").val() ) {
          $("#BookingYesPart").slideDown("normal");
       }
     });
     
     
     $('#studynowYes').change(function() {
       if($("#studynowYes").val() ) {
          $("#studynowYesreco").slideDown("normal");
       }
     });
       
     $('#studynowNo').change(function() {
       if($("#studynowNo").val()  ) {
          $("#studynowYesreco").slideUp("normal");
       }
     });
     
     $('#Bachelor').change(function() {
       if($("#Bachelor").prop('checked', true) ) {
          $("#universityreco").slideDown("normal");
       }
     });
    
     $('#interestc').change(function() {
       if($("#interestc").val() == "Certificate" ) {
          $("#Certificatereco").slideDown("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal");
       }
       if($("#interestc").val() == "Diploma" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideDown("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal");
       }
       if($("#interestc").val() == "Bachelor" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideDown("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal")
       }
       if($("#interestc").val() == "Master" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideDown("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal")
       }
       if($("#interestc").val() == "Phd" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideDown("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal")
       }
       if($("#interestc").val() == "GeneralEng" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideDown("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal");
       }
       if($("#interestc").val() == "IELTS" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideDown("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal");
       }
       if($("#interestc").val() == "Cambridge" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideDown("normal");
          $("#tesolreco").slideUp("normal");
       }
       if($("#interestc").val() == "TESOL" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideDown("normal");
       }
       if($("#interestc").val() == "Other" ) {
          $("#Certificatereco").slideUp("normal");
          $("#Diplomareco").slideUp("normal");
          $("#universityreco").slideUp("normal");
          $("#Generalreco").slideUp("normal");
          $("#cambridgereco").slideUp("normal");
          $("#tesolreco").slideUp("normal");
       }
    });
});