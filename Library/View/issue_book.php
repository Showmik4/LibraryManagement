<?php
include 'home.php';




include '../Model/conn.php';
$query = "Select * from users where id='$_SESSION[id]'";

$result = $conn->query($query);
if($result->num_rows> 0){
  $users= mysqli_fetch_all($result, MYSQLI_ASSOC);
}




?>

<?php


include '../Model/conn.php';


$query = "Select * from library_books ";

$result = $conn->query($query);
if($result->num_rows> 0){
  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<?php
//include '../Controller/BookIssueController.php'

include '../Model/conn.php';
if(isset($_POST["issue_book"])){

        $faculty_id = $_POST['faculty_id']; 
        $book_id = $_POST['book_id']; 
        $issue_date= $_POST['issue_date']; 


       $result= mysqli_query($conn,"INSERT INTO `issue_book`(`faculty_id`,`book_id`,`issue_date`) VALUES('$faculty_id',' $book_id','  $issue_date')");

      
       if($result){

       mysqli_query($conn,"UPDATE `library_books` SET `available_qty`=`available_qty`-1 WHERE `id`=$book_id" );
       ?>
      <script type="text/javascript">

        alert("Book Issued Successfully")
      </script>

     <?php
       }

       else{

        ?>
        <script type="text/javascript">
  
          alert("Book Issued Failed")
        </script>
  
       <?php
       }
}

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

        <h1 align="center">Issue Book</h1>
        <hr>
        <br>

        <div id="error"> </div>
        <form id="form" onsubmit="return validation()" action="" method="post" enctype="multipart/form-data">
           <!-- <h5><?php echo $err_db; ?></h5>-->
            <table align="center">


                <tr>
                    <td>Select Faculty ID</td>
                    <td>

                    <?php 
                            foreach ($users as $option) {
                                 ?>
                    <input type="text" name="faculty_id" value="<?php echo  $option['id']?>" readonly>
                       <?php 
                             }

                          ?>

                       


                    </td><br>

                <tr>
                    <td>Select Book ID</td>
                    <td>

                        <select name="book_id" id="bookid">
                            <option value="">Select Book ID</option>

       
                            <?php 
                            foreach ($options as $option) {
                                 ?>
                      <option value="<?php echo $option['id']?>"><?php echo  $option['id'].' Name: '.$option['book_name'] ?> </option>
                       <?php 
                             }

                          ?>

                        </select><br>

                        <span id="bookidErr" style="color: red;"></span>
                    </td><br>


                    
                </tr>

                <tr>
                    <td>Issue Date</td>
                    <td>: <input  type="text" name="issue_date" value="<?= date('d-m-Y') ?>" readonly><br>
                        
                    </td>
                </tr>


               
               





               


                <tr>
                    <td></td>
                    <td align="center"><input type="submit" name="issue_book" value="Issue Book"></td>
                </tr>


            </table>


        </form>

    </div>









</body>

</html>

<script src="../JS/issue_book.js"></script>