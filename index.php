<?php
session_start();

include_once 'dbh.php'; 


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload smth to webpage</title>
</head>
<body>
<?php

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
		$resultImg = mysqli_query($conn, $sqlImg);
		while ($rowImg = mysqli_fetch_assoc($resultImg)) {
			echo "<div>";
			if ($rowImg['status']==0) {
				$filename = "uploads/profile".$id."*";
				$fileinfo = glob($filename);
				$fileExt = explode(".", $fileinfo[0]);
				$fileActuallExt = $fileExt[1];
				echo "<img src='uploads/profile".$id.".".$fileActuallExt."?".mt_rand()."'>";
				
			}else {
				echo "<img src='uploads/profiledefault.jpg'> ";
				
			}
			
			echo "</div>";
		}
	}
	
} else {
	echo "There are no users yet!";

}


if (isset($_SESSION['id'])) {
	if ($_SESSION['id'] == 4) {
		$currentid = $_SESSION['id'];
		echo "<br>you are logged in as user nr ".$currentid;
	}
	echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
	<input type='file' name='file'>
	<button type='submit' name='submit'>Upload</button>
</form>";

echo "<form action='delete.php' method='POST' >
	<input type='file' name='file'>
	<button type='submit' name='delete'>Delete</button>
</form>";

}else {
	echo "<br>You are not logged in";
	echo "<form action='signup.php' method='post'>
	<input type='text' name='first' placeholder='First name'>
	<input type='text' name='last' placeholder='Last name'>
	<input type='text' name='uid' placeholder='Username'>
	<input type='password' name='pwd' placeholder='Password'>
	<button type='submit' name='signupSubmit'>SIgn up</button>
	</form>";
}

?>


<p>Click here to Login</p>
<form method="POST" action="login.php">
<button type="submit" name="loginSubmit">LOGIN</button>
	
</form>


<p>Click here to Logout</p>
<form method="POST" action="logout.php">
<button type="submit" name="logoutSubmit">LOGOUT</button>
	
</form>

</body>
</html>