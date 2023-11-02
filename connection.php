
<?php

$server = 'localhost';
$username= 'root';
$password= "";
$db='inventory';

$conn = mysqli_connect($server,$username,$password,$db);
if(!$conn){
    // echo "connection successfully";
    die(mysqli_error($conn));

}

// include'connection.php';
// $sql = "CREATE TABLE purchase_mstr(id int primary key auto i,invoice_no varchar(100),invoice_data date, 
// foreign key (id) references supplier_mstr(id),total_amount int,dates datetime,stat varchar(50))";
// mysqli_query($conn,$sql);
// mysqli_close($conn);
?>

