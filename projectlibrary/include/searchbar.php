<style>
body{
    /* background: url('../bg4.jpg') no-repeat center center/cover; */
    background: grey;
}

h1{
    text-align: center;
    margin-top: 15px;
    padding: px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: 500;
    font-size: 2.8rem;
    color: black;
    -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: white;
}
.contain{
    display: flex;
    flex-direction: column;
    align-items: center;
    height: auto;
    padding-bottom:50px; 
    /* justify-content: center; */
}
.box{
    margin: 10px;
    width: 70%;
    color: black;
    font-weight: 600;
    height: 220px;
    background-color: rgb(255,255,255, 0.5);
}
/* .box::before{
    content: "";
    position: absolute;
    width: 70%;
    height: 35.50%;
    background-color: white;
    z-index: -1;
    opacity: 0.60;
} */
.box h3, .box p{
    padding-left: 20px;
}
hr{
    width: 100%;
    height: 3px;
    /* position: absolute; */
    background-color: black;border: none;
    margin: 2px;
    opacity: 0.70;
}
.box1{
    align-items: center;
    background: white;
    padding:10px;
    font-size: 1.2rem;
    opacity:0.8;
    font-weight: 1000;
}

</style>

<h1>Search Results</h1><hr>

<div class="contain">
<?php
  if(isset($_POST['search-text'])){
    include_once('connection.php');

    $srch= $_POST['search-text'];

    $sql = "SELECT * FROM `book_details` WHERE book_title LIKE '%$srch%' OR auther LIKE '%$srch%' OR book_id='$srch'";
    $results = mysqli_query($conn, $sql);
    $r = mysqli_num_rows($results);
    
    if($r>0){
        foreach ($results as $result) {
            echo "<div class = 'box'>
               <h3>".$result['book_title']."</h3>
               <p>Book id : ".$result['book_id']."</p>
               <p>Auther : ".$result['auther']."</p>
               <p>Copies : ".$result['copies']."</p>
               <p>Status : ".$result['_status']."</p><hr>
            </div>";
        }

    }else {
        echo "<div class = 'box1'>
        No book found
     </div>";
    }
  }
  else {
      echo "NOT CONNECTED";
  }
  ?>
  </div>