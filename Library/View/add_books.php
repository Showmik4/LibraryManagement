<?php
include 'home.php';
include '../Controller/BooksController.php';



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<div class="form">

    <h1 align="center">Add product</h1>
    <hr>
    <br>

    <div id="error"> </div>
    <form id="form" action=""  method="post" enctype="multipart/form-data">
      <h5><?php echo $err_db; ?></h5>
      <table align="center">
        <tr>
          <td>Product name</td>
          <td>: <input id="product_name" type="text" name="book_name"  value="<?php echo $book_name;?>" ><br>
          <span id="productErr" style="color:red;"><?php echo $booknameErr;?></span></td>
        </tr>

		<tr>
          <td> Author Name </td>
          <td>: <input id="c_id" type="text" name="author_name" value="<?php echo $author_name;?>" ><br>
          <span id="catnameErr" style="color:red;"><?php echo $author_nameErr;?></span></td>
        </tr>


        <tr>
          <td> Book Purchase Date </td>
          <td>: <input id="product_price" type="text" name="purchase_date" value="<?php echo $book_purchase_date?>" ><br>
          <span id="priceErr" style="color:red;"><?php echo $purchase_dateErr;?></span></td>
        </tr>


       <tr>

       <tr>
          <td>Book Price </td>
          <td>: <input id="product_price" type="text" name="book_price" value="<?php echo $book_price?>" ><br>
          <span id="priceErr" style="color:red;"><?php echo $priceErr;?></span></td>
        </tr>

        <tr>
          <td>Book Quantity </td>
          <td>: <input id="product_price" type="text" name="book_qty" value="<?php echo $book_qty?>" ><br>
          <span id="priceErr" style="color:red;"><?php echo $book_qtyErr;?></span></td>
        </tr>


        <tr>
          <td>Available Book Quantity </td>
          <td>: <input id="product_price" type="text" name="available_qty" value="<?php echo $available_qty?>" ><br>
          <span id="priceErr" style="color:red;"><?php echo $available_qtyErr;?></span></td>
        </tr>


    
    

      <tr>
        <td>Image</td>
        <td>: <input id="img" type="file" name="book_image" value="<?php echo $book_image;?>" ><br>
        <span  style="color:red;"><?php echo $book_imageErr;?></span></td>
      </tr>


      <tr>
        <td></td>
         <td align="center"><input type="submit" name="add_book" value="Add Product" ></td>
      </tr>


    </table>


    </form>
  
</div>



    





</body>
</html>