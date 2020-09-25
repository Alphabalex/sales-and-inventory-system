<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
	if (isset($_POST['trans_del']) && !empty($_POST['pin'])){
		$pin=$_POST['pin'];
        $id= $_POST['id'];
        $q1=mysqli_query($db,"SELECT * FROM pin WHERE PIN ='{$pin}'");
        if (mysqli_num_rows($q1)>0) {
            $q2=mysqli_query($db,"SELECT *  FROM transaction  WHERE TRANS_ID ='{$id}'");
            $trans_d_id=mysqli_fetch_assoc($q2)['TRANS_D_ID'];
            $q3 = mysqli_query($db,"DELETE FROM transaction WHERE TRANS_D_ID ='$trans_d_id'");
            $q4 = mysqli_query($db,"DELETE FROM transaction_details WHERE TRANS_D_ID ='$trans_d_id'"); ?>
            <script type="text/javascript">alert("Transaction Successfully Deleted.");window.location = "transaction.php";</script>
 <?php       
    }							
   	else{
        ?>
        <script type="text/javascript">alert("Wrong Pin Supplied.");window.location = "transaction.php";</script>
        <?php
    }		
}
?>