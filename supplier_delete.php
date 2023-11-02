<?php
include 'connection.php';
$id = $_GET['deleteid'];
$sql="update `supplier_mstr` set status=0 where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header('location:list_supplier.php');
}else{
    die(mysqli_error($result));
}

?>