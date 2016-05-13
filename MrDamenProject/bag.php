<?php 
session_start();
require_once('include/connection.php');
include("include/included_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<script src="javascript/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheet/signin.css">
<link href="stylesheet/bootstrap.min.css" rel="stylesheet">

<link href="stylesheet/style.css" rel="stylesheet">
<script type="text/javascript" src="javascript/bag.js"></script>
<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
<title> items in your bag</title>
</head>
<body>
<?php include('include/navigation.php');?>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 $quantity=$_POST['quantity'];
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> has been removed from your bag!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity has been updated!";
    echo "</div>";
}
 
if(count($_SESSION['bag_item'])>0){
 
    // get the product ids
    $ids ="";
    foreach($_SESSION['bag_item'] as $id=>$value){
        $ids =  $ids.$id."," ;
    }
 
    // remove the last comma
    $ids = rtrim($ids, ',');
  
			//$q1 = "select productId,productName,sellingPrice from product where productId in ({$ids}) ";
        $q1 = "select * ";
          $q1 .=" from product ";
          $q1 .= "where productId  in  ({$ids})";
          $q1 .= " order by productName "; 
          $r = @mysqli_query ($dbc, $q1);

                    if (!$r) { 
                      die("data base query failed towork"). mysqli_error();
                     
                    }
                   
                    $rows=mysqli_num_rows($r);
                    while($product=mysqli_fetch_array($r)){
                //echo '<li>'. $product["productName"].$product["sellingPrice"]."</li><br />";
              echo  '<div class="product-item">';
				  echo '<div class="product-image"><img src=" '. $product["image"].'"></div>';
				  echo '<div><strong>'.$product["productName"].'</strong></div>';
				  echo '<div class="product-price">'.$product["sellingPrice"]. "fcfa".'</div>';
				 
				echo '<div><a href="removeItem.php?id=' .$product['productId']."&name=".$product['productName'].' "> remove from bag</a></div>';
				$total+=$product['sellingPrice'];
    		echo '</div>';
    		}
    		echo "total =".$total."fcfa<br/>";
    		echo '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Place Order</button>';
   
}
 ?>
 <!--modal beginning -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Please fill the form below</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="processCustOrder.php" class="form-signin">
          <div id="panel1">
            First Name: 
              <input type="text" placeholder="your name" name="firstName"  class="form-control" required><br/>
            Last Name:
              <input type="text" placeholder="your Last Name" name="lastName" class="form-control" required><br/>
            Gender:
            <select class="form-control" name="gender">
            	<option  value="M">M</option>
            	<option value="F">F</option>
              <input type="text" placeholder="your gender" name="gender" class="form-control" required><br/>
            Phone Number
              <input type="text" placeholder="phone numb" name="phoneNumber" class="form-control"> <br />
            Email: 
              <input type="email" placeholder="email" name="email" class="form-control"><br />
            Region: 
              <input type="text" placeholder="your region" name="region" class="form-control"><br/>
            Town: 
              <input type="text" placeholder="your town" name="town" class="form-control"><br/>

              <button id="btn2" type="button" class="btn btn-sm btn-primary">Continue</button>
              <button id="cancelpanel1" type="button" class="btn btn-sm btn-warning">Cancel</button>
          </div><br />
          <div id="panel2">
          <label> other worries</label>
          <textarea class="form-control" rows="5" id="comment" name="commentArea"></textarea>
          check this box to pay by mobile money:<br />
          <input type="checkbox" checked="checked" class="form-control" name="checkpay"><br/>
          Amount:
          <input type="text" placeholder="amount" class="form-control" name="amount">
            <button id="btn3" type="button" class="btn btn-sm btn-success">pay</button>
            <button id="cancelpanel2" type="button" class="btn btn-sm btn-warning">Cancel</button>
          </div>
          <div id="panel3">
          click the button down to accept payment
          <button type="button" class="btn btn-sm btn-success id="btn5">accept</button>
          <button id="cancelpanel3" type="button" class="btn btn-sm btn-warning">Cancel</button>
          </div>
          <div id="panel4">
            <input type="text" placeholder="use mobile money" class="form-control" name="mobileMoney">
            <input type="submit" name="submitted" value="submit">
            <button id="cancelpanel4" type="button" class="btn btn-sm btn-warning">Cancel</button>
          </div>         
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!-- modal ending -->
</body> </html>
