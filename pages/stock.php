<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
$sql = "SELECT PRODUCT_CODE, NAME, DESCRIPTION FROM product order by NAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='product' required>
        <option disabled selected hidden>Select Product</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['PRODUCT_CODE']."'>".$row['NAME'].' :: '.$row['DESCRIPTION']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Stock&nbsp;<a  href="#" data-toggle="modal" data-target="#stoModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Product Name</th>
                     <th>Description</th>
                     <th>Quantity Purchased</th>
                     <th>Cost Price</th>
                     <!-- <th>Sales Price</th>
                     <th>Profit</th> -->
                     <th>Date of Purchase</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, p.PRODUCT_CODE, NAME, DESCRIPTION,p.PRICE AS UNIT_PRICE, s.QTY, s.PRICE AS PRICE, s.DATE_STOCK_IN, s.STOCK_ID FROM product p join stock s on p.PRODUCT_CODE=s.PRODUCT_CODE';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['DESCRIPTION'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. number_format($row['PRICE']).'</td>';
                // echo '<td>'. number_format($row['QTY'] * $row['UNIT_PRICE']).'</td>';
                // echo '<td>'. number_format($row['QTY'] * $row['UNIT_PRICE']- $row['PRICE']).'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="sto_searchfrm.php?action=edit & id='.$row['STOCK_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="sto_edit.php?action=edit & id='.$row['STOCK_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="#" data-toggle="modal" data-target="#sto'.$row['STOCK_ID'].'">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            <div class="modal fade" id="sto'.$row['STOCK_ID'].'" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p class="text-left">Are you sure you want to delete?</p>
                                    <form role="form" method="post" action="sto_del.php">
                                     <div class="form-group">
                                       <input type="hidden" class="form-control" name="id" value="'.$row['STOCK_ID'].'" required>
                                       <input type="password"  maxlength="4" class="form-control" placeholder="Enter Pin" name="pin" required>
                                     </div>
                                      <hr>
                                      <button type="submit" class="btn btn-danger btn-ok" name="sto_del"><i class="fa fa-trash fa-fw"></i>Delete</button>
                                      <button type="reset" class="btn btn-warning"><i class="fa fa-times fa-fw"></i>Reset</button>
                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
                                    </form> 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> </td>';
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
  