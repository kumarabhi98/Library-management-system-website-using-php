<?php 

   if(isset($_POST['adddstud_btn'])){
       
    include_once('connection.php');

    $stud_id = $_POST['stud_id'];
    $stud_name = $_POST['stud_name'];
    $stud_email = $_POST['stud_email'];

    $sql = "INSERT INTO student_details (stud_id, stud_name, stud_email) VALUES ('$stud_id','$stud_name','$stud_email')";

     $s = mysqli_query($conn, $sql);
     if($s==true){
      $con = "";

      try {
        $servername = "localhost:3306";
        $dbname = "loginpage";
        $username = "root";
        $password = "";
      
        $con = new PDO(
          "mysql:host=$servername; dbname=loginpage",
          $username, $password
        );
        
      $con->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

      $stmt = $con->prepare("INSERT INTO stud_login VALUES('$stud_id','admin')");
    	$stmt->execute();

     }

     header("Location: ../student.php?Details_added");
   }
    // delete
   $check= false;
   if(isset($_POST['deletestud_btn'])){
    
    include_once('connection.php');

    $delete_stud_id = $_POST['delete_stud_id'];

    $stmt = "SELECT stud_id FROM `student_details`";
    $results = mysqli_query($conn,$stmt);
   
    
    foreach($results as $result) {
      
      if(($result['stud_id'] == $delete_stud_id)) {
        
        $check= true;  
      } 
    }
    if($check==true){
      $sql = "DELETE FROM `student_details` WHERE stud_id='$delete_stud_id'";
      $t= mysqli_query($conn, $sql);
      if($t==true){
      $con = "";
      try {
        $servername = "localhost:3306";
        $dbname = "loginpage";
        $username = "root";
        $password = "";
      
        $con = new PDO(
          "mysql:host=$servername; dbname=loginpage",
          $username, $password
        );
        
      $con->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

      $stmt = $con->prepare("DELETE FROM stud_login WHERE stud_id='$delete_stud_id'");
    	$stmt->execute();
     
    }
      header("Location: ../student.php?deleted");
     }
    }
    elseif($check==false){
      echo "<script language='javascript'>";
      echo "alert('Id does not exists')";
      echo "</script>";
      die();
   } 
  


   if(isset($_POST['Ustud_btn'])){
       
    include_once('connection.php');

    $u_stud_id = $_POST['u_stud_id'];
    $u_stud_name = $_POST['u_stud_name'];
    $u_stud_email = $_POST['u_stud_email'];

    // $sql = "INSERT INTO student_details (stud_id, stud_name, stud_email) VALUES ('$stud_id','$stud_name','$stud_email')";
    $sql5 = "UPDATE `student_details` SET `stud_name`='$u_stud_name' ,`stud_email`='$u_stud_email' WHERE stud_id = '$u_stud_id';";
      // $sql = "UPDATE `student_details` SET `stud_name`='$u_stud_id' WHERE `stud_id`='$u_stud_id';";
      // ,`stud_email`='$u_stud_email'
      // $stmt = $conn->prepare("UPDATE `student_details` SET `stud_name`=' $u_stud_name' WHERE `stud_id`='$u_stud_id'");
    	// $stmt->execute();
      // header("Location: ../student.php?UPADATED");
     $result= mysqli_query($conn, $sql5);
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
  