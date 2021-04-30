<?php

if(isset($_POST['stud_sch-btn'])){
  include_once('connection.php');
   
   $stud_id = $_POST['text'];
   $sql = "SELECT * FROM `student_details` WHERE stud_id = '$stud_id'";
   $results= mysqli_query($conn, $sql);
   $num = mysqli_num_rows($results);
   $id= $stud_id;
    // echo $stud_id;
    if($num!=0){
        header("Location: ../stud_search.php?id=".$id);
    }
    else{
        echo "<script language='javascript'>";
		echo "alert('WRONG INFORMATION')";
		echo "</script>";
		die();
    }
}
?>