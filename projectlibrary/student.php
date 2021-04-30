<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parctice.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>
    <title>student</title>
</head>

<body>
    <nav>
        <div id="logo">
            <img src="logo.png" alt="">
        </div>
        <h1>Edit student details</h2>
    </nav>
    <section class="display">
        <div class="menu">
            <h1>Operations</h1>
            <ul>
                <li class="navbaritem" id="Add_details" onclick="changeaction('Add_details')"><a href="#">Add details</a></li>
                <li class="navbaritem" id="Update" onclick="changeaction('Update')"><a href="#">Update details</a></li>
                <li class="navbaritem" id="Delete" onclick="changeaction('Delete')"><a href="#">Delete </a></li>
            </ul>
            <a href="mainpage.php"><i class="fas fa-home" ></i></a>
        </div>
        <div class="actionarea">
            <div id="logomsg">
                <img src="logo.png" alt="">
            </div>
            <h1 id="msg">Select the query you want to perfrom</h1>
        </div>
    </section>
    <script src="operations2.js"></script>
     
</body>

</html>