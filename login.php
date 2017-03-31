<?php
session_start();
if (isset($_POST['loginSubmit'])) {
	$_SESSION['id'] = 4;
	header("Location: index.php");
}