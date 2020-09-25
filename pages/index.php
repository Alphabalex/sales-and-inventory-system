<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
?>
          <div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-3">
            <!-- Customer record -->
            <a href="customer.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM customer";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </a>

            <!-- Supplier record -->
            <a href="supplier.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suppliers</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>

            <!-- Sales record -->
            <a href="transaction.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today Sales</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(GRANDTOTAL),0) FROM transaction WHERE DATE(`DATE`)=(SELECT CURDATE())";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="transaction.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Week Sales</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(GRANDTOTAL),0) FROM transaction WHERE WEEK(`DATE`)=(SELECT WEEK(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="transaction.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Month Sales</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(GRANDTOTAL),0) FROM transaction WHERE mid(`DATE`,6,2)=(SELECT MONTH(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>

            <!-- Total Sales record -->
            <a href="transaction.php"><div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(GRANDTOTAL),0) FROM transaction";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
            <!-- Employee ROW -->
          <div class="col-md-3">
            <!-- Employee record -->
            <a href="employee.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM employee";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <!-- User record -->
            <a href="user.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Account</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID>1";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>


            <!-- Purchases record -->
            <a href="stock.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today Purchases</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(PRICE),0) FROM stock WHERE `DATE_STOCK_IN`=(SELECT CURDATE())";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="stock.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Current Week Purchases</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(PRICE),0) FROM stock WHERE WEEK(`DATE_STOCK_IN`)=(SELECT WEEK(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="stock.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Current Month Purchases</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(PRICE),0) FROM stock WHERE mid(`DATE_STOCK_IN`,6,2)=(SELECT MONTH(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>

            <!--Total Purchases record -->
            <a href="stock.php"><div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Purchases</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT FORMAT(SUM(PRICE),0) FROM stock";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo " &#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <!-- PRODUCTS ROW -->
          <div class="col-md-3">
            <!-- Product record -->
            <a href="product.php"><div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM product";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?> Record(s)
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div></a>
            <!-- Expense record -->
            <a href="expense.php"><div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Expenses</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT format(SUM(AMOUNT),0) FROM expense WHERE `DATE`=(SELECT CURDATE())";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "&#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>

            <a href="expense.php"><div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Current Week Expenses</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT format(SUM(AMOUNT),0) FROM expense WHERE WEEK(`DATE`)=(SELECT WEEK(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "&#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="expense.php"><div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Current Month Expenses</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT format(SUM(AMOUNT),0) FROM expense WHERE mid(`DATE`,6,2)=(SELECT MONTH(CURDATE()))";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "&#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="expense.php"><div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Expenses</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT format(SUM(AMOUNT),0) FROM expense";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "&#8358; $row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            </div>
          <!-- RECENT PRODUCTS -->
                <div class="col-lg-3">
                    <div class="card shadow h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Recent Products
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="list-group">
                              <?php 
                                $query = "SELECT NAME, PRODUCT_CODE FROM product order by PRODUCT_ID DESC LIMIT 10";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<a href='#' class='list-group-item text-gray-800'>
                                          <i class='fa fa-tasks fa-fw'></i> $row[0]
                                          </a>";
                                  }
                              ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="product.php" class="btn btn-default btn-block">View All Products</a>
                        </div>
                        <!-- /.panel-body -->
                    </div></div></div></div></div></div>
          </div>

<?php
include'../includes/footer.php';
?>