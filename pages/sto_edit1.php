<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
            $pr = $_POST['price'];
            $qty= $_POST['qty'];
            $date= $_POST['date'];
		
	 			$query = 'UPDATE stock set PRICE="'.$pr.'", QTY ="'.$qty.'", DATE_STOCK_IN ="'.$date.'" WHERE
					STOCK_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated Stock Successfully.");
			window.location = "stock.php";
		</script>