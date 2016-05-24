<?php
//clean the address from any unnecessary characters before returning it for use in the header.
	function absolute_url ($page = 'index.php') {

 // Start defining the URL...
 // URL is http:// plus the host name plus the current directory:
$url = 'http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);
// Remove any trailing slashes:
 $url = rtrim($url, '/\\');
 // Add the page: 
 $url .= '/' . $page;

 // Return the URL:
 return $url;

 } // End of absolute_url() function.



 function get_category_by_id($category_id){
 	global $dbc;
 	$q1 = "select * ";
 	$q1 .=" from category ";
 	$q1 .= "where categoryId = ". $category_id;
 	$q1 .= " limit 1";
 	$r = @mysqli_query ($dbc, $q1); // Run the query.
	                
	                if (!$r) { 
	                 	die("data base query failed s"). mysql_error();
	                }
	                 
	                if($result=mysqli_fetch_array($r)){
	            	 	return $result;
	        	 	}
	         else {return NULL;}
	     }


//to select product based on the category chosen by the client
function product_by_category($category_id){

		echo "<ul>";
			global $dbc;
				 	$q1 = "select * ";
				 	$q1 .=" from product ";
				 	$q1 .= "where categoryId = ". $category_id;
				 	$q1 .= " order by productName asc";
				 	$r = @mysqli_query ($dbc, $q1);

		                if (!$r) { 
		                 	die("data base query failed"). mysqli_error();
		                 
		                }
		               
		                $rows=mysqli_num_rows($r);
		                while($product=mysqli_fetch_array($r)){
								//echo '<li>'. $product["productName"].$product["sellingPrice"]."</li><br />";
							echo	'<div class="product-item">';
			echo '<form method="post" action="index.php?action=add&id='. $product["productId"]."&name=".$product['productName']."\">";
			echo '<div class="product-image"><img src=" '. $product["image"].'"></div>';
			echo '<div><strong>'.$product["productName"].'</strong></div>';
			echo '<div class="product-price">'.$product["sellingPrice"]. " fcfa".'</div>';
		echo '<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to bag" class="btnAddAction" /></div>
			</form>';
		echo '</div>';
		}	
	
}
//add function
function addItemTobag(){
		// get the product id
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";
		 
		/*
		 * check if the 'cart' session array was created
		 * if it is NOT, create the 'cart' session array
		 */
		 if($id!="" &&name!=""){
				if(!isset($_SESSION['bag_item'])){
					$_SESSION['bag_item'] = array();
				}
				 
				// check if the item is in the array, if it is, do not add
				if(array_key_exists($id, $_SESSION['bag_item'])){
					// redirect to index page and tell the user it was added to cart
					header('Location: index.php?action=exists&id' . $id . '&name=' . $name);
				}
				 
				// else, add the item to the array
				else if (isset($_GET["id"])!=""){
					$_SESSION['bag_item'][$id]=$name;
					// redirect to product list and tell the user it was added to cart
					header('Location: index.php?action=add&id' . $id . '&name=' . $name);
				}
				else header("Location:index.php");
			}
}

//remove item from bag 
function removeItemFromBag(){
	session_start();
		// get the product id
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		 
		// remove the item from the array
		unset($_SESSION['bag_item'][$id]);
		 
		// redirect to product list and tell the user it was added to cart
		header('Location: index.php?action=removed&id=' . $id . '&name=' . $name);
}
//returns the profit based on the category

function profit_by_category($category_id){

		
			global $dbc;
				 	$q1 = "select * ";
				 	$q1 .=" from product ";
				 	$q1 .= "where categoryId = ". $category_id;
				 	$q1 .= " order by productName asc";
				 	$r = @mysqli_query ($dbc, $q1);

		                if (!$r) { 
		                 	die("data base query failed"). mysqli_error();
		                 
		                }
		               
		                $rows=mysqli_num_rows($r);
		                echo '<table class="table table-stripped">';
		                echo '<th>product Name</th><th>cost Price</th><th>selling price</th><th>quantity sold</th><th>Profit</th>';
		                while($product=mysqli_fetch_array($r)){
		          echo '<tr>';   
		   echo  '<td>'.$product["productName"].'</td>	<td>'.$product["costPrice"].'</td><td>'.$product["sellingPrice"].'</td><td>'.$product["quantitySold"].'</td><td>'.$product["quantitySold"]* ($product["sellingPrice"]-$product["costPrice"]).'</td></tr>';			
		}	
		echo '</table>';
	}
?>

