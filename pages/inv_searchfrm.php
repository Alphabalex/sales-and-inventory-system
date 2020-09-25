<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
$id=$_GET['id']; 
$query2 = "SELECT NAME, DESCRIPTION FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID where PRODUCT_CODE ='{$id}' limit 1 ";
        $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory for : <?php while ($row = mysqli_fetch_assoc($result2)) { echo $row['NAME'] .' >>> '. $row['DESCRIPTION']; } ?></h4>
              <a href="inventory.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Quantity</th>
                     <th>In Stock</th>
                     <th>Date Of Purchase</th>
                   </tr>
               </thead>
          <tbody>

<?php 
$productcode=$_GET['id'];  
$query = "SELECT PRODUCT_ID, NAME, DESCRIPTION, DATE_STOCK_IN, sum(s.QTY) AS QTY, s.PRODUCT_CODE
                FROM product p 
                join stock s on p.PRODUCT_CODE=s.PRODUCT_CODE 
                where s.PRODUCT_CODE ='{$productcode}'
                GROUP BY s.PRODUCT_CODE";
$result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
                $q2=mysqli_query($db,"SELECT sum(QTY) AS SOLD FROM transaction_details WHERE CODE='$productcode'");
                while ($record=mysqli_fetch_assoc($q2)) 
                {
                  $sold=$record['SOLD'];
                }
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['DESCRIPTION'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. ($row['QTY']-$sold).'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
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
