<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
            $desc = $_POST['description'];
            $amt = $_POST['amount'];
            $date = $_POST['date'];
		
	 			$query = 'UPDATE expense set
					DESCRIPTION="'.$desc.'", 
					AMOUNT="'.$amt.'", 
					`DATE` ="'.$date.'" WHERE
					EXPENSE_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated Expense Successfully.");
			window.location = "expense.php";
		</script>