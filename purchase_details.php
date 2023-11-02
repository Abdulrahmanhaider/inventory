<?php
 include 'connection.php';
 session_start();
 
 
 if(isset($_POST['submit'])){
   
  $p ="D";
  $date= date("Hymd");
  $unique=rand(1000,9999); 
  $id = $p.$unique.$date; 
  $item_id=$_POST['item_id'];

    
    $quantity=$_POST['quantity'];
    
    $price=$_POST['price'];
   
    $amount = intval ($price  * $quantity); 

    $purchase_master_id=$_POST['purchase_id'];

    $mysql = "UPDATE purchase_mstr SET total_amount=$amount where id='$purchase_master_id'";
      mysqli_query($conn,$mysql); 
    $timestamp = date("Y-m-d H:i:s");
    $sqli ="INSERT INTO `puchase_details`(`id`,`item_id`,`purchase_master_id`,`quantity`,`price`,`amount`,`datetime`) VALUES ('$id','$item_id','$purchase_master_id','$quantity','$price','$amount','$timestamp')";
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
    <form method="post">

      <!-- <p>Id</p>
      <input type="number" name="id" placeholder="Enter Purcahse Id " autocomplete="off"> -->
      <p>Item id</p>
      
      <select name="item_id" onclick="changed(this.value)">
      <?php 
       
       $emp = array();
       $sql = "SELECT * FROM `item_mstr`";
       $result=mysqli_query($conn,$sql);
       if($result){
        if(mysqli_num_rows($result)>0)
          while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
           $price =$row['price'];

            $emp[$id] = $price;

            $id=$row['id'];
         

         
            $item_name=$row['item_name'];

            // $emp = ["id"=>1,"name"=>"vijay",["id"=>2,"name"=>"ajay"]];
            $json=json_encode($emp);
            ?>

         
         <option value="<?php echo $row['id']?>" >ID - <?php echo "( $id ) Name - $item_name "?></option>
    
         <?Php
          }
        }
   
    ?>
    </select>
  
    <p>Price</p>
      <input type="text" name="price" id="item_price"  readonly style="width:30%;">
      
      <p>Quantity</p>
      <input type="number" id="quantity_id" onchange="quant();"  name="quantity" placeholder="Enter item quantity" autocomplete="off" style="width:50%;">
      <p>Total Amount</p>
      <input type="number" name="am" id="total_am" autocomplete="off" style="width:50%;">
      <p>Purchase Mater Id</p>
    <select name="purchase_id" id="">
   <?php
    $sql = "SELECT *from purchase_mstr where `status`=1";
    $result = mysqli_query($conn,$sql);
    if($result){
      if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        ?> 
        <option value="<?php echo $row['id']?>" >ID - <?php echo "( $id )"?></option>
        <?php
      }
      
     
     
      }else("EMPTY DATA");
    }
   ?>
    

    </select>

      <!-- <input type="text" name="purchase_id" placeholder="Enter Purchase ID" autocomplete="off"> -->
      <input type="submit" name="submit" class="btn" value="Add_Puchase">
      <button class="btn"><a href="purchase_details_display.php">Show Details</a></button>
    </form>
  </div>
</body>
<script >

var price;
 function changed(data){
  var ch = data;
  var emp=<?= $json?>;
   price = emp[ch];
  document.getElementById("item_price").value=price;
   
 }

var quan;

function quant(){
   quan =  document.getElementById("quantity_id").value;
  total = price*quan;
  
  document.getElementById("total_am").value=total;
}






</script>

</html>