<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
include'../includes/privilege.php';
    if (isset($_POST['us_del']) && !empty($_POST['pin'])){
        $pin=$_POST['pin'];
        $id= $_POST['id'];
        $q1=mysqli_query($db,"SELECT * FROM pin WHERE PIN ='{$pin}'");
        if (mysqli_num_rows($q1)>0) {
            $query = "DELETE FROM users WHERE ID ='$id'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db)); ?>
            <script type="text/javascript">alert("User Successfully Deleted.");window.location = "user.php";</script>
 <?php       
    }                           
    else{
        ?>
        <script type="text/javascript">alert("Wrong Pin Supplied.");window.location = "user.php";</script>
        <?php
    }       
}
?>