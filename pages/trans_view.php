<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/amount2words.php';
include'../includes/privilege.php';
 $query = 'SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
?>

          <div class="card shadow mb-4">
            <div class="card-body">
              <h1 class=" text-primary display-3 text-center">BALEXTEK STORES</h1>
              <p class="bg-primary text-white text-center p-2" style="font-size: 20px;">Distributor of different types of Soft and Assorted Drinks</p>
              <address class="text-primary text-center"> Lagos, Nigeria. <br> Tel: 08085744967, 08177761542</address>
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <span class="font-weight-bold bg-primary text-white p-2">
                    CASH SALES INVOICE
                  </span>
                </div>
                <div class="col-sm-3 py-1" id="date">
                  <span class="font-weight-bold bg-primary text-white p-2">
                    Date: <?php echo $date; ?>
                  </span>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2 text-primary">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    <?php echo $fname; ?> <?php echo $lname; ?>
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead  class="bg-primary text-white">
              <tr>
                <th>Products</th>
                <th>Description</th>
                <th width="8%">Qty</th>
                <th width="15%">Price</th>
                <th width="15%">Subtotal</th>
              </tr>
            </thead>
            <tbody class="text-primary">
<?php
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
              $pcode=$row['CODE'];
              $q2=mysqli_query($db,"SELECT DESCRIPTION from product where PRODUCT_CODE='$pcode'");
                while ($desc = mysqli_fetch_assoc($q2)) {
                  $description=$desc['DESCRIPTION'];
                }
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $description.'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. number_format($row['PRICE']).'</td>';
                echo '<td>'. number_format($Sub).'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
            <tfoot class="text-primary text-center">
              <tr>
                <th colspan="5">NO REFUND OF MONEY AFTER PAYMENT &AMP; GOODS SOLD ARE NOT RETURNABLE</th>
              </tr>
            </tfoot>
          </table>
            <div class="form-group row text-left mb-0 py-2 text-primary">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">&#8358;<?php echo number_format($grand,2); ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Amount Paid:</td>
                      <td class="font-weight-bold text-right text-primary">&#8358;<?php echo number_format($cash, 2); ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
              <?php
                $amountInWords = convertNumber($cash)." Naira Only";
               ?>
              <table class="text-primary mb-5">
                <tr>
                  <th>Amount in words:</th>
                  <td class="font-weight-bold text-right text-primary"><?php echo $amountInWords; ?></td>
                </tr>
              </table>
              <div class="clearfix text-primary">
                <div class="float-left">
                  <h4>........................................................</h4>
                  <span>Customer's Signature</span>
                </div>
                <div class="float-right">
                  <h4>........................................................</h4>
                  <span>For: BALEXTEK STORES</span>
                </div>
              </div>
            </div>
          </div>


<?php
include'../includes/footer.php';
?>