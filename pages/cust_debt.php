<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customers' Debt</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction Number</th>
                     <th>Customer</th>
                     <th>Amount</th>
                     <th>Date Incurred</th>
                     <th>Debt Status</th>
                     <th>Date paid</th>
                     <th width="11%" colspan="2">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT *, FIRST_NAME, LAST_NAME
              FROM credit CR
              JOIN customer C ON CR.`CUST_ID`=C.`CUST_ID`
              ORDER BY TRANS_ID ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_ID'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. number_format($row['CREDIT_AMOUNT']).'</td>';
                echo '<td>'. $row['DATE'].'</td>';
                echo '<td>'. $row['STATUS'].'</td>';
                echo '<td>'. $row['PAID_DATE'].'</td>';
                echo  $row['STATUS']=='Unpaid' ? '<td>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_debt_transac.php?action=paid&id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-check"></i>Mark As Paid</a>
                            </td>' : '<td>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_debt_transac.php?action=unpaid&id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-check"></i>Mark As Unpaid</a>
                            </td>';
                echo '<td>
                            <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="#" data-toggle="modal" data-target="#cre'.$row['CREDIT_ID'].'">
                              <i class="fas fa-fw fa-trash"></i> Delete
                            </a>
                      <div class="modal fade" id="cre'.$row['CREDIT_ID'].'" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
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
                              <form role="form" method="post" action="cre_del.php">
                               <div class="form-group">
                                 <input type="hidden" class="form-control" name="id" value="'.$row['CREDIT_ID'].'" required>
                                 <input type="password"  maxlength="4" class="form-control" placeholder="Enter Pin" name="pin" required>
                               </div>
                                <hr>
                                <button type="submit" class="btn btn-danger btn-ok" name="cre_del"><i class="fa fa-trash fa-fw"></i>Delete</button>
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
                  </div>

<?php
include'../includes/footer.php';
?>
