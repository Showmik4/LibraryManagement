<?php
$connect=mysqli_connect("localhost","root","","library");
$select="SELECT * FROM library_books";
$ex=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($ex)){?>

<tr>
<td><?php echo $row['book_name'];?></td>

<td><?php echo $row['author_name'];?></td>
<td><?php echo $row['purchase_date'];?></td>
<td><?php echo $row['book_price'];?></td>
<td><?php echo $row['book_qty'];?></td>
<td><?php echo $row['available_qty'];?></td>
<td><img src="../book_images/<?php echo $row['book_image'];?>" width='80px' height='100px'  ></td>



</tr>


<?php

}



?>