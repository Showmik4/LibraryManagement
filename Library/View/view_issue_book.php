



<?php include 'home.php';
	include '../Model/conn.php';
	
?>

<style>
#customers {
   margin: 8px 350px;
   text-align: center;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}

</style>
<!--All Products starts -->

<div class="center">
	<h3 class="text">Issue Book</h3>
	
	<div id="suggesstion"></div>
	<table id="customers">
		<thead>
			
			
			<th>Book Name</th>
			<th>Book Image</th>
			<th>Issue Date</th>
    
			
			
           
           
		</thead>
		<tbody>
			<?php
         
         

         $faculty_id=$_SESSION['id'];

         


         $result=mysqli_query($conn,"SELECT `issue_book`.`issue_date`,`library_books`.`book_name`, `library_books`.`book_image`FROM `library_books`
         INNER JOIN `issue_book` ON `issue_book`.`book_id`= `library_books`.`id`
         
         
         WHERE `issue_book`.`faculty_id`='$faculty_id'");
         
         while($row=mysqli_fetch_assoc($result)){?>

          <tr>
         
          <td><?=$row['book_name']  ?></td>
          <td><img src="../book_images/<?= $row['book_image']?> " width='80px' height='100px'  alt=""></td>
          <td><?=$row['issue_date']  ?></td>



          </tr>

         <?php
         }

         print_r($row);

          
          ?>
			
		</tbody>
	</table>
</div>
