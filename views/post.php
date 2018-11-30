<?php
session_start();
//include '../includes/upload.php';
$_SESSION["user_id"] = 1;
include '../includes/database_connection.php';
$imageErr = "";

$statement = $pdo->prepare("SELECT * FROM images");
	
$statement->execute();

$images = $statement->fetchAll(PDO::FETCH_ASSOC);
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Document</title>
</head>
<body>
<div class="container-fluid">
<main class="wrap">
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
							
							<div class="row justify-content-around">
								<?php if(count($images) > 0){
									for($i=0;$i<count($images);$i++){ ?>
										<div class="col-md-3 mr-auto image_container">
											<img src="../<?=$images[$i]["image"]?>">
										</div>
									<?php }
								}else{ ?>
									<div class="col-md-3 mr-auto"><p>No images uploaded</p></div>
								<?php } ?>
							</div>
							
						</div>

						<form action="upload.php" method="post" enctype="multipart/form-data" id="image_upload">
							Select image to upload (max 500kB):
							<input type="file" name="image" id="image">
							<button type="submit" class="btn btn-primary" form="image_upload">Upload image</button><br>
							<span class="error"><?=$imageErr;?></span><br>
							
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" form="#">Choose image</button>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12">
			<h1>bild</h1>
		</div>
    <div id="toolbar">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
    <i class="far fa-image"></i>
			</button><br>
    </div>
<!-- Create the editor container -->
<div class="col-12" id="editor">
<textarea name="comment" rows="5" cols="40" form="post" placeholder="Description">
					<p>Product description</p>
					<p><br></p>
				</textarea>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'list': 'ordered'}, { 'list': 'bullet' }],

  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
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