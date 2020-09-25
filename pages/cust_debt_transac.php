<?php
include'../includes/connection.php';
              switch($_GET['action']){
                case 'paid':
                    $id=$_GET['id'];
                    $q4=mysqli_query($db,"SELECT CREDIT_AMOUNT FROM credit WHERE TRANS_ID='$id'"); 
                    while($row=mysqli_fetch_assoc($q4)){
                      $credit_amount=$row['CREDIT_AMOUNT'];
                    } 
                    $query = "UPDATE transaction SET CASH=CASH + '{$credit_amount}' WHERE TRANS_D_ID='$id' ";
                    mysqli_query($db,$query)or die (mysqli_error($db));

                    $query111 = "UPDATE credit SET STATUS='Paid', PAID_DATE =NOW() WHERE TRANS_ID='$id'";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;

                case 'unpaid':
                    $id=$_GET['id'];
                    $q4=mysqli_query($db,"SELECT CREDIT_AMOUNT FROM credit WHERE TRANS_ID='$id'"); 
                    while($row=mysqli_fetch_assoc($q4)){
                      $credit_amount=$row['CREDIT_AMOUNT'];
                    } 
                    $query = "UPDATE transaction SET CASH=CASH - '{$credit_amount}' WHERE TRANS_D_ID='$id' ";
                    mysqli_query($db,$query)or die (mysqli_error($db));

                    $query111 = "UPDATE credit SET STATUS='Unpaid', PAID_DATE = NULL WHERE TRANS_ID='$id'";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;
              }
               ?>
              <script type="text/javascript">
                alert("Success.");
                window.location = "cust_debt.php";
              </script>
          </div>
