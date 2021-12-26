

</div>
 
      
	  
	   <script src="<?=$link?>/js/jquery.js"></script>
	   <script> 
$(document).ready(function(){
    $("#button2").click(function(){
        $("#navbar2").slideToggle("fast");
        $("#navbar").hide();
    });
	 $(".badan").click(function(){
        $("#navbar2").hide();
        $("#navbar").hide();
    });
	 $("#button").click(function(){
        $("#navbar").slideToggle("fast");
        $("#navbar2").hide();
    });
	$(".link").click(function(){
        $("#navbar").hide();
    });
	
	
	
	
	
	
	
});
</script>


    <script src="<?=$link?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$link ?>/datepicker/zebra_datepicker.js"></script>
	<script>
	$(document).ready(function() {

		// diasumsikan elemen yang ingin kita isi datepicker
		// sudah memiliki class "datepicker"
		 $('#calendar').Zebra_DatePicker({
			
			months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],	
			direction: true
		});	
		$('#calendar2').Zebra_DatePicker({
			
			months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],	
			direction: true
		});	
		
		
		
		
	 });
</script>
    </body>
</html>
