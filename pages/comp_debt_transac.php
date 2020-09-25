<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $desc = $_POST['desc'];
              $amount = $_POST['amount']; 
              $supp = $_POST['supplier'];
              $date = $_POST['date']; 
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO debt
                              (DEBT_ID, DESCRIPTION, AMOUNT, SUPPLIER_ID, `DATE`, STATUS)
                              VALUES (Null,'{$desc}','{$amount}','{$supp}','{$date}','Unpaid')";
                    mysqli_query($db,$query)or die ('Error in updating debt in Database '.$query);
                break;
                case 'paid':
                    $id=$_GET['id'];
                    $query111 = "UPDATE debt SET STATUS='Paid', DATE_PAID=NOW() WHERE DEBT_ID ='{$id}'";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;
                case 'unpaid':
                    $id=$_GET['id'];
                    $query111 = "UPDATE debt SET STATUS='Unpaid', DATE_PAID=NULL WHERE DEBT_ID ='{$id}'";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;
              }
            ?>
              <script type="text/javascript">window.location = "comp_debt.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>