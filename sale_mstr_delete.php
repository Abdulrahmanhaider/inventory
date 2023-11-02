<?php 
include'connection.php';
$id=$_GET['deleteid'];
$sql="update `sale_mstr` set status=0 where id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    header('location:sale_mstr_display.php');
}else{
    die(mysqli_error($result));
}
?>