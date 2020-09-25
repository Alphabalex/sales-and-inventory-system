<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $pn = $_POST['phonenumber'];
        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO customer
                    (CUST_ID, FIRST_NAME, LAST_NAME, PHONE_NUMBER)
                    VALUES (Null,'{$fname}','{$lname}','{$pn}')";
                    mysqli_query($db,$query)or die ('Error in updating Database');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "pos.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>