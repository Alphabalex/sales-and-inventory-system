<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$cname = $_POST['catname'];
	   	
		
	 			$query = "UPDATE category set CNAME ='$cname' WHERE
					CATEGORY_ID ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Updated Category Successfully.");
			window.location = "category.php";
		</script>