<?php
include 'connect.php';

if(isset($_POST['deletesend'])){
    $unique=$_POST['delatesend'];

    $sql="delete from `crud` where id=$unique";
    $result=mysqli_query($con,$sql);
}


?>
