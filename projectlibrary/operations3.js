function changeaction(type) {
    let act;
    let active = false;
    switch (type) {
        case "Issue":
            active = true;
            action = document.querySelector(".actionarea");
            action.innerHTML = '<h1>Issue Book</h1><hr class="line"><form action="include\issue_return.php" method="post" class="form"><input type="text" name="stud_issue_id" placeholder="Type student_id"><input type="text" name="book_issue_id" placeholder="Type book_id"><button name="issue_btn" class="btn">Issue Book</button></form>';
            document.getElementById("Issue").style.backgroundColor = "rgb(5, 5, 116)";
            document.getElementById("Clear").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Return").style.backgroundColor = "rgb(4, 4, 61)";
            break;
        case "Return": 
            action = document.querySelector(".actionarea");
            action.innerHTML='<h1>Return Book</h1><hr class="line"><form action="include\issue_return.php" method="post" class="form"><input type="text" name="stud_return_id" placeholder="Type student_id"><input type="text" name="book_return_id" placeholder="Type book_id"><button name="return_btn" class="btn">Return Book</button></form>';
            document.getElementById("Return").style.backgroundColor = "rgb(5, 5, 116)";   
            document.getElementById("Issue").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Clear").style.backgroundColor = "rgb(4, 4, 61)";
            break; 
        case "Clear": 
            action = document.querySelector(".actionarea");
            action.innerHTML='<h1>Clear fine</h1><hr class="line"><form action="include\issue_return.php" method="post" class="form"><input type="text" name="stud_id_fine" placeholder="Type student_id"><button name="fine" class="btn">Clear</button></form>';
            document.getElementById("Clear").style.backgroundColor = "rgb(5, 5, 116)";   
            document.getElementById("Issue").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Return").style.backgroundColor = "rgb(4, 4, 61)";
            break; 
    }
}

