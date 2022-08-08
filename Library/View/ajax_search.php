<?php
include '../Model/conn.php';
$search=$_POST['search'];
$sql="SELECT * FROM library_books WHERE book_name LIKE '%$search%' OR author_name LIKE '%$search%'";
$result=$conn->query($sql);
$count=$result->num_rows;
//echo $count;
?>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
</style>



<table id="customers">
    <tr>

    <th>Book Name</th>
    <th>Author Name</th>
    <th>Available Quantity</th>
    <th>Book Image</th>
    </tr>
<?php
if($count>0){
while($data=$result->fetch_assoc()){

    echo "<tr>";
    echo "<td>".$data['book_name']."</td>";
    echo "<td>".$data['author_name']."</td>";
    echo "<td>".$data['available_qty']."</td>";
    echo "<td><img  width='80px' height='100px' src='".$data["book_image"]."'></td>";

}


}

else{
    echo "data not found";
}

?>
</table>