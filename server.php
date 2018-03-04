<?php 
	// include database connection file
	include('db.php');

	// retrieve posts from database
	$result = mysqli_query($db, "SELECT * FROM posts");
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if (isset($_POST['upload-image'])) {
		// Get image name
	  	$image = $_FILES['image']['post_image'];

	  	// image file directory
	  	$target = "images/".basename($image);

	  	// $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
	  	// // execute query
	  	// mysqli_query($db, $sql);

	  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	  		$msg = "Image uploaded successfully";
	  	}else{
	  		$msg = "Failed to upload image";
	  	}
	}

	// insert post into database
	if (isset($_POST['save-post'])) {
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$body = htmlentities(mysqli_real_escape_string($db, $_POST['body']));

		$sql = "INSERT INTO posts (title, body) VALUES ('$title', '$body')";
		mysqli_query($db, $sql);
	}

?>