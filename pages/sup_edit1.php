<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$name = $_POST['name'];
            $phone = $_POST['phone'];
            $address=$_POST['address'];
		
	 			$query = 'UPDATE supplier set COMPANY_NAME="'.$name.'", PHONE_NUMBER="'.$phone.'", ADDRESS="'.$address.'" WHERE
					SUPPLIER_ID ="'.$zz.'"'; 
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated Supplier Successfully.");
			window.location = "supplier.php";
		</script>