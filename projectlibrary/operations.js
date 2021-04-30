function changeaction(type) {
    let act;
    let active = false;
    switch (type) {
        case "bookdetails":
            active = true;
            action = document.querySelector(".actionarea");
            action.innerHTML = '<h1>Add Book Details</h1><hr class="line"><form action="include/insert_book.php" method="post" class="form"><input type="text" name="book_id" placeholder="Type book_id"><input type="text" name="book_title" placeholder="Type book title"><input type="text" name="auther" placeholder="Type auther name"><input type="text" name="copies" placeholder="no. of copies"><button name="adddetails_btn" class="btn">Add Details</button></form>';
            document.getElementById("bookdetails").style.backgroundColor = "rgb(5, 5, 116)";
            document.getElementById("delete").style.backgroundColor = "rgb(4, 4, 61)";
            break;
        case "delete": 
            action = document.querySelector(".actionarea");
            action.innerHTML='<h1>Add Book Details</h1><hr class="line"><form action="include/insert_book.php" method="post" class="form"><input type="text" name="delete_id" placeholder="Type book_id"><button name="deletebook_btn" class="btn">Delete</button></form>';
            document.getElementById("delete").style.backgroundColor = "rgb(5, 5, 116)";   
            document.getElementById("bookdetails").style.backgroundColor = "rgb(4, 4, 61)";
            break; 
    }
}

