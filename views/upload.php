<?php
include '../includes/database_connection.php';

if(isset($_FILES["fileToUpload"])){
    $target_dir = "../images/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    if ($_FILES["fileToUpload"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $statement = $pdo->prepare("INSERT INTO images (image, text) VALUES (:image, :text)");
            $statement->execute([
                ":image" => $new_location,
            ]);

            header('Location: image_upload.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>