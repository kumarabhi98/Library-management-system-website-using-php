<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parctice.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>
    <title>Edit Book details</title>
</head>

<body>
    <nav>
        <div id="logo">
            <img src="logo.png" alt="">
        </div>
        <h1>Edit Book details</h2>
    </nav>
    <section class="display">
        <div class="menu">
            <h1>Operations</h1>
            <ul>
                <li class="navbaritem" id="bookdetails" onclick="changeaction('bookdetails')"><a href="#">Add book details</a></li>
                <li class="navbaritem" id="delete" onclick="changeaction('delete')"><a href="#">Delete book</a></li>
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
    <!-- <aside class="menu">
        <li class="navbaritem"><a href="#home">Home</a></li>
        <li class="navbaritem"><a href="#query">Query</a></li>
        <li class="navbaritem"><a href="#partners">Partners</a></li>
    </aside> -->
    <script src="operations.js"></script>
    <!-- <script>
        function changeaction(type) {
            let act;
            switch (type) {
                case "bookdetails":
                    action = document.querySelector(".actionarea");
                    action.innerHTML = '<h1>Add Book Details</h1><hr class="line"><form action="insert_book.php" method="post" class="form"><input type="text" name="book_id" placeholder="Type book_id"><input type="text" name="book_title" placeholder="Type book title"><input type="text" name="auther" placeholder="Type auther name"><input type="text" name="copies" placeholder="no. of copies"><button name="adddetails_btn" class="btn">Add Details</button></form>';
                    break;
                case "delete":
                    action = document.querySelector(".actionarea");
                    action.innerHTML = '<h1>hi</h1>';
                    break;
            }
        }
    </script> -->
</body>

</html>