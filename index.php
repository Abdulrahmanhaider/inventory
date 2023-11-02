<?php
include'connection.php';
$print=0;
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>display</title> -->
    <title>Inventory Items</title>
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
     <button class="btn btn-primary" ><a href="item.php" class="text-light">Add items</a></button>
     <h2 class="text-info text-center mb-5"> List Items</h2>
     <table class="table">
     <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item code</th>
      <th scope="col">Price</th>
      <th scope="col">Date Time</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>

    </tr>
     <?php
     $data = array();
      $sql = "SELECT * FROM `item_mstr`";
      $result=mysqli_query($conn,$sql);
      if($result){
        if(mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_assoc($result)){
          $data[]=$row;
          // echo $data;
          $item_id =$row['id'];
          $item_name=$row['item_name'];
          $item_code=$row['item_code'];
          $price=$row['price'];
          $status=$row['status'];
          $timestamp = $row['datetime'];
          echo '<tr>
          <th scope="row">'.$item_id.'</th>
          <td>'.$item_name.'</td>
          <td>'.$item_code.'</td>
          <td>'.$price.'</td>
          <td>'.$timestamp.'</td>
          <td>'.$status.'</td>
          <td><button  class="btn btn-primary"><a class="text-light" href="item_update.php?updateid='.$item_id.'">Update</a></button>
          <button onclick="clicked()" class=" btn btn-danger"><a class="text-light" href="item_delete.php?deleteid='.$item_id.'">Delete</a></button></td>
        </tr>'
        ;
         }
        }else{
          // $print =1;
            echo '<td>EMPTY DETAILS</td>';
        
        }
        
      }
     ?>

 
  </thead>
  
</table> 
    
    </div>
<script src="script.js"></script>
</body>
  
</html>
