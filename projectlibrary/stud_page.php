<?php
$stud_id = $_GET['id'];
// $stud_id = '2K19/CO/020';
include_once('include/connection.php');

$sql = "SELECT * FROM `student_details` WHERE stud_id = '$stud_id'";
mysqli_query($conn, $sql);

$name = "";
$email = "";

$results = mysqli_query($conn,$sql);
   
    foreach($results as $result) {
      $name= $result['stud_name'];
      $email= $result['stud_email'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>
    <link rel="stylesheet" href="stud.css">
    <title>student page</title>
</head>
<body>
<nav id="navbar">
        <div id="logo">
            <img src="logo.png" alt="">
        </div>
        <?php
           echo "<div id ='intro'>Welcome, ".$name."(".$stud_id.")</div>";
        ?>
        <div class="search-box">
            <form action="include\searchbar.php" id="searchbar" method="post">
                <input type="text" id="search-text" name="search-text" placeholder="Type to search">
                <button id="search-btn" name="submit-btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                <!-- <a href="" id="search-btn" type="submit" name="submit-btn"><i class="fas fa-search" aria-hidden="true"></i></a> -->
                <!--  -->
            </form>
        </div>
        <hr>
    </nav>
    <section id="stud_details">
    <div id = "box">  
        <?php
          echo "<div class ='details'><p class = 'title'>Name</p>     : ".$name."</div>";
          echo "<div class ='details'><p class = 'title'>Roll no. </p>: ".$stud_id."</div>";
          echo "<div class ='details'><p class = 'title'>Email</p> : ".$email."</div>";
       ?>
       <div id = "edit">
          
           <?php
           echo "<a class ='btn' href='editdetails.php?id=".$stud_id."'>Edit details</a>";
        //    echo "<a class ='btn' href='changepass.php?stud_id=".$stud_id."'>Change password</a>";
           ?>
         
           <a href="changepass.php" class = "btn">Change password</a>
        </div>
    </div>
    </section>
    <section id= "book">
        <?php

        $stmt = "SELECT * FROM `issue` WHERE `stud_id` = '$stud_id' AND `-status`='issued';";
        $results = mysqli_query($conn,$stmt);
        $num = mysqli_num_rows($results);
        $a = array();
        $i= 0 ;
        if($num>0){
       
        foreach($results as $result) {
               $a[$i] = $result['book_id'];
               $i+=1;
            }
         }

         if($num>0){
             echo "<div class ='details'><p class = 'title'>Books issued: </p></div>";
             for ($i=0; $i < $num; $i++) { 
               $sql = "SELECT * FROM `book_details` WHERE book_id = '$a[$i]';";
               $results = mysqli_query($conn, $sql);
               $r = mysqli_num_rows($results);
               
               $stmt2 = "SELECT `date` FROM `issue` WHERE stud_id = '$stud_id' AND book_id = '$a[$i]';";
               $rlt = mysqli_query($conn,$stmt2);
               $rlt2="";
               foreach($rlt as $t) {
                $rlt2=$t['date'];
             }
             $currdate = date('Y-m-d h:m:s',time());
             $date= strftime("%Y-%m-%d", strtotime("$rlt2 +30 day"));
             if(strtotime($currdate)>strtotime($date)){
                $date = "Expired";
             }
        

               if($r>0){
                foreach ($results as $result) {
                  echo "<div class = 'box2'>
                   <h3>".$result['book_title']."</h3>
                   <p>Book id : ".$result['book_id']."</p>
                   <p>Auther : ".$result['auther']."</p>
                   <p>Valid upto : ".$date."</p>
                   <hr>
                </div>";
            }
        }    
        
        }
        }
        else{ 
            echo "<div class ='details'><p class = 'title'>Books issued: No books </p></div>"; }
        ?>
    </section>
    <section id = "fine">
        <?php
         $sql2 = "SELECT * FROM `issue` WHERE stud_id ='$stud_id'";  
         $results = mysqli_query($conn,$sql2);
         $num = mysqli_num_rows($results);
         $i= 0 ; $fine = 0;
         $date = date('Y-m-d h:m:s',time());
        //  echo "<div class ='details'><p class = 'title'>: </p></div>";
         if($num>0){
          
           foreach ($results as $result) {
            if($result['-status']=='issued'){
               $time = (int)strtotime($date) - (int)strtotime($result['date']);
               $days = $time/(86400);
               if($days>30){
                   $days = $days - 30;
                   $fine += ($days/7)*5;
               }
            }
           }    
               }
               $fine = ceil($fine);
           if($fine!=0){
               $stmt2 = "SELECT * FROM fine WHERE stud_id = '$stud_id';";
               $result = mysqli_query($conn, $stmt2);
               $num = mysqli_num_rows($result); 
               if($num > 0){
               $sql3 = "UPDATE `fine` SET `fine`='$fine' WHERE stud_id = '$stud_id';";
               mysqli_query($conn, $sql3);}
               else{
                $sql3 = "INSERT INTO `fine`(`stud_id`, `fine`) VALUES ('$stud_id','$fine');";
                mysqli_query($conn, $sql3);}
           }
           if($fine==0){
            $stmt3 = "SELECT * FROM fine WHERE stud_id = '$stud_id';";
            $result1 = mysqli_query($conn, $stmt3);
            $num2 = mysqli_num_rows($result1); 
            if($num2!=0){
                foreach ($result1 as $r){
                    $fine=$r['fine'];
                }
           }
           }
           echo "<div class ='details'>Fine: &#8377;".$fine."</div>";

        ?>
    </section>
</body>
</html>