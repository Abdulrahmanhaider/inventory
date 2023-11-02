<?php
include'connection.php';
$id = $_GET['deleteid'];

$sql="UPDATE `item_mstr` set status=0 where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header('location:index.php');
}else{
    die(mysqli_error($result));
}
?>