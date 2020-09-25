<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $code = $_POST['product'];
              $qty = $_POST['quantity'];
              $pr = $_POST['price']; 
              $supp = $_POST['supplier'];
              $dats = $_POST['datestock']; 
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO stock
                              (STOCK_ID, PRODUCT_CODE, QTY, PRICE, SUPPLIER_ID, DATE_STOCK_IN)
                              VALUES (Null,'{$code}','{$qty}',{$pr},{$supp},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating stock in Database '.$query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "stock.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>