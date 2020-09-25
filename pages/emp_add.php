<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
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
              <h4 class="m-2 font-weight-bold text-primary">Add Employee</h4>
            </div>
            <a href="employee.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
              <div class="table-responsive">
                        <form role="form" method="post" action="emp_transac.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="First Name" name="firstname" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Last Name" name="lastname" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Phone Number" name="phonenumber" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Salary" name="salary" required>
                            </div>
                            <div class="form-group">
                              <?php
                                echo $opt;
                              ?>
                            </div>
                            <div class="form-group">
                              <input type="date" id="FromDate" name="hireddate" value="yyyy-MM-dd" class="form-control" />
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


<!-- HOW TO PRINT YOUR VALUE JUST FOR CHECKINGGGGG
<script language='JavaScript'>
function getwords()
{
textbox = document.getElementById('FromDate');
if (textbox.value != "")
document.write("You entered: " + textbox.value)
else
alert("No word has been entered!")
}
</script>
<input type="button" onclick="getwords()" value="Enter" /> -->