<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
$id=$_GET['id'];
$query = "SELECT p.*, e.FIRST_NAME, e.LAST_NAME, e.SALARY AS GROSS FROM Payroll p join employee e on p.EMPLOYEE_ID=e.EMPLOYEE_ID WHERE p.PAYROLL_ID='$id'";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
        while ($row = mysqli_fetch_assoc($result)) {
                $emp= $row['FIRST_NAME'].' '.$row['LAST_NAME'];
                $i= number_format($row['GROSS']);
                $ded=$row['DEDUCTIONS'];
                $a=$row['DESCRIPTION'];
                $bonus=$row['BONUS'];
                $dt=$row['PAYMENT_DATE'];
                    }      
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Pay</h4>
            </div>
            <a href="payroll.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="pay_edit1.php">
              <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Employee:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" value="<?php echo $emp; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Gross Pay:
                </div>
                <div class="col-sm-9">
                  <input class="form-control"  value="<?php echo $i; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Deductions:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Deductions" name="deductions" value="<?php echo $ded; ?>" type="number" min="0">
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                   <textarea class="form-control" placeholder="Description" name="description"><?php echo $a; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Bonus:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Bonus" name="bonus" value="<?php echo $bonus; ?>" type="number" min="0">
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Payment Date:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Payment Date" name="date" value="<?php echo $dt; ?>" required type="date">
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>