<?php include('server.php') ?>

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

			<?php foreach ($posts as $post): ?>
				<div class="post">
					<h3>
						<a href="details.php?id=<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a>
					</h3>
					<p><?php echo $post['body'] ?></p>
				</div>				
			<?php endforeach ?>




				<form action="index.php" class="post-form">
					
					<h1 class="text-center">Add Blog Post</h1>

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" >
					</div>

					<div class="form-group" style="position: relative;">
						<label for="post">Body</label>
						
						<!-- Upload image button -->
						<a href="#" class="btn btn-xs btn-default pull-right upload-img-btn" data-toggle="modal" data-target="#myModal">upload image</a>

						<textarea name="body" id="body" class="form-control" cols="30" rows="5"></textarea>
	 				</div>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-success pull-right">Save Post</button>
	 				</div>
				</form>

				<!-- Image uri display Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Click below to copy image url</h4>
				      </div>
				      <div class="modal-body">
				        <p class="lead">http://www.testthis.com/images/first.png</p>
				      </div>
				    </div>
				  </div>
				</div>

				
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