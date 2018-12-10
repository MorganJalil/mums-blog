<?php
session_start();
//include '../includes/upload.php';
$_SESSION["user_id"] = 1;
include '../includes/database_connection.php';
$imageErr = "";
$image_id = "";

$statement = $pdo->prepare("SELECT * FROM images");	
$statement->execute();
$images = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM product_category");	
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['image'])){
	$statement = $pdo->prepare("SELECT id FROM images WHERE image = :image");	
	$statement->execute([
	":image"     => $_POST["image"],
	]);
	$image_id = $statement->fetchAll(PDO::FETCH_ASSOC);

	$image_id = $image_id[0]['id'];
} else {
	$image_id = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Write new post</title>
	<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
<div class="container-fluid">
	<main class="post_wrap">
		<div class="row justify-content-around">
			<!-- Modal -->
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Choose and image</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="container-fluid">
							<!-- CHOOSE IMAGE FORM -->
							<form action="<?=$_SERVER["PHP_SELF"];?>" method="post" id="choose_image">
							</form>	
								<div class="row justify-content-left">		
									<?php if(count($images) > 0){
										for($i=0;$i<count($images);$i++){ ?>										
											<label class="col-md-3 mr-auto">
												<input type="radio" class="choose_image" name="image" value="<?=$images[$i]["image"]?>" form="choose_image">
												<div class="image_container">
													<img src="../<?=$images[$i]["image"]?>">
												</div>
											</label>									
										<?php }
									}else{ ?>
										<div class="col-md-3 mr-auto"><p>No images uploaded</p></div>
									<?php } ?>		
								</div>	
							</div>

							<form action="upload_image.php" enctype="multipart/form-data" id="upload_image" method="post">
								<div class="preview"></div>
								<label for="image">Select image to upload (max 500kB):</label><br>
								<input type="file" name="image" id="image" class="form-control" style="width:30%" />
								<span class="error"><?=$imageErr;?></span><br>

								<button class="btn btn-primary submit-upload-image">Save</button>
							</form>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" form="choose_image">Choose image</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class ="blog-image-frame">
				<?php if(isset($_POST["image"])){?>
					<img src="../<?=$_POST["image"];?>">
				<?php } ?>
				</div>
			</div>
			<!-- Create the editor container -->
			<div class="col-12">
				<!-- Create toolbar container -->
				<div id="toolbar">
					<!-- But you can also add your own -->
					
					<form action="upload_image.php" method="post" enctype="multipart/form-data" id="upload_image">
						Select image to upload (max 500kB):
						<input type="file" name="image" id="image"><br>
						<button type="submit" class="btn btn-primary submit-upload-image" form="upload_image">Upload image</button>	 
					</form>

					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
					Choose an image
					</button>
					<span class="error"><?=$imageErr;?></span><br>   
				</div>
				<form action="upload_post.php" method="post" id="post">
					<input type="hidden" name="image_id" id="image_id" value="<?=$image_id; ?>">
					<input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION["user_id"];?>">

					<input class="post_title" aria-label="Title" id="tile" name="title" type="text" placeholder="Title" form="post">
					<?php foreach($categories as $single_category){ ?>
						&ensp;
						<label for="<?=$single_category['category']?>"><?=ucfirst($single_category['category'])?></label>
						<input type="radio" id="<?=$single_category['category']?>" name="category_id" value="<?=$single_category['category_id']?>" form="post">	
					<?php } ?>

					<div class="col-12" id="editor" contenteditable="true" name="textBox" aria-label="description">
					</div>
					<input id="hiddeninput" name="description" type="hidden">

					<button type="submit" id="save" value="1" name="published" class="btn btn-primary post" form="post">Post</button>
				</form>			
			</div>

	<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
			<script>

				$(document).ready(function() { 
				$(".submit-upload-image").click(function(){
					$("#upload_image").ajaxForm({target: '.preview'}).submit();
				});
			}); 

			//Initialize Quill editor 
			var quill = new Quill('#editor', {
				modules: {
					toolbar: [
					['bold', 'italic', 'underline', 'strike'],  
					['link', 'blockquote'],
					[{ list: 'ordered' }, { list: 'bullet' }]
					]
				},
				placeholder: 'Write product description...',
				theme: 'snow'
			});
			
			//Insert Quill content into hidden input
			$(function(){
				$('#save').click(function () {
					var mysave = $('.ql-editor').html();
					$('#hiddeninput').val(mysave);			
				});
			});

		

			</script>
		</div>
	</main>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>