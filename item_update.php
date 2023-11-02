<?php
include'connection.php';
$id = $_GET['updateid'];
$sql="SELECT *FROM item_mstr where id ='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
        //   $item_id =$row['id'];
          $item_name=$row['item_name'];
          $item_code=$row['item_code'];
          $price=$row['price'];
          $status=$row['status'];
          $timestamp = $row['datetime'];
}else{
    die(mysqli_error($result));
}



  if(isset($_POST['submit'])){
    $item_id =$_POST['item_id'];
    $item_name=$_POST['item_name'];
    $item_code=$_POST['item_code'];
    $price=$_POST['item_price'];
    $status=$_POST['item_status'];
    $timestamp = date("Y-m-d H:i:s");
    $sql = "update `item_mstr` set id='$id',item_name='$item_name',item_code='$item_code',price='$price',status=$status,datetime='$timestamp'where id =$id";
    $result = mysqli_query($conn,$sql);
    if($result){
       header('location:index.php');
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
<h1>Update Item</h1>


<div class="right">



<form  method="post">

                <p>Item Id</p>
                <input type="number" name="item_id" placeholder="Enter Item Id "value="<?php echo $id ?>" autocomplete="off">
                <p>Item Name</p>
                <input type="text" name="item_name" placeholder="Enter Item Name" value="<?php echo $item_name ?>"  autocomplete="off">
                <p>Item Code</p>
                <input type="text" name="item_code" placeholder="Enter Item Code "value="<?php echo $item_code ?>" autocomplete="off">
                <p>Item Price</p>
                <input type="number" name="item_price" placeholder="Enter Item Price" value="<?php echo $price ?>" autocomplete="off">
                <p>Item Status</p>
                <input type="text" name="item_status" placeholder="Enter Item Status" value="<?php echo $status ?>" autocomplete="off">
                <input type="submit" name="submit" class="btn" value="Update_Item">
                <button class="btn"><a href="index.php">Back</a></button>
            </form>



</div>
</body>
</html>

