<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
$sql = "SELECT PRODUCT_CODE, NAME, DESCRIPTION FROM product order by NAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='product' required>
        <option value='' disabled selected hidden>Select Product</option>";
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
  $id = $_GET['id'];
  $query = "SELECT p.PRODUCT_CODE, NAME,DESCRIPTION, s.QTY, s.PRICE, s.DATE_STOCK_IN, su.COMPANY_NAME 
              FROM product p 
              join stock s on p.PRODUCT_CODE=s.PRODUCT_CODE
              join supplier su on s.SUPPLIER_ID=su.SUPPLIER_ID 
              WHERE s.STOCK_ID ='$id'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zzz= $row['PRODUCT_CODE'];
      $i= $row['NAME'];
      $a=$row['DESCRIPTION'];
      $qty=$row['QTY'];
      $c=$row['PRICE'];
      $dt=$row['DATE_STOCK_IN'];
      $d=$row['COMPANY_NAME'];
    }
      
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Stock</h4>
            </div>
            <a href="stock.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="sto_edit1.php">
              <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Code:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Code" name="prodcode" value="<?php echo $zzz; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Name" name="prodname" value="<?php echo $i; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                   <textarea class="form-control" placeholder="Description" name="description" readonly><?php echo $a; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Quantity Purchased:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Quantity Purchased" name="qty" value="<?php echo $qty; ?>" required type="number" min="1">
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Cost Price:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Cost Price" name="price" value="<?php echo $c; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date Of Purchase:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Date Of Purchase" name="date" value="<?php echo $dt; ?>" required type="date">
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Price" name="supplier" value="<?php echo $d; ?>" readonly>
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