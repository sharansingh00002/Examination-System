<?php
session_start();

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged Out</title>
<link rel="stylesheet" href="examinationstyle.css" >
</head>
<style>
	
	.button {
    background-color: #1B711E; /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 150px 90px;
    cursor: pointer;

}

.button1{
    
    border-radius: 8px;
}
</style>
<body>
	<div class="title"><h1>WRONG DETAILS!</h1></div>
	
	<a href="signup.php"><div class="title"><h1><button class="button button1"> SIGNUP</button></h1></div></a>
</body>
</html>