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

			<!-- Display a list of posts from database -->
			<?php foreach ($posts as $post): ?>
				<div class="post">
					<h3>
						<a href="details.php?id=<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a>
					</h3>
					<p>
						<?php echo html_entity_decode(preg_replace('/\s+?(\S+)?$/', '', substr($post["body"], 0, 200))); ?>
						
					</p>
				</div>				
			<?php endforeach ?>




			<form action="index.php" method="post" enctype="multipart/form-data" class="post-form">
				
				<h1 class="text-center">Add Blog Post</h1>

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" >
				</div>

				<div class="form-group" style="position: relative;">
					<label for="post">Body</label>
					
					<!-- Upload image button -->
					<a href="#" class="btn btn-xs btn-default pull-right upload-img-btn" data-toggle="modal" data-target="#myModal">upload image</a>


					<!-- Input to browse your machine and select image to upload -->
					<input type="file" id="image-input" style="display: none;">

					<textarea name="body" id="body" class="form-control" cols="30" rows="5"></textarea>

					</div>
					<div class="form-group">
						<button type="submit" name="save-post" class="btn btn-success pull-right">Save Post</button>
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
					<!-- returned image url will be displayed here -->
					<input 
						type="text" 
						id="post_image_url" 
						onclick="return copyUrl()" 
						class="form-control"
						>
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
	// initialize ckeditor
	CKEDITOR.replace('body');

	// Javascript function to copy image url to clipboard from modal
	function copyUrl() {
	  var copyText = document.getElementById("post_image_url");
	  copyText.select();
	  document.execCommand("Copy");

	  // replace url with confirm message 
	  $('#post_image_url').replaceWith('<p style="color: green"><b>Image url copied to clipboard</b></p>');

	  // hide modal after 2 seconds
	  setTimeout(function(){
		  $('#myModal').modal('hide');
	  }, 2000);
	}

	$(document).ready(function(){
		// When user clicks the 'upload image' button
		$('.upload-img-btn').on('click', function(){
			
			// Add click event on the image upload input
			// field when button is clicked
			$('#image-input').click();


			$(document).on('change', '#image-input', function(e){

				// Get the selected image and all its properties
				var image_file = document.getElementById('image-input').files[0];

				// Initialize the image name
				var image_name = image_file.name;

				
				// determine the image extension and validate image
				var image_extension = image_name.split('.').pop().toLowerCase();
				if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('That image type is not supported');
					return;
				} 

				// Get the image size. Validate size
				var image_size = image_file.size;
				if (image_size > 3000000) {
					alert('The image size is too big');
					return;
				} 


				// Compile form values from the form to send to the server
				// In this case, we are taking the image file which 
				// has key 'post_image' and value 'image_file'
				var form_data = new FormData();
				form_data.append('post_image', image_file);
				form_data.append('uploading_file', 1);

				// upload image to the server in an ajax call (without reloading the page)
				$.ajax({
					url: 'index.php',
					method: 'POST',
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend : function(){

					},
					success : function(data){
						// how the pop up modal
						$('#myModal').modal('show');

						// the server returns a URL of the uploaded image
						// show the URL on the popup modal
						$('#post_image_url').val(data);
					}
				});


			});

		});
	});

</script>

</body>
</html>