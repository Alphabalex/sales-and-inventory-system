<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
	if (isset($_POST['cre_del']) && !empty($_POST['pin'])){
		$pin=$_POST['pin'];
        $id= $_POST['id'];
        $q1=mysqli_query($db,"SELECT * FROM pin WHERE PIN ='{$pin}'");
        if (mysqli_num_rows($q1)>0) {
            $query = "DELETE FROM credit WHERE CREDIT_ID ='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db)); ?>
            <script type="text/javascript">alert("Credit Successfully Deleted.");window.location = "cust_debt.php";</script>
 <?php       
    }							
   	else{
        ?>
        <script type="text/javascript">alert("Wrong Pin Supplied.");window.location = "cust_debt.php";</script>
        <?php
    }		
}
?>