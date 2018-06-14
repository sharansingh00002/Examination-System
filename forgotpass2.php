<?php
session_start();
$usn = $_SESSION['forgotpasswordusn'];
$_SESSION['username']='';
if (isset($_POST['answer'])) {
  

$cn = mysqli_connect('localhost','root','');
if (!$cn) {
  echo 'Unable to connect to server';
}
if (!mysqli_select_db($cn, 'exam')) {
  echo 'Database not selected';
}


$answer = $_POST['answer'];


//$sql = "INSERT INTO studentdetails VALUES ('$username', '$usn', '$email' , '$pass' , '$phone')";
$sql = "SELECT * from lostcredentials where usn = '$usn' and answer = '$answer'";

$result = mysqli_query($cn, $sql) or
  die(mysqli_error($cn));
  if(mysqli_num_rows($result) > 0)
  {
    

     
    while($row = mysqli_fetch_assoc($result)) {
        

        $_SESSION['forgotpassword']=$row['pass'];
        header("Location: forgotpassans.php");
        
    }

  }
  else
  {
    
 header("location: invalidwrongdetails.php");
    
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Forgot Password</title>
  <link rel="stylesheet" href="style.css" >
</head>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>



body {margin: 0;}

ul.topnav {
  opacity: 0.7;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 90px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}
body{
  background-color: #A09B8B
}

    #outer
    {
      background-repeat: no-repeat;
      background-size: cover;
      height: 595px;
      
      margin: 0px auto;
      border:1px solid;
      background-image: url("firstpageim.jpg");
    }

    #form
    {
      height: 450px;
      width: 400px;
      opacity: 0.9;
      box-shadow: 0 15px 40px rgba(0,0,0,.5);
      margin-left: 500px;
      margin-top: 80px;
    }
    .a
    {
      box-shadow: 0 15px 40px rgba(0,0,0,.5);
      height: 40px;
      width: 300px;
      margin-top: 25px;
      margin-left: 45px;
      border-radius: 10px;
    }
</style>
<body>
<ul class="topnav">
  <li><a href="Exam.php">Home</a></li>
  <li><a  href="result.php">           Result           </a></li>
  <li><a href="signup.php">Register   </a></li>
  <li><a class="active" href="login.php">            Login            </a></li>
  <li class="right"><a href="about.php">About</a></li>
</ul>


<div id="outer">
  <div class="title"><h2>Forgot Password</h2></div>
  <div id="form">
    <form method="POST" action="forgotpass2.php">
      
      <?php

      $cn = mysqli_connect('localhost','root','');
if (!$cn) {
  echo 'Unable to connect to server';
}
if (!mysqli_select_db($cn, 'exam')) {
  echo 'Database not selected';
}
        
        $sql1 = "SELECT * from lostcredentials where usn = '$usn'";

        $result1 = mysqli_query($cn, $sql1) or
  die(mysqli_error($cn));

      while($row = mysqli_fetch_assoc($result1)) {

        echo "<h3>"."<br>"." QUESTION :- " . $row["question"]."</h3>"."<br>";
           
    }

        ?>
      <input class="a" type="text" name="answer" placeholder=" Enter answer"/>
      <input class="a" type="submit" value=" Check " />
      
     </form>
  </div>
</div>


</form>
</div>

</body>
</html>