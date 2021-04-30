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
	<title>Login Page</title>
</head>
<style>
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
#form::before{
    content: "";
    position: absolute;
    background: url("stud_bg.jpg") no-repeat center center/cover;
    top: 0px;
    opacity: 0.90;
    z-index: -1;
    height: 100%;
    width: 100%;
    filter: blur(5px);
}
.login-box {
	width: 280px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	background-color: rgba(255, 255, 255, 0.2);
	backdrop-filter: blur(2px);
	color: #520505;
	padding: 27px 60px;
	border-radius: 10px;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.login-box h1 {
	float: left;
	font-size: 40px;
	margin-bottom: 30px;
	color:  #03427e;;
}

.textbox {
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 1px solid #03427e;
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
	margin: 10px 10px;
}

.button {
	width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none #03427e;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
}
img{
	height: 100px;

}
</style>
<body>
    <form action="stud_login.php" method="post" id="form">
		<div class="login-box">
			<div id="logo">
				<img src="logo.png" alt="">
			</div>
			<h1>Login</h1>

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

			<input class="button" type="submit"
					name="login" value="Sign In">
		</div>
	</form>
</body>

</html>

