<?php
include'../includes/connection.php';

			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gen = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $salary= $_POST['salary'];
            $address=$_POST['address'];
            $hdate = $_POST['hireddate'];
	 			$query = 'UPDATE employee  set FIRST_NAME="'.$fname.'",
					LAST_NAME="'.$lname.'",
					GENDER="'.$gen.'", EMAIL="'.$email.'", PHONE_NUMBER="'.$phone.'", SALARY="'.$salary.'", ADDRESS="'.$address.'", HIRED_DATE ="'.$hdate.'" WHERE
					EMPLOYEE_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated Employee Successfully.");
			window.location = "employee.php";
		</script>