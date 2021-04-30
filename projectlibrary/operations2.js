function changeaction(type) {
    let act;
    let active = false;
    switch (type) {
        case "Add_details":
            active = true;
            action = document.querySelector(".actionarea");
            action.innerHTML = '<h1>Add Student Details</h1><hr class="line"><form action="include/student_details.php" method="post" class="form"><input type="text" name="stud_id" placeholder="ID: 2K**/**/***"><input type="text" name="stud_name" placeholder="Type Student name"><input type="email" name="stud_email" placeholder="Type Student email"><button name="adddstud_btn" class="btn">Add Details</button></form>';
            document.getElementById("Add_details").style.backgroundColor = "rgb(5, 5, 116)";
            document.getElementById("Delete").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Update").style.backgroundColor = "rgb(4, 4, 61)";
            break;
        case "Update": 
            action = document.querySelector(".actionarea");
            action.innerHTML='<h1>Update Student Details</h1><hr class="line"><form action="include/update.php" method="post" class="form"><input type="text" name="u_stud_id" placeholder="ID: 2K**/**/*** (ID can not update)"><input type="text" name="u_stud_name" placeholder="Type Student name"><input type="email" name="u_stud_email" placeholder="Type Student email"><button name="Ustud_btn" class="btn">UPDATE</button></form>';
            document.getElementById("Update").style.backgroundColor = "rgb(5, 5, 116)";   
            document.getElementById("Add_details").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Delete").style.backgroundColor = "rgb(4, 4, 61)";
            break; 
        case "Delete": 
            action = document.querySelector(".actionarea");
            action.innerHTML='<h1>Remove Student</h1><hr class="line"><form action="include/student_details.php" method="post" class="form"><input type="text" name="delete_stud_id" placeholder="Type student_id"><button name="deletestud_btn" class="btn">Remove</button></form>';
            document.getElementById("Delete").style.backgroundColor = "rgb(5, 5, 116)";   
            document.getElementById("Add_details").style.backgroundColor = "rgb(4, 4, 61)";
            document.getElementById("Update").style.backgroundColor = "rgb(4, 4, 61)";
            break; 
    }
}

