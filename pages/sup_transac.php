<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              $phone = $_POST['phonenumber'];
              $address=$_POST['address'];
        
              switch($_GET['action']){
                case 'add':     
                    $query2 = "INSERT INTO supplier
                              (SUPPLIER_ID, COMPANY_NAME, PHONE_NUMBER, ADDRESS)
                              VALUES (Null,'{$name}','".$phone."','".$address."')";
                    mysqli_query($db,$query2)or die ('Error in updating supplier in Database');
                break;
              }
            ?>
              <script type="text/javascript">window.location = "supplier.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>