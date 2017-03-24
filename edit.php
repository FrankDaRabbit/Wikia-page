<?php
	date_default_timezone_set('Europe/Vienna');
	include 'dbh.inc.php';
	include 'comments.inc.php';


?>

<!doctype html>

<html >
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
</head>

<body>
	<?php
  $cid = $_POST['cid'];
  $uid = $_POST['uid'];
  $date = $_POST['date'];
  $message = $_POST['message'];


	echo "
  <form method='POST' action='".editComments($conn)."'>
  	<input type='hidden' name='uid' value='".uid."'>
  	<input type='hidden' name='date' value='".$date."'>
  	<textarea name='message' >".$message."</textarea><br>
  	<button class='btn btn-default' type='submit' name='commentSubmit'>EDIT</button>


  </form>";
  
  ?>
</body>
</html>