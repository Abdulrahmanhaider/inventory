<?php
 include 'connection.php';
$print =0;
 session_start();

// mysqli_query($conn, $sql);


 if(isset($_POST['submit'])){
   
  $invoice=$_POST['invoice_no'];
  $invoice_date=$_POST['invoice_date'];
    
    
  $prefix ="P";
  $date= date("Hymd");
  $unique=rand(1000,9999);
  $id=$prefix.$date.$unique;

  $timestamp = date("Y-m-d H:i:s");
 
  $sup_id=$_POST['sup_id'];
 


      $sql ="INSERT INTO `purchase_mstr`( `id`,`invoice_no`,`invoice_date`,`supplier_id`,`datetime`) VALUES ('$id','$invoice','$invoice_date','$sup_id','$timestamp')";
        $result = mysqli_query($conn,$sql);
  

    if($result){
      $print = 1;
    }

      }

 

 
      
 

   
 
     
  
 
    
   
       

 
  
    
    
   
   

  
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Purchase insert</title>
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

  <?php    
     if($print){
    echo '<h3 class="space">Data Inserted sucessfully</h3>';
      $insert=0;
     }
    ?>
  <div class="right">
    <form method="post">

      <!-- <p>Id</p>
                <input type="number" name="purchase_id" placeholder="Enter Purcahse Id " autocomplete="off"> -->
      <p>invoice_no</p>
      <input type="text" name="invoice_no" placeholder="Enter Invoice no." autocomplete="off">
      <p>invoice_date</p>
      <input type="date" name="invoice_date" placeholder="Enter Date " autocomplete="off">
      <p>Supplier ID</p>
      <select name="sup_id">
      <?php 
       
       $sql = "SELECT * FROM `supplier_mstr`";
       $result=mysqli_query($conn,$sql);
       if($result){
        if(mysqli_num_rows($result)>0)
          while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            // echo $id;
            $sup_name=$row['supplier_name'];
            ?>

         
         <option value="<?php echo $row['id']?>">ID - <?php echo "( $id ) Name - $sup_name "?></option>
         <?Php
          }
        }
    //  <select name="" id=""><option value=""></option></select>
    ?>
    </select>
      <!-- <p>Total Amount</p>
                <input type="text" name="amount" placeholder="Enter Total Amount" autocomplete="off"> -->

      <!-- <p>Item Status</p>
                <input type="text" name="status" placeholder="Enter purchase Status" autocomplete="off"> -->
      <input type="submit" name="submit" class="btn" value="Add_Puchase">
      <button class="btn"><a href="purchase_details_mstr.php">Details</a></button>
    </form>
  </div>
</body>

</html>