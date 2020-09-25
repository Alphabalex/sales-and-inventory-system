<?php
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $gen =   $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $salary= $_POST['salary'];
              $address=$_POST['address'];
              $jobb =  $_POST['jobs'];
              $hdate = $_POST['hireddate'];  
              mysqli_query($db,"INSERT INTO employee(EMPLOYEE_ID, FIRST_NAME, LAST_NAME, GENDER, EMAIL, PHONE_NUMBER, SALARY, ADDRESS, JOB_ID, HIRED_DATE)
                VALUES (Null,'{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$salary}','{$address}','{$jobb}','{$hdate}')") or die(mysqli_error($db));
              header('location:employee.php');
            ?>