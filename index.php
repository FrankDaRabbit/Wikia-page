<?php
session_start();



?>

<!doctype html>

<html >
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
</head>

<body>
      <form action="login.php" method="POST">
        <input type="text" name="uid" placeholder="Enter your Username"><br>
        <input type="password" name="pwd" placeholder="Enter your password"><br>
        <button type="submit" >LOGIN</button>
      </form>

<?php
if (isset($_SESSION['sid'])) {
  echo "You are logged in as ";
  
  echo $_SESSION['sid'];

} else{
  echo "You are not logged in";
}



?>

<br><br><br>


    <form action="signup.php" method="POST">
      <input type="text" name="first" placeholder="Firstname"><br>
      <input type="text" name="last" placeholder="Lastname"><br>
      <input type="text" name="uid" placeholder="Username"><br>
      <input type="password" name="pwd" placeholder="Password"><br>
      <button type="submit">SIGN UP</button>
      
  
    </form>
    <br><br><br>
 <form action="logout.php">
        
        <button type="submit" >LOG OUT</button>
      </form>

</body>
</html>