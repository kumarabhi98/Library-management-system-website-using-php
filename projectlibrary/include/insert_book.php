<?php 

   if(isset($_POST['adddetails_btn'])){
       
    include_once('connection.php');

    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $auther = $_POST['auther'];
    $copies = (int)$_POST['copies'];

    $sql = "INSERT INTO `book_details`(`book_id`, `book_title`, `auther`, `copies`, `_status`) VALUES ('$book_id','$book_title','$auther','$copies','AVL')";

     $result= mysqli_query($conn, $sql);
     
     if($result==true){
       header("Location: ../bookdetails.php?book_added");
     }
     else{
      echo "<script language='javascript'>";
      echo "alert('Book not added')";
      echo "</script>";
      die();
      // header("Location: ../bookdetails.php?not_added");
     }

   }
    
   $check= false;
   if(isset($_POST['deletebook_btn'])){
    
    include_once('connection.php');

    $delete_id = $_POST['delete_id'];

    $stmt = "SELECT book_id FROM `book_details`";
    $results = mysqli_query($conn,$stmt);
   
    
    foreach($results as $result) {
      
      if(($result['book_id'] == $delete_id)) {
        
        $check= true;  
      } 
    }
    if($check==true){
      $sql = "DELETE FROM `book_details` WHERE book_id='$delete_id'";

      mysqli_query($conn, $sql);
  
      header("Location: ../bookdetails.php?deleted");
    }
    else{
      echo "<script language='javascript'>";
        echo "alert('Book not Found')";
        echo "</script>";
        // header("Location: ../bookdetails.php?not_found");
        die();
    }
   
   }