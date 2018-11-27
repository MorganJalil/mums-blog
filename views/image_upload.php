<?php
//include '../includes/upload.php';
$imageErr = "";

$statement = $pdo->prepare(
	"SELECT cart.product_id, cart.user_id, cart.name, cart.price, cart.quantity, products.image AS image
	FROM cart
	JOIN products
	ON products.id = cart.product_id
	WHERE user_id = :user_id");
	
	$statement->execute([
	":user_id"     => $_SESSION["id"]
	]);
	
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Document</title>
</head>
<body>
    
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
	Upload image
</button>

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
					
					<div class="row">
						<div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
						<div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
						<div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
						<div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
					</div>
					
				</div>

				<form action="<?=$_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" id="image_upload">
					Select image to upload (max 500kB):
					<input type="file" name="fileToUpload" id="fileToUpload"><br>
					<span class="error"><?=$imageErr;?></span><br>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" form="image_upload">Upload image</button>
			</div>
		</div>
	</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>