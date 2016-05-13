
<?php
session_start();
require_once('include/connection.php');
include("include/included_functions.php");
	$categoryValue=-1;
	$category_name=NULL;
	if(isset($_GET["category"])){
		$categoryValue=$_GET['category'];
		$category_name=get_category_by_id($categoryValue);
		//use categoryValue to select the product in that category so that it will be used to display it in the content page
		//similar to the line above by creating a funtion that does the work

	}
?>
<!DOCTYPE html>
<html>
<head>
<script src="javascript/jquery.js"></script>
<link href="stylesheet/style.css" rel="stylesheet">
<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheet/signin.css">
<script type="text/javascript" src="javascript/bag.js"></script>
<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
</head>
<body><!-- navigation menu bar -->
	<?php include('include/navigation.php');?>
		<!-- end of navigation bar -->
	
<div id="mainContent">
<!--left side for the display of the links -->	
		<div class="col-sm-3 col-md-2 sidebar" >
	          <ul class="nav nav-sidebar">
	            <?php	echo"<h1>Category</h1>";
		                $q1 ="select * from category";
		                $r = @mysqli_query ($dbc, $q1); // Run the query.                
		                if (!$r) { 
		                 	die("data base query failed"). mysqli_error(); 
		                }
		                while($category=mysqli_fetch_array($r)){	                	
		                	//if a category is selected apply selected class to it which will make it bold
								echo "<li";
								if($categoryValue==$category["categoryId"]){
									echo " class=\"selected\" ";
								}
								echo "> <a href =\"index.php?category=".urlencode($category["categoryId"]) ."\"> {$category["categoryName"]} </a> </li>";
						}
				?> 
	          </ul>
        </div>
   
        <!--right side for the display of the result -->
        <!-- adds and item to the bag -->
        <?php 
        addItemTobag(); 
        ?>
        
        
        
		<div class="col-sm-6" id="content">
		    	<h1 class="page-header">
		      		<?php 
						if(!is_null($category_name))//prevent printing gabage the first time the page is loaded
						echo $category_name['categoryName'];
					?>
				</h1>
		  		      <div class="row placeholder">
		      	<?php   
		      	//display a message before displaying the products
		      	// to prevent undefined index notice
					$action = isset($_GET['action']) ? $_GET['action'] : "";
					$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
					$name = isset($_GET['name']) ? $_GET['name'] : "";
					 
					if($action=='add'){
						echo "<div class='alert alert-info'>";
							echo "<strong>{$name}</strong> has been added to your bag!";
						echo "</div>";
					}
					 
					if($action=='exists'){
						echo "<div class='alert alert-info'>";
							echo "<strong>{$name}</strong> already exists in your bagg change quantity if you want more than 1!";
						echo "</div>";
					}
						//display the carousal on first arival on the index page
					if($categoryValue==-1){
						echo	'<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						  </ol>
						  <div class="carousel-inner">
							<div class="item active">
							  	 <img src="images/deco/hari.JPG" alt="HARI">
							</div>
							<div class="item">
								<img src="images/deco/GOKU.jpg" alt="GOKU">
							</div>
							<div class="item">
					 			<img src="images/deco/ONEPIECE.jpg" alt="ONEPIECE">
							</div>
							<div class="item">
								<img src="images/deco/GOKUTRAIN.jpg" alt="GOKUTRAIN">
							</div>
						  </div>
						  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
   							 <span class="glyphicon glyphicon-chevron-left"></span>
 							 </a>
						  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
  							  <span class="glyphicon glyphicon-chevron-right"></span>
 						 </a>
						</div>';
					}
					else{
					 product_by_category($categoryValue);//display the product chosen by the client based on the category
					}
				?>
	    </div>
</div>
<div class="image-wrap">
	<img src="images/hari.jpg" width="400px" height="300px" alt="harisu's fanyui's">
</div>
</body>
<?php mysqli_close($dbc); ?>
<!-- Mirrored from www.w3schools.com/jquery/tryit.asp?filename=tryjquery_slide_down by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jan 2015 07:26:15 GMT -->
</html>





