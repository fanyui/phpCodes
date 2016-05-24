if(isset($_GET["category"])){
		$categoryValue=$_GET['category'];

function profit_by_category($category_id){

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
		                echo '<table class="table table-stripped">';
		                echo '<th>product Name</th><th>cost Price</th><th>selling price</th><th>quantity sold</th><th>Profit</th>
		                while($product=mysqli_fetch_array($r)){
		          echo '<tr>   
		   echo '<td>$product["productName']</td>	<td>$product["costPrice"]</td><td>$product["sellingPrice"]</td><td>$product["quantitySold"]</td><td>$product["quantitySold"]*$product["sellingPrice"]-$product["costPrice"]</td>				
		                </tr>'				
		}	
		echo '</table>';
	}
