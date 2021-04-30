<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Design.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>
    <title>mainpage</title>
</head>

<body>
<script>
       function displaytime(){
           time = new Date();
           console.log(time);
           document.getElementById('time').innerHTML = time;
       }
       setInterval(displaytime, 1000);
   </script>
    <nav id="navbar">
        <div id="logo">
            <img src="logo.png" alt="">
        </div>
        <ul>
            <li class="navbaritem"><a href="#home">Home</a></li>
            <li class="navbaritem"><a href="#query">Query</a></li>
            <li class="navbaritem"><a href="#partners">Partners</a></li>
        </ul>
        <div class="search-box">
            <form action="include\searchbar.php" id="searchbar" method="post">
                <input type="text" id="search-text" name="search-text" placeholder="Type to search">
                <button id="search-btn" name="submit-btn"><i class="fas fa-search" aria-hidden="true"></i></button>
               
            </form>
        </div>
        <hr>
    </nav>

    <section id="home">
        <div class="citems"><img src="logo.png" alt=""></div>
        <h1>LIBRARY MANAGEMENT</h1>
           <p id = "time"> </p>

    </section>
    <section id="query">
        <h1>Select Operations</h1>
        <hr>
       
        <a class="queryitems" href="bookdetails.php">Edit Book details</a>
        <a class="queryitems" href="student.php">Edit Students Details</a>
        <a class="queryitems" href="issue.php">Issue/Return Book</a>


    </section>
    <section id="partners">
        <h1>Partners</h1>
        <div id="slider">
            <figure>
                <img src="p1.png" id="p1">
                <img src="p2.png" id="p2">
                <img src="p3.png" id="p3">
                <img src="p4.png" id="p4">
                <img src="p5.png" id="p5">
                <img src="p6.png" id="p6">
                <!-- <img src="p1.png" id="p1"> -->
            </figure>
        </div>
    </section>
    <footer>
        <div>
            Copyrigth &copy; All rights reserved
        </div>
    </footer>
</body>

</html>