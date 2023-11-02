<?php
include 'connection.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM supplier_mstr where id='$id'";
      $result=mysqli_query($conn,$sql);
      if($result){
         $row=mysqli_fetch_assoc($result);
         
            // $sup_id =$row['id'];
            $sup_name=$row['supplier_name'];
            $sup_mob=$row['mobile_no'];
            $sup_add=$row['address'];
        
          $status=$row['status'];
          $timestamp = $row['datetime'];
         
        
        }else{
            die(mysqli_error($result));
        }
    
         
    
   
          
if(isset($_POST['submit'])){
    $sup_id =$_POST['sup_id'];
    $sup_name=$_POST['sup_name'];
    $sup_mob=$_POST['sup_mob'];
    $sup_add=$_POST['sup_add'];
    $status=$_POST['sup_status'];
    $timestamp = date("Y-m-d H:i:s");
    $sql ="update `supplier_mstr` set id='$id',supplier_name='$sup_name', mobile_no='$sup_mob', address='$sup_add',datetime='$timestamp', status='$status' where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
       header('location:list_supplier.php');
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
  <li>Update Supplier</li>
  <li><a href="index.php">ITEMS</a></li>
  <li><a href="list_supplier.php">SUPPLIER</a></li>
  <li><a href="purchase_details_mstr.php">PURCHASE</a></li>
  <li><a href="purchase_details_display.php">PURCHASE DETAILS</a></li>
  <li><a href="sale_mstr_display.php">SALES</a></li>
  <li><a href="sale_details_display.php">Sales Details</a></li>
</div>
<h1>Supplier Update</h1>


<div class="right">



<form  method="post">

                <p>Supplier Id</p>
                <input type="number" name="sup_id" placeholder="Enter Supplier Id "value="<?php echo $id  ?>" autocomplete="off">
                <p>Supplier Name</p>
                <input type="text" name="sup_name" placeholder="Enter Supplier Name"value="<?php echo $sup_name  ?>" autocomplete="off">
                <p>Mobile no.</p>
                <input type="number" name="sup_mob" placeholder="Enter Contact No." value="<?php echo $sup_mob ?>" autocomplete="off">
                <p>Address</p>
                <input type="text" name="sup_add" placeholder="Enter Address" value="<?php echo $sup_add ?>" autocomplete="off">
                <p> Status</p>
                <input type="text" name="sup_status" placeholder=" Status" value="<?php echo $status ?>" autocomplete="off">
                <input type="submit" name="submit" class="btn" value="Update">
                <button class="btn"><a href="list_supplier.php">Back</a></button>
            </form>


</div>

    
</body>
</html>