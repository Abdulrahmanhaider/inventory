

<?php
 include 'connection.php';
 session_start();
 
 
 if(isset($_POST['submit'])){
   
      $item_id=$_POST['item_id'];

      $sql = "SELECT *from `item_mstr` where id=$item_id";
      $res = mysqli_query($conn,$sql);
      if($res){
        $row= mysqli_fetch_assoc($res);
        $price = $row['price'];
      }else{
        echo 'Data Not Found';
      }
      $id = $_POST['id'];
      $quantity=$_POST['quantity'];
      $amount=intval($price * $quantity);
      $sale_mstr_id=$_POST['sale_mstr_id'];
      $mysql = "UPDATE sale_mstr SET totalamount=$amount where id=$sale_mstr_id";
      mysqli_query($conn,$mysql);  
    //  $status=$_POST['status'];
    $timestamp = date("Y-m-d H:i:s");
    $sqli ="INSERT INTO `sale_details`(`id`,`item_id`,`sale_mstr_id`,`quantity`,`price`,`amount`,`datetime`) VALUES ('$id','$item_id','$sale_mstr_id','$quantity','$price','$amount','$timestamp')";
    $result = mysqli_query($conn,$sqli);
    
      
   
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
<div class="right">
<form  method="post">

                <p>Id</p>
                <input type="number" name="id" placeholder="Enter Id " autocomplete="off">
                <p>Item id</p>
                <input type="number" name="item_id" placeholder="Enter Item ID." autocomplete="off">
                <p>Quantity</p>
                <input type="number" name="quantity" placeholder="Enter item quantity" autocomplete="off" >
                <p>Sale Master Id</p>
                <input type="number" name="sale_mstr_id" placeholder="Enter sale Master ID" autocomplete="off">
                
                <!-- <p>Item Status</p>
                <input type="text" name="status" placeholder="Enter purchase Status" autocomplete="off"> -->
                <input type="submit" name="submit" class="btn" value="Add_Details">
                <button class="btn"><a  href="sale_details_display.php">Show Details</a></button>
            </form>
            </div>
</body>
</html>