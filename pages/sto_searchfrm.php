<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
include'../includes/admin_only.php';
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Stock Detail</h4>
            </div>
            <a href="stock.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
          $id=$_GET['id'];
            $query = "SELECT p.PRODUCT_CODE, NAME,DESCRIPTION, s.QTY, format(s.PRICE,0) AS PRICE, s.DATE_STOCK_IN, su.COMPANY_NAME  FROM product p 
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

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zzz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
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
                          Quantity Purchased<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $qty; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Cost Price<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $c; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Date Of Purchase<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $dt; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>
<?php
include'../includes/footer.php';
?>