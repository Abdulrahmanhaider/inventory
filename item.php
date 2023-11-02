<?php
$insert=0;
  include 'connection.php';
  if(isset($_POST['submit'])){
     
    $item ="I";
    $date= date("Hymd");
    $unique=rand(1000,9999);
   
   
    $item_id =$item.$date.$unique;
    $item_name=$_POST['item_name'];
    $item_code=$_POST['item_code'];
    $price=$_POST['item_price'];
    // $status=$_POST['item_status'];
    $timestamp = date("Y-m-d H:i:s");
    $sql ="INSERT INTO `item_mstr`(`id`, `item_name`, `item_code`, `price`,`datetime`) VALUES ('$item_id','$item_name','$item_code','$price','$timestamp')";
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
  <li>Intem Insert</li>
  <li><a href="index.php">ITEMS</a></li>
  <li><a href="list_supplier.php">SUPPLIER</a></li>
  <li><a href="purchase_details_mstr.php">PURCHASE</a></li>
  <li><a href="purchase_details_display.php">PURCHASE DETAILS</a></li>
  <li><a href="sale_mstr_display.php">SALES</a></li>
  <li><a href="sale_details_display.php">Sales Details</a></li>
</div>
<h1>Insert Item</h1>
<?php    
     if($insert){
    echo '<h3 class="space">Data Inserted sucessfully</h3>';
      $insert=0;
     }
    ?>

<div class="right">



<form  method="post">

                <!-- <p>Item Id</p>
                <input type="number" name="item_id" placeholder="Enter Item Id " autocomplete="off"> -->
                <p>Item Name</p>
                <input type="text" name="item_name" placeholder="Enter Item Name" autocomplete="off">
                <p>Item Code</p>
                <input type="text" name="item_code" placeholder="Enter Item Code " autocomplete="off">
                <p>Item Price</p>
                <input type="number" name="item_price" placeholder="Enter Item Price" autocomplete="off">
                <!-- <p>Item Status</p> -->
                <!-- <input type="text" name="item_status" placeholder="Enter Item Status" autocomplete="off"> -->
                <input type="submit" name="submit" class="btn" value="Add_Item">
                <button class="btn"><a href="index.php">List items</a></button>
            </form>



</div>
</body>
</html>

