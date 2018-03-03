<?php 
	// include database connection file
	include('db.php');

	$result = mysqli_query($db, "SELECT * FROM posts");
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>