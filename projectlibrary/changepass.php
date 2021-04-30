
<?php

include_once('pro.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$adminname = "";
if ($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$adminname = test_input($_POST["adminname"]);
	$password = test_input($_POST["password"]);
	$newpassword = test_input($_POST["newpassword"]);
	$stmt = $conn->prepare("SELECT * FROM  stud_login");
	$stmt->execute();
	$users = $stmt->fetchAll();
	$check = false;
	$id="";
	foreach($users as $user) {
		
		if(($user['stud_id'] == $adminname) && 
			($user['password'] == $password)) {
                $check = true;
				$id = $adminname;
				$sql = $conn->prepare("UPDATE `stud_login` SET `password`='$newpassword' WHERE    stud_id='$adminname';");
				$sql->execute();
				header("Location: stud_page.php?id=".$id);
		}
		
	}
	if($check!=true){
		echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			die();
		}
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<title>Login Page</title>
</head>
<style>
	body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	background: url() no-repeat;
	background-size: cover;
}
#form::before{
    content: "";
    position: absolute;
    background: url("bookbg2.jpg") no-repeat center center/cover;
    top: 0px;
    opacity: 0.70;
    z-index: -1;
    height: 100%;
    width: 100%;
    
}
.login-box {
	width: 280px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	color: #520505;
}

.login-box h1 {
	float: left;
	font-size: 40px;
	border-bottom: 4px solid #520505;
	margin-bottom: 50px;
	padding: 13px;
	/* text-shadow: 2px 2px whitesmoke; */
	/* -webkit-text-stroke-width: 0.5px;
        -webkit-text-stroke-color: white; */
}

.textbox {
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 1px solid #520505;
}

.fa {
	width: px;
	float: left;
	text-align: center;
}

.textbox input {
	border: none;
	outline: none;
	background: none;
	font-size: 18px;
	float: left;
	margin: 0 10px;
}

.button {
	width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none #520505;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
}

</style>
<body>
    <form action="changepass.php" method="post" id="form">
		<div class="login-box">
			<h1>Edit</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Adminname"
						name="adminname" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="New password"
						name="newpassword" value="">
			</div>

			<!-- <div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Confirm password"
						name="confirmpassword" value="">
			</div> -->

			<input class="button" type="submit"
					name="login" value="Change Password">
		</div>
	</form>
</body>

</html>

