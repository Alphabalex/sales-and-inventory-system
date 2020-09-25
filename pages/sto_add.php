<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
            
$sql = "SELECT PRODUCT_CODE, NAME, DESCRIPTION FROM product order by NAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='product'>
        <option disabled selected>Select Product</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['PRODUCT_CODE']."'>".$row['NAME'].' :: '.$row['DESCRIPTION']."</option>";
  }

$opt .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier'>
        <option disabled selected>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Stock</h4>
            </div>
            <a href="stock.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
                      <div class="table-responsive">



                        <form role="form" method="post" action="sto_transac.php?action=add">
                            <div class="form-group">
                              <?php
                                echo $opt;
                              ?>
                            </div>
                            <div class="form-group">
                              <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity Purchased" name="quantity" required>
                            </div>
                            <div class="form-group">
                              <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Cost" name="price" required>
                            </div>
                            <div class="form-group">
                              <?php
                                echo $sup;
                              ?>
                            </div>
                            <div class="form-group">
                              <input type="datet" class="form-control" placeholder="Date of Purchase" name="datestock" required>
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
