<?php
session_start();
include_once 'dbh.php';

$sessionid = $_SESSION['id'];

$filename = "uploads/profile".$sessionid."*";
$fileinfo = glob($filename);
$fileExt = explode(".", $fileinfo[0]);
$fileActuallExt = $fileExt[1];

$file = "uploads/profile".$sessionid.".".$fileActuallExt;
if (!unlink($file)) {
	echo "Error deleting file!";
} else{
	echo "File deleted!";
}

$sql = "UPDATE profileimg SET status = 1 WHERE userid='$sessionid';";
mysqli_query($conn, $sql);
header("Location: index.php?deletesuccess");





