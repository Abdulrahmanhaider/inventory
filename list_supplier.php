<?php
include'connection.php';

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Supplier</title>
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
   
     <button class="btn btn-primary" ><a href="supplier.php" class="text-light">Add Supplier</a></button>
     <h2 class="text-info text-center mb-5">Supplier List</h2>
     <table class="table">
     <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">supplier Name</th>
      <th scope="col">mobile_no</th>
      <th scope="col">Address</th>
      <th scope="col">Date Time</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>

    </tr>
     <?php
      $sql = "SELECT * FROM `supplier_mstr`";
      $result=mysqli_query($conn,$sql);
      if($result){
         while($row=mysqli_fetch_assoc($result)){
         
            $sup_id =$row['id'];
            $sup_name=$row['supplier_name'];
            $sup_mob=$row['mobile_no'];
            $sup_add=$row['address'];
        
          $status=$row['status'];
          $timestamp = $row['datetime'];
          echo '<tr>
          <th scope="row">'.$sup_id.'</th>
          <td>'.$sup_name.'</td>
          <td>'.$sup_mob.'</td>
          <td>'.$sup_add.'</td>
          <td>'.$timestamp.'</td>
          <td>'.$status.'</td>
          <td><button class="btn btn-primary"><a class="text-light" href="supplier_update.php?updateid='.$sup_id.'">Update</a></button>
          <button class=" btn btn-danger"><a class="text-light" href="supplier_delete.php?deleteid='.$sup_id.'">Delete</a></button></td> 
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
