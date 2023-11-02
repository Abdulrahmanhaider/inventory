<?php
$insert=0;
  include 'connection.php';
  if(isset($_POST['submit'])){
    $sup = "S";
    $date = date("Hymd");
    $num= rand(1000,9999);
    $sup_id =$sup.$date.$num;
    $sup_name=$_POST['sup_name'];
    $sup_mob=$_POST['sup_mob'];
    $sup_add=$_POST['sup_add'];
    // $status=$_POST['sup_status'];
    $timestamp = date("Y-m-d H:i:s");
    $sql ="INSERT INTO `supplier_mstr`(`id`, `supplier_name`, `mobile_no`, `address`,`datetime`) VALUES ('$sup_id','$sup_name','$sup_mob','$sup_add','$timestamp')";
    $result = mysqli_query($conn,$sql);
    if($result){
       $insert=1;
    }else{
      die(mysqli_query($result));
    }
  }  
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Supplier Insert</title>
  <link rel="stylesheet" href="style.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
<div class="nav">
  <li>Inventory</li>
  <li><a href="index.php">ITEMS</a></li>
  <li><a href="list_supplier.php">SUPPLIER</a></li>
  <li><a href="purchase_details_mstr.php">PURCHASE</a></li>
  <li><a href="purchase_details_display.php">PURCHASE DETAILS</a></li>
  <li><a href="sale_mstr_display.php">SALES</a></li>
  <li><a href="sale_details_display.php">Sales Details</a></li>
</div>
<h1>Supplier Details</h1>
<?php    
     if($insert){
    echo '<h3 class="space">Supplier Added sucessfully</h3>';
      $insert=0;
     }
    ?>

<div class="right">



<form  method="post">

                <!-- <p>Supplier Id</p>
                <input type="number" name="sup_id" placeholder="Enter Supplier Id " autocomplete="off"> -->
                <p>Supplier Name</p>
                <input type="text" name="sup_name" placeholder="Enter Supplier Name" autocomplete="off">
                <p>Mobile no.</p>
                <input type="number" name="sup_mob" placeholder="Enter Contact No." autocomplete="off">
                <p>Address</p>
                <input type="text" name="sup_add" placeholder="Enter Address" autocomplete="off">
                <!-- <p> Status</p>
                <input type="text" name="sup_status" placeholder=" Status" autocomplete="off"> -->
                <input type="submit" name="submit" class="btn" value="Add">
                <button class="btn"><a href="list_supplier.php">List Supplier</a></button>
            </form>


</div>
</body>
</html>

