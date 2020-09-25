<?php
include('../includes/connection.php');
			$zz=  	$_POST['id'];
			$ded =  $_POST['deductions'];
            $desc = $_POST['description'];
            $bonus= $_POST['bonus'];
            $date=  $_POST['date'];
		
	 			$query = 'UPDATE payroll set DEDUCTIONS="'.$ded.'", DESCRIPTION ="'.$desc.'", BONUS ="'.$bonus.'", PAYMENT_DATE ="'.$date.'" WHERE
					PAYROLL_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated payroll Successfully.");
			window.location = "payroll.php";
		</script>