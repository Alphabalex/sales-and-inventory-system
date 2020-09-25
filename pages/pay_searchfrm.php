<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Pay Detail</h4>
            </div>
            <a href="payroll.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
          $id=$_GET['id'];
            $query = "SELECT p.*, e.FIRST_NAME, e.LAST_NAME, e.SALARY AS GROSS FROM Payroll p join employee e on p.EMPLOYEE_ID=e.EMPLOYEE_ID
              WHERE p.PAYROLL_ID ='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $emp= $row['FIRST_NAME'].' '.$row['LAST_NAME'];
                $i= number_format($row['GROSS']);
                $ded=number_format($row['DEDUCTIONS']);
                $a=$row['DESCRIPTION'];
                $bonus=number_format($row['BONUS']);
                $net=number_format($row['GROSS'] + $row['BONUS']- $row['DEDUCTIONS']);
                $dt=$row['PAYMENT_DATE'];
              }
          ?>

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Employee Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $emp; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Gross Pay<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Deductions<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $ded; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Description<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Bonus<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $bonus; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Net Pay<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $net; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Payment Date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $dt; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>
<?php
include'../includes/footer.php';
?>