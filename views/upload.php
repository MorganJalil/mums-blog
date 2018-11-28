<?php
include '../includes/database_connection.php';

/**
 * If the file is sent via a form with 'enctype="multiplart/form-data"' the
 * file is saved go the superglobal '$_FILES' variable and inside of $image
 */
/*
$image = $image;
$image_text = $_POST["text"];*/
/**
 * When it is uploaded it is stored at a temporary location inside a /tmp folder
 * on your computer or server. We must move this temporary file to a permanent location
 * which we will do futher down. The path to the temporary location is inside of $temporary_location
 */

//$temporary_location = $temporary_location;
/**
 * We must create a new filename and location and decide where we will put the uploaded file.
 * We can specify this new location as 'uploads/' (the name of the folder where we want our images)
 * and then reuse the name of the uploaded file. In my example the file is named 'tired.png' so the
 * new file will be named 'uploads/tired.png'
 */
//$new_location = "uploads/" . $image["name"];

/**
 * 'move_uploaded_file' moves the file from the temporary location to your newly specified location
 * if the transfer is complete we will get a true/false return value from the function indiciating
 * everything went ok with the transfer of the file
 */
//$upload_ok = move_uploaded_file($temporary_location, $new_location);

/**
 * If the transfer went OK we can insert the pathname to the image into the database, not the actual
 * file, the file is stored in a folder, and the path to the file is saved in the database as a VARCHAR
 * Here I am also sending along the text from the editor, that text is saved as usual in $_POST
 */
/*if($upload_ok){

  $statement = $pdo->prepare("INSERT INTO images (image, text) VALUES (:image, :text)");
  $statement->execute([
    ":image" => $new_location,
    ":text"  => $image_text
  ]);
*/
  /*============================*/ 

if(isset($_FILES["image"])){
    $image = $_FILES["image"];
    $temporary_location = $image["tmp_name"];
    $target_dir = "../images/uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($temporary_location);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            header('Location: image_upload.php?error=type');
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        header('Location: image_upload.php?error=exist');
    }
    // Check file size
    if ($image["size"] > 500000) {
        $uploadOk = 0;
        header('Location: image_upload.php?error=size');
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
        header('Location: image_upload.php?error=format');
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($temporary_location, $target_file)) {

            //echo "The file ". basename( $image["name"]). " has been uploaded.";
            $statement = $pdo->prepare("INSERT INTO images (image) VALUES (:image)");
            $statement->execute([
                ":image" => $target_file,
            ]);

            header('Location: image_upload.php');
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>