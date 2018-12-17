<?php
session_start();

if(empty($_SESSION['user_id'])){
    header("Location: ../index.php?error=please_login");
}
$_SESSION["user_id"] = 1;

include '../includes/database_connection.php';
include '../includes/db_fetches.php';
include 'upload_image.php';
include '../includes/post_validation.php';


$image_id = "";
$openModal = false;

//Open modal on reload
if(isset($_GET['success']) || isset($_GET['error']) ){
	$openModal = true;
}

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

	<!-- Include quill stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <title>Millhouse | Write new post</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<!-- N A V . B A R -->
<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="main_page.php"><img class="d-inline-block navbarLogo" src="../images/Nav-logo.png"
                                          alt="Millhouse logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar_options" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="#">Category<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="contact.php">Contact</a>
            </li>
        </ul>
        <?php if($_SESSION["admin"] == 1){?><a href="create_post.php">Create Post</a><?php } ?>
        <form class="form-inline my-2 my-lg-0 loginButton">
            <input class="form-control mr-sm-2" type="hidden" name="login" placeholder="Login"
                   aria-label="Login button">
            <button class="btn btn-default my-2 my-sm-0 " type="submit">Login</button>
        </form>
    </div>
</nav>
<div class="container-fluid">
	<main class="post_wrap">
		<div class="row justify-content-around">
			<!-- Modal -->
			<?php include '../includes/modal.php'; ?>
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
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageUploadModal">
					Choose an image
					</button>
					<span class="error"><?=$imageErr;?></span>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="post">
					<input type="hidden" name="image_id" id="image_id" value="<?=$image_id; ?>">
					<input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION["user_id"];?>">

					<input class="post_title" aria-label="Title" id="tile" name="title" type="text" placeholder="Title" form="post">
					<span class="error"><?=$titleErr;?></span>
					<?php foreach($categories as $single_category){ ?>
						&ensp;
						<label for="<?=$single_category['category']?>"><?=ucfirst($single_category['category'])?></label>
						<input type="radio" id="<?=$single_category['category']?>" name="category_id" value="<?=$single_category['category_id']?>" form="post">
						
					<?php } ?>
					<span class="error"><?=$categoryErr;?></span>

					<div class="col-12" id="editor" contenteditable="true" name="textBox" aria-label="description">

					</div>
					<input id="hiddeninput" name="description" type="hidden">
					<!-- <button type="submit" id="save" value="0" name="published" class="btn btn-secondary post" form="post">Save</button> -->
					<button type="submit" id="publish" value="1" name="published" class="btn btn-primary post" form="post">Post</button>
				</form>
			</div>

	<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<!-- Initialize Quill editor -->
			<script>
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

			$(function(){
				$('#save').click(function () {
					var mysave = $('.ql-editor').html();
					$('#hiddeninput').val(mysave);			
				});
			});

			$(function(){
				$('#publish').click(function () {
					var mysave = $('.ql-editor').html();
					$('#hiddeninput').val(mysave);			
				});
			});
			
			var php_var = "<?php echo $openModal; ?>";

			$(document).ready(function() { 
				if (php_var){
					$('#imageUploadModal').modal('show');
				}
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