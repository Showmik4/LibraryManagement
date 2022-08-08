



<?php include 'home.php';
	include '../Controller/BooksController.php';
	$products = getBooks();
?>
<!--All Products starts -->
<div id="serach_bar">
<label>Search</label>
<input type="text" id="search">
</div>
<div class="center">
	<h3 class="text">All Products</h3>
	
	<div id="suggesstion"></div>
	<table class="table table-striped" id="table-data">
		<thead>
			<th>Sl#</th>
			
			<th>Book Name</th>
			<th>Author Name</th>
			<th>Purchase Date</th>
      <th>Price</th>
      <th>Book quantity</th>
      <th>Available Quantity</th>
			
			
           
            <th>Image</th>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach($products as $p){
					echo "<tr>";
						echo "<td>$i</td>";
						
						echo "<td>".$p["book_name"]."</td>";
						echo "<td>".$p["author_name"]."</td>";
						echo "<td>".$p["purchase_date"]."</td>";
            echo "<td>".$p["book_price"]."</td>";
            echo "<td>".$p["book_qty"]."</td>";
            echo "<td>".$p["available_qty"]."</td>";
                     
                    	echo "<td><img  width='80px' height='100px' src='".$p["book_image"]."'></td>";
                      

					
					echo "</tr>";
					$i++;
				}
			?>
			
		</tbody>
	</table>
</div>



