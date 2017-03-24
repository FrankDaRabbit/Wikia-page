<?php
function setComments($conn) {
	if (isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";

		$result = $conn->query($sql);
		header("Location: index.php"); 
		exit();
	}
}
function getComments($conn){
	$sql = "SELECT * FROM comments";
	$result = $conn->query($sql);
	while ( $row = $result->fetch_assoc()) {

		$id = $row['uid'];
		$sql2 = "SELECT * FROM user WHERE id='$id'";
		$result2 = $conn->query($sql2);
		if ($row2 = $result2->fetch_assoc()) {
					echo "<div class='comment-box'><p>";
					echo $row2['uid']."<br>";
					echo $row['date']."<br><br>";
					echo $row['message']."<br>";
					echo "</p>";
					if (isset($_SESSION['id'])) {
						if ($_SESSION['id'] == $row2['id']) {
							echo "	<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
							<input type='hidden' name='cid' value='".$row['cid']."'>
							<button type='submit' name='commentDelete'>DELETE</button>

							</form>




							<form class='edit-form' method='POST' action='editcoments.php'>
							<input type='hidden' name='cid' value='".$row['cid']."'>
							<input type='hidden' name='uid' value='".$row['uid']."'>
							<input type='hidden' name='date' value='".$row['date']."'>
							<input type='hidden' name='message' value='".$row['message']."'>
							
								<button>EDIT</button>

							</form>";
						}
						else {
							echo "	<form class='edit-form' method='POST' action='".deleteComments($conn)."'>
							<input type='hidden' name='cid' value='".$row['cid']."'>
							<button type='submit' name='commentDelete'>reply</button>

							</form>";
							
						}
					}else {
						echo "<p class='commentmessage'>You need to be logged in in order to post comments!</p>";
					}

						


				echo "</div>";
		}


		
	}



}

function editComments($conn) {
	if (isset($_POST['commentSubmit'])) {
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";

		$result = $conn->query($sql);
		header("Location: index.php"); 
		exit();
	}
}

function deleteComments($conn) {
	if (isset($_POST['commentDelete'])) {
		$cid = $_POST['cid'];
		

		$sql = "DELETE FROM comments WHERE cid='$cid'";

		$result = $conn->query($sql);
		header("Location: index.php"); 
		exit();
	}
}
function userLogin($conn) {
	if (isset($_POST['loginSubmit'])) {
	
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
		if ($row = $result->fetch_assoc()) {
			$_SESSION['id'] = $row['id']; 
			header("Location: index.php?loginsuccess");
			exit();
		}
	}else {
		header("Location: index.php?loginfailed");
			exit();
		}

	}
	

}



function userLogout() {
	if (isset($_POST['logoutSubmit'])) {
		session_start();
		session_destroy();
		header("Location: index.php");
		exit();
	}

}