



<?php include 'home.php';
	include '../Model/conn.php';
	
?>

<style>


  
#customers {
  margin: 8px 350px;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
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
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<!--All Products starts -->

<div class="center">
	<h3 class="text">Return Book</h3>
	
	<div id="suggesstion"></div>
	<table id="customers">
		<thead>
			
			
			<th>Faculty Username</th>
            <th>Book Name</th>
			<th>Book Image</th>
			<th>Book Issue Date</th>
            <th>Return Book</th>
    
			
			
           
           
		</thead>
		<tbody>
			<?php
         
         

         $faculty_id=$_SESSION['id'];

         


         $result=mysqli_query($conn,"SELECT `issue_book`.`id`,`issue_book`.`book_id`,`issue_book`.`issue_date`,`library_books`.`book_name`, `library_books`.`book_image`,`users`.`username`
         FROM `issue_book`
                  INNER JOIN `library_books` ON `issue_book`.`book_id`= `library_books`.`id`
                    INNER JOIN `users` ON `issue_book`.`faculty_id`= `users`.`id`
                  
                  WHERE `issue_book`.`return_date`='' AND `issue_book`.`faculty_id`=$faculty_id");
         
         while($row=mysqli_fetch_assoc($result)){?>

          <tr>

          <td><?=$row['username']  ?></td>
         
          <td><?=$row['book_name']  ?></td>
          <td><img src="../book_images/<?= $row['book_image']?> " width='80px' height='100px'  alt=""></td>
          <td><?=$row['issue_date']  ?></td>

          <td><a class="button" href="return_book.php?id=<?=$row['id']  ?>&book_id=<?=$row['book_id']  ?>">Return Book</a></td>

          </tr>

         <?php
         }

         

          
          ?>

<?php
if(isset($_GET['id'])){


    

     $id=$_GET['id'];
     $book_id=$_GET['book_id'];
    
     $date=date('d-m-y');

  

        //mysqli_query($conn,"UPDATE `issue_book` SET `return_date`='$date' WHERE `id`=`$id`;");

        $result=mysqli_query($conn,"UPDATE `issue_book` SET `return_date`='$date' WHERE `id`=$id;" );

        if($result){
            mysqli_query($conn,"UPDATE `library_books` SET `available_qty`=`available_qty`+1 WHERE `id`=$book_id" );

            ?>
            <script type="text/javascript">
      
              alert("Book Returned Successfully")
              javascript:history.go(-1);
            </script>
      
           <?php

       

     

        }

        else{

          
            ?>
            <script type="text/javascript">
      
              alert("Book Returned Failed")
            </script>
      
           <?php

       
        }

}
?>
			
		</tbody>
	</table>
</div>
