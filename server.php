<?php 
	// include database connection file
	include('db.php');

	// retrieve posts from database
	$result = mysqli_query($db, "SELECT * FROM posts");
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if (isset($_POST['uploading_file'])) {
		// Get image name
	  	$image = $_FILES['post_image']['name'];

	  	// image file directory
	  	$target = "images/" . basename($image);

	  	if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target)) {
	  		echo "http://localhost/CWA/ckeditor-images/" . $target;
	  		exit();
	  	}else{
	  		echo "Failed to upload image";
	  		exit();
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