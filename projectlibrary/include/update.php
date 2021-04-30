<?php
   if(isset($_POST['Ustud_btn'])){
       
    include_once('connection.php');

    $u_stud_id = $_POST['u_stud_id'];
    $u_stud_name = $_POST['u_stud_name'];
    $u_stud_email = $_POST['u_stud_email'];

    // $sql = "INSERT INTO student_details (stud_id, stud_name, stud_email) VALUES ('$stud_id','$stud_name','$stud_email')";
    $sql = "UPDATE `student_details` SET `stud_name`='$u_stud_name' ,`stud_email`='$u_stud_email' WHERE stud_id = '$u_stud_id';";
      // $sql = "UPDATE `student_details` SET `stud_name`='$u_stud_id' WHERE `stud_id`='$u_stud_id';";
      // ,`stud_email`='$u_stud_email'
      // $stmt = $conn->prepare("UPDATE `student_details` SET `stud_name`=' $u_stud_name' WHERE `stud_id`='$u_stud_id'");
    	// $stmt->execute();
      // header("Location: ../student.php?UPADATED");
     $result= mysqli_query($conn, $sql);
     if($result==true){
       header("Location: ../student.php?UPADATED");
      }
      else{
        echo "<script language='javascript'>";
        echo "alert('Id does not exists')";
        echo "</script>";
        die();
     }
   }