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
			<div class="col-md-8 col-md-offset-2 post-div">

				<div class="post">
					<h3><a href="details.php">This is the very first post here</a></h3>
					<p>Here goes some sample text that describes the situation here</p>
				</div>				
				<div class="post">
					<h3><a href="details.php">This is the very first post here</a></h3>
					<p>Here goes some sample text that describes the situation here</p>
				</div>	


				<form action="index.php" class="post-form">
					
					<h1 class="text-center">Add Blog Post</h1>

					<div class="form-group">
					<label for="title">Title</label>
						<input type="text" name="title" class="form-control" >
					</div>

					<div class="form-group">
						<label for="post">Body</label>
						<textarea name="body" id="body" class="form-control" cols="30" rows="5"></textarea>
	 				</div>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-success pull-right">Save Post</button>
	 				</div>
				</form>

				
			</div>

		</div>
	</div>




<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- CKEditor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>

<!-- JQuery scripts -->
<script>
CKEDITOR.replace('body');
</script>

</body>
</html>