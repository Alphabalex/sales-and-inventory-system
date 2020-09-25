<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $cname = $_POST['catname'];
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO category
                    (CATEGORY_ID, CNAME)
                    VALUES (Null,'{$cname}')";
                    mysqli_query($db,$query)or die ('Error in updating Database');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "category.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>