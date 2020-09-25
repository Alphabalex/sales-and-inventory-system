<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
  $id = $_GET['id'];
  $query = "SELECT EXPENSE_ID,DESCRIPTION, AMOUNT, `DATE` FROM expense WHERE EXPENSE_ID ='$id'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['EXPENSE_ID'];
      $B = $row['DESCRIPTION'];
      $C = $row['AMOUNT'];
      $D = $row['DATE'];
    }
      
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Expense</h4>
            </div>
            <a href="expense.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="exp_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                   <textarea class="form-control" placeholder="Description" name="description"><?php echo $B; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Amount" name="amount" value="<?php echo $C; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Date" name="date" value="<?php echo $D; ?>" required type="date">
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