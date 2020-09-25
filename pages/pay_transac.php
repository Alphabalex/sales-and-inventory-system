<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $emp = $_POST['employee'];
              $deduction = $_POST['deduction'];
              $description = $_POST['description']; 
              $bonus = $_POST['bonus'];
              $date = $_POST['date']; 
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO payroll
                              (PAYROLL_ID, EMPLOYEE_ID, DEDUCTIONS, DESCRIPTION, BONUS, PAYMENT_DATE)
                              VALUES (Null,'{$emp}','{$deduction}','{$description}','{$bonus}','{$date}')";
                    mysqli_query($db,$query)or die ('Error in updating payroll in Database '.$query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "payroll.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>