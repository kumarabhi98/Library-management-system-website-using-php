<?php 
 
 $check= "";
if(isset($_POST['issue_btn'])){
    
 include_once('connection.php');

 $stud_issue_id = $_POST['stud_issue_id'];
 $book_issue_id = $_POST['book_issue_id'];

 $stmt = "SELECT * FROM `book_details` WHERE book_id = '$book_issue_id'";
 $results = mysqli_query($conn,$stmt);

 $stmt2 = "SELECT * FROM `issue` WHERE stud_id = '$stud_issue_id' AND `-status`='issued' ;";
 $r = mysqli_query($conn,$stmt2);
 $num = mysqli_num_rows($r);
 $copies = "";
 
 foreach($results as $result) {
   
   if(($result['_status'] == 'AVL') && ($num < 5) && ((int)$result['copies'] > 0)) {
     $check= true;  
     $copies = (int)$result['copies'];
   } 
 }

 $verify = false;
 $stmt3 = "SELECT * FROM `student_details` WHERE stud_id = '$stud_issue_id';";
 $r2 = mysqli_query($conn,$stmt3);
 foreach($r2 as $st) {  
  if(($st['stud_id'] ==$stud_issue_id )) {
    $verify= true;  
  } 
}

$check2 = true;
$stmt4= "SELECT * FROM `fine` WHERE stud_id = '$stud_issue_id'";
$r3 = mysqli_query($conn,$stmt4);
$n2 = mysqli_num_rows($r3);
if($n2!=0){
  foreach($r3 as $s) {  
    if(($s['fine']!=0)) {
      $check2 = false;  
    } 
  }
}


 if(($check==true)&&($verify == true)&&($check2==true)){
    $copies = $copies - 1;
    if($copies>0){
      $sql  = "UPDATE `book_details` SET `copies` = '$copies' WHERE book_id = '$book_issue_id';";
      mysqli_query($conn, $sql);
      $sql2 = "INSERT INTO `issue` (`stud_id`, `book_id`, `date`, `-status`) VALUES ('$stud_issue_id', '$book_issue_id', current_timestamp(), 'issued');";
      mysqli_query($conn, $sql2);
    }  
    else{
      $sql  = "UPDATE `book_details` SET `copies` = '$copies' WHERE book_id = '$book_issue_id';";
      mysqli_query($conn, $sql);
      $sql1  = "UPDATE `book_details` SET `_status` = 'NAVL' WHERE book_id = '$book_issue_id';";
      mysqli_query($conn, $sql1);
      $sql2 = "INSERT INTO `issue` (`stud_id`, `book_id`, `date`, `-status`) VALUES ('$stud_issue_id', '$book_issue_id', current_timestamp(), 'issued');";
      mysqli_query($conn, $sql2);
    }

    // $sql  = "UPDATE `book_details` SET `_status` = 'NAVL' WHERE book_id = '$book_issue_id';";
    // mysqli_query($conn, $sql);
    // $sql2 = "INSERT INTO `issue` (`stud_id`, `book_id`, `date`, `-status`) VALUES ('$stud_issue_id', '$book_issue_id', current_timestamp(), 'issued');";
    // mysqli_query($conn, $sql2);
    header("Location: ../issue.php?ISSUED");
  }
  elseif($check2 == false){
    echo "<script language='javascript'>";
    echo "alert('Fine not paid')";
    echo "</script>";
    die();
  }
  elseif($num >= 5) {
    echo "<script language='javascript'>";
			echo "alert('EXCEEDED ALLOWED NO. OF BOOK')";
			echo "</script>";
			die();
  }
  elseif($verify == false){
    echo "<script language='javascript'>";
    echo "alert(' stud_id is not registered')";
    echo "</script>";
    die();
  }
  else {
    echo "<script language='javascript'>";
    echo "alert('Book not avialable')";
    echo "</script>";
    die();
  }
}
// return
if(isset($_POST['return_btn'])){
 
 include_once('connection.php');

 $stud_return_id = $_POST['stud_return_id'];
 $book_return_id = $_POST['book_return_id'];

 $stmt = "SELECT * FROM `issue` WHERE stud_id = '$stud_return_id' AND book_id = '$book_return_id';";
 $results = mysqli_query($conn,$stmt);

 
 foreach($results as $result) {
   
   if(($result['stud_id'] ==  $stud_return_id) && ($result['book_id'] ==  $book_return_id)) {
     
     $check= true;  
   } 
 }
 if($check==true){

  $stmt1 = "SELECT * FROM `book_details` WHERE book_id = '$book_return_id'";
  $rt = mysqli_query($conn,$stmt1);
  $n="";
  foreach($rt as $r){
    $n= (int)$r['copies'];
  }

  if($n == 0){
    $n = $n + 1;
    // $sql  = "DELETE FROM `issue` WHERE `book_id` = '$book_return_id' AND `stud_id` = '$stud_return_id';";
    $sql = "UPDATE `issue` SET `-status`= 'returned' WHERE `book_id` = '$book_return_id' AND `stud_id` = '$stud_return_id'";
    mysqli_query($conn, $sql);
    $sql1  = "UPDATE `book_details` SET `_status` = 'AVL' WHERE book_id = '$book_return_id';";
    mysqli_query($conn, $sql1);
    $sql2  = "UPDATE `book_details` SET `copies` = '$n' WHERE book_id = '$book_return_id';";
    mysqli_query($conn, $sql2);
    $sql3 = "INSERT INTO `_return`(`stud_id`, `book_id`, `date`) VALUES ('$stud_return_id','$book_return_id',current_timestamp())";
    mysqli_query($conn, $sql3);
  }
  else {
    $n = $n + 1;
    $sql = "UPDATE `issue` SET `-status`= 'returned' WHERE `book_id` = '$book_return_id' AND `stud_id` = '$stud_return_id'";
    mysqli_query($conn, $sql);
    $sql2  = "UPDATE `book_details` SET `copies` = '$n' WHERE book_id = '$book_return_id';";
    mysqli_query($conn, $sql2);
    $sql3 = "INSERT INTO `_return`(`stud_id`, `book_id`, `date`) VALUES ('$stud_return_id','$book_return_id',current_timestamp())";
    mysqli_query($conn, $sql3);
  }

    header("Location: ../issue.php?RETURNED");
  }
  else {
    echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			die();
  }
}
// fine
if(isset($_POST['fine'])){

  include_once('connection.php');
  
  $stud_id_fine = $_POST['stud_id_fine'];
  // $sql="DELETE FROM `fine` WHERE `stud_id`='$stud_id_fine';";
  $sql="DELETE FROM `fine` WHERE `fine`.`stud_id` = '$stud_id_fine';";
  $results =  mysqli_query($conn, $sql);
  if($results!=0){
    header("Location: ../issue.php?clear");
  }
  else{
    echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			die();
  }

}