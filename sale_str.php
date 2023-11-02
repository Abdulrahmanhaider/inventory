<?php
$insert=0;
  include 'connection.php';
  if(isset($_POST['submit'])){
    $id =$_POST['id'];
    $customer_name=$_POST['customer_name'];
    $mob_number=$_POST['mob_number'];
    // $invoice_no=$_POST['invoice_no'];
    
    $prefix ="BILL";
    $date= date("Hymd");
    $unique=rand(1000,9999);
    $bill_no=$prefix.$date.$unique;


    // $status=$_POST['status'];
    $timestamp = date("Y-m-d H:i:s");
    $date = date("Y-m-d");
    $sql ="INSERT INTO `sale_mstr`(`id`, `customer_name`, `mob_number`, `bill_no`,`invoice_date`,`datetime`) VALUES ('$id','$customer_name','$mob_number','$bill_no','$date','$timestamp')";
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

    <title>Inventory</title>
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
    <!-- <h1>Insert Item</h1> -->
    <?php    
     if($insert){
    echo '<h3 class="space">Successfully</h3>';
      $insert=0;
     }
    ?>



    <div class="right">
        <form method="post">
            <p>Customer Id</p>
            <input type="number" name="id" placeholder="Enter Customer Id " autocomplete="off">
            <p>Customer Name</p>
            <input type="text" name="customer_name" placeholder="Enter Customer Name" autocomplete="off">
            <p>Mobile No:</p>
            <input type="text" name="mob_number" placeholder="Enter Mobile No. " autocomplete="off">
            <!-- <p>Invoice No.</p>
            <input type="text" name="invoice_no" placeholder="Enter Invoice No" autocomplete="off"> -->
            <!-- <p>Status</p>
            <input type="text" name="status" placeholder=" Status" autocomplete="off"> -->
            <input type="submit" name="submit" class="btn" value="Add_Cust">
            <button class="btn"><a href="sale_mstr_display.php">List Sale Master</a></button>
        </form>
    </div>
</body>

</html>