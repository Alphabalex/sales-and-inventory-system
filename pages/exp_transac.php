<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $desc = $_POST['description'];
              $amt = $_POST['amount']; 
              $dats = $_POST['date']; 
        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO expense
                              (EXPENSE_ID, DESCRIPTION, AMOUNT, `DATE`)
                              VALUES (Null,'{$desc}','{$amt}','{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating expense in Database '.$query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "expense.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>