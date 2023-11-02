<?php
include'connection.php';
session_start();
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>display</title> -->
    <title>Inventory</title>
  <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <div class="container my-5">
     <button class="btn btn-primary" ><a href="sale_str.php" class="text-light">Add</a></button>
     <h2 class="text-info text-center mb-5">Sale Master</h2>
     <table class="table">
     <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">customer_name</th>
      <th scope="col">mob_number</th>
      <th scope="col">BiLL_No</th>
      <th scope="col">invoice_date</th>

      
      <th scope="col">total Amount</th>
      
      <th scope="col">DateTime</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>
    </tr>
     <?php
    //  $sql1="SELECT id FROM `supplier_mstr`";
    //  $result1=mysqli_query($conn,$sql1);
    //  $row1=mysqli_fetch_assoc($result1);
    //  $id1=$row1['id'];
      $sql = "SELECT * FROM `sale_mstr`";
      $result=mysqli_query($conn,$sql);
      if($result){
         while($row=mysqli_fetch_assoc($result)){
          $id =$row['id'];
          $customer_name=$row['customer_name'];
          $mob_number=$row['mob_number'];
          $invoice_no=$row['bill_no'];
          $invoice_date=$row['invoice_date'];
          
          $total_amount=$row['totalamount'];
          $timestamp = $row['datetime'];
          $status = $row['status'];

          echo '<tr>
          <th scope="row">'.$id.'</th>
          <td>'.$customer_name.'</td>
          <td>'.$mob_number.'</td>
          <td>'.$invoice_no.'</td>
          <td>'.$invoice_date.'</td>
          
          <td>'.$total_amount.'</td>
          <td>'.$timestamp.'</td>
          <td>'.$status.'</td>
          <td><button class=" btn btn-danger"><a class="text-light" href="sale_mstr_delete.php?deleteid='.$id.'">Delete</a></button></td>
          
        </tr>'
        ;
         }
        
      }
     ?>

 
  </thead>
  
</table> 
    
    </div>

</body>
  
</html>
<!-- <td><button class="btn btn-primary"><a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>
           -->