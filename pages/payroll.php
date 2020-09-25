<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
$sql = "SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL  FROM employee order by FIRST_NAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='employee' required>
        <option disabled selected hidden>Select Employee</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
  }

$aaa .= "</select>";

?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Payroll&nbsp;<a  href="#" data-toggle="modal" data-target="#payModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Employee Name</th>
                     <th>Gross Pay</th>
                     <th>Deductions</th>
                     <th>Description</th>
                     <th>Bonus Pay</th>
                     <th>Net Pay</th>
                     <th>Payment Date</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT p.*, e.FIRST_NAME, e.LAST_NAME, e.SALARY AS GROSS FROM Payroll p join employee e on p.EMPLOYEE_ID=e.EMPLOYEE_ID';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'. $row['FIRST_NAME']. ' '.$row['LAST_NAME'].'</td>';
                echo '<td>'. number_format($row['GROSS']).'</td>';
                echo '<td>'. number_format($row['DEDUCTIONS']).'</td>';
                echo '<td>'. $row['DESCRIPTION'].'</td>';
                echo '<td>'. number_format($row['BONUS']).'</td>';
                echo '<td>'. number_format($row['GROSS'] + $row['BONUS']- $row['DEDUCTIONS']).'</td>';
                echo '<td>'. $row['PAYMENT_DATE'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pay_searchfrm.php?action=edit & id='.$row['PAYROLL_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pay_edit.php?action=edit & id='.$row['PAYROLL_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="#" data-toggle="modal" data-target="#pay'.$row['PAYROLL_ID'].'">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            <div class="modal fade" id="pay'.$row['PAYROLL_ID'].'" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
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
                                    <form role="form" method="post" action="pay_del.php">
                                     <div class="form-group">
                                       <input type="hidden" class="form-control" name="id" value="'.$row['PAYROLL_ID'].'" required>
                                       <input type="password"  maxlength="4" class="form-control" placeholder="Enter Pin" name="pin" required>
                                     </div>
                                      <hr>
                                      <button type="submit" class="btn btn-danger btn-ok" name="pay_del"><i class="fa fa-trash fa-fw"></i>Delete</button>
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
  