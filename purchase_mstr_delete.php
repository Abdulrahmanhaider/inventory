<?php 
include'connection.php';
$id=$_GET['deleteid'];
$sql="update `purchase_mstr` set status=0 where id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    header('location:purchase_details_mstr.php');
}else{
    die(mysqli_error($result));
}
?>