<?php 
	include('db.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($db, "SELECT * FROM posts WHERE id=$id");

		$post = mysqli_fetch_assoc($result);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uploading images in CKEditor using PHP</title>

	<!-- Bootstra -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- Custom styling -->
	<link rel="stylesheet" href="main.css">

</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="post-details">
					<h2><?php echo $post['title'] ?></h2>
					<p><?php echo $post['body']; ?></p>
				</div>				
			</div>

		</div>
	</div>


<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- JQuery scripts -->
<script>

</script>

</body>
</html>