<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
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
              <h4 class="m-2 font-weight-bold text-primary">Company's Debt&nbsp;<a  href="#" data-toggle="modal" data-target="#debtModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Company</th>
                     <th>Description</th>
                     <th>Amount</th>
                     <th>Date Incurred</th>
                     <th>Status</th>
                     <th>Date Paid</th>
                     <th width="11%" colspan="2">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT *, COMPANY_NAME
              FROM debt d
              JOIN supplier s ON d.`SUPPLIER_ID`=s.`SUPPLIER_ID`
              ORDER BY DEBT_ID ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                echo '<td>'. $row['DESCRIPTION'].'</td>';
                echo '<td>'. number_format($row['AMOUNT']).'</td>';
                echo '<td>'. $row['DATE'].'</td>';
                echo '<td>'. $row['STATUS'].'</td>';
                echo '<td>'. $row['DATE_PAID'].'</td>';
                echo  $row['STATUS']=='Unpaid' ? '<td>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="comp_debt_transac.php?action=paid&id='.$row['DEBT_ID'] . '"><i class="fas fa-fw fa-check"></i>Mark As Paid</a>
                            </td>' : '<td>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="comp_debt_transac.php?action=unpaid&id='.$row['DEBT_ID'] . '"><i class="fas fa-fw fa-check"></i>Mark As Unpaid</a>
                            </td>';
                echo '<td>
                            <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="#" data-toggle="modal" data-target="#debt'.$row['DEBT_ID'].'">
                              <i class="fas fa-fw fa-trash"></i> Delete
                            </a>
                      <div class="modal fade" id="debt'.$row['DEBT_ID'].'" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
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
                              <form role="form" method="post" action="debt_del.php">
                               <div class="form-group">
                                 <input type="hidden" class="form-control" name="id" value="'.$row['DEBT_ID'].'" required>
                                 <input type="password"  maxlength="4" class="form-control" placeholder="Enter Pin" name="pin" required>
                               </div>
                                <hr>
                                <button type="submit" class="btn btn-danger btn-ok" name="debt_del"><i class="fa fa-trash fa-fw"></i>Delete</button>
                                <button type="reset" class="btn btn-warning"><i class="fa fa-times fa-fw"></i>Reset</button>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
                              </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                    </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

<?php
include'../includes/footer.php';
?>
