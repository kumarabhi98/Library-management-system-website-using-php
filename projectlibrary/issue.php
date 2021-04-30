<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parctice.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>
    <title>Issue/Return</title>
</head>

<body>
    <nav>
        <div id="logo">
            <img src="logo.png" alt="">
        </div>
        <h1>Issue/Return book</h2>
            <div class="search-box">
                <form action="include\stud_sch.php" id="searchbar" method="post">
                    <input type="text" id="search-text" name="text" placeholder="Type to search">
                    <button id="search-btn" name="stud_sch-btn"><i class="fas fa-search"
                            aria-hidden="true"></i></button>
                </form>
            </div>
    </nav>
    <section class="display">
        <div class="menu">
            <h1>Operations</h1>
            <ul>
                <li class="navbaritem" id="Issue" onclick="changeaction('Issue')"><a href="#">Issue Book</a></li>
                <li class="navbaritem" id="Return" onclick="changeaction('Return')"><a href="#">Return Book </a>
                </li>
                <li class="navbaritem" id="Clear" onclick="changeaction('Clear')"><a href="#">Clear fine </a></li>
            </ul>
            <a href="mainpage.php"><i class="fas fa-home"></i></a>
        </div>
        <div class="actionarea">
            <!-- <div id="logomsg">
                <img src="logo.png" alt="">
            </div> -->
            <h1 id="msg">Select the query you want to perfrom</h1>
        </div>
    </section>
    <script src="operations3.js"></script>

</body>

</html>