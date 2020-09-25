<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='jobs'>
        <option>Select Job</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$opt .= "</select>";
?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Supplier</h4>
            </div>
            <a href="supplier.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
              <div class="table-responsive">
                        <form role="form" method="post" action="sup_transac.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Company Name" name="companyname" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Phone Number" name="phonenumber" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check fa-fw"></i>Save</button>
                            <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>  
                      </div>
            </div>
          </div></center>
        
<?php
include '../includes/footer.php';
?>
