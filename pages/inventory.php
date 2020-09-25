<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
 ?>
            
            <div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
                        <div class="card-header py-3">
                          <h4 class="m-2 font-weight-bold text-primary">Inventory</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                           <thead>
                               <tr>
                                 <th>Product Code</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Quantity Sold</th>
                                 <th>Amount</th>
                                 <th>Profit</th>
                                 <th>In Stock</th>
                               </tr>
                           </thead>
                      <tbody>

            <?php                  
                $query = "SELECT PRODUCT_ID, NAME, DESCRIPTION, DATE_STOCK_IN, sum(s.PRICE) AS COST_PRICE, sum(s.QTY) AS QTY, s.PRODUCT_CODE
                FROM product p 
                join stock s on p.PRODUCT_CODE=s.PRODUCT_CODE  
                GROUP BY s.PRODUCT_CODE";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));          
                        while ($row = mysqli_fetch_assoc($result)) {
                              $cost_per_item=$row['COST_PRICE'] / $row['QTY'];
                              $pcode=$row['PRODUCT_CODE'];
                              $q2=mysqli_query($db,"SELECT sum(QTY) AS SOLD, sum(PRICE) AS PRICE, count(CODE) AS COUNT FROM transaction_details WHERE CODE='$pcode'");
                              while ($record=mysqli_fetch_assoc($q2)) 
                              {
                                $sold=$record['SOLD'];
                                $price=$record['PRICE'];
                                $count= $record['COUNT']==0 ? 1:$record['COUNT'];
                                $calc=$sold * $price / $count;
                                $profit=$calc -($cost_per_item*$sold);
                              }               
                            echo '<tr>';
                            echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                            echo '<td>'. $row['NAME'].'</td>';
                            echo '<td>'. $row['DESCRIPTION'].'</td>';
                            echo '<td>'. number_format($sold,0).'</td>';
                            echo '<td>'. number_format($calc , 0).'</td>';
                            echo '<td>'. number_format($profit).'</td>';
                            echo '<td>'. ($row['QTY']-$sold).'</td>';
                            echo '</tr> ';
                                    }
            ?> 
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                              </div>
<?php
include'../includes/footer.php';
?>
