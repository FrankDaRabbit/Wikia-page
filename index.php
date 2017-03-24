<?php
	date_default_timezone_set('Europe/Vienna');
	include 'dbh.inc.php';
	include 'comments.inc.php';
  session_start();


?>

<!doctype html>

<html >
<head>
  <meta charset="utf-8">

  <title>Comment section with login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
</head>

<body>

<?php


echo "<form id='demo' action='".userLogin($conn)."' method='POST'>
  <input type='text' name='uid' placeholder='User name' '>
  <input type='password' name='pwd' placeholder='Password'>
  <button type='submit' name='loginSubmit'>Login</button>

</form>";

echo "<form action='".userLogout()."' method='POST'>
  <button type='submit' name='logoutSubmit'>Logout</button>

</form>";


?>

<iframe width="560" height="315" src="https://www.youtube.com/embed/6ijBkKCudMc" frameborder="0" allowfullscreen></iframe><br><br>

	<?php
  if (isset($_SESSION['id'])) {
  echo "
  <form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:m:s')."'>
    <textarea name='message' ></textarea><br>
    <button class='btn btn-default' type='submit' name='commentSubmit'>Comment</button>


  </form>";
}else{
  echo "You are not logged in. You need to be logged in to comment!";
  echo "<br><br>";

}

	
  getComments($conn);
  ?>
  <br><br>
</body>
</html>