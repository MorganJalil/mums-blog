<?php

if(isset($_SERVER)){
	
	/*Trims away unnecessary characters, removes backslashes and making sure users cant execute scripts with the form*/
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	// Giving all variables below an empty string as value so they are predefined
	$title = $category = $description = "";
	$titleErr = $categoryErr = $descriptionErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
	
		// If the post variable is empty, set a value to the error variable which prints out on the page
		if (empty($_POST["title"])) {
            $titleErr = "*";
            echo $titleErr;
		} else {
            //$title = test_input($_POST["title"]);
            $_SESSION['title'] = test_input($_POST["title"]);
		}
		
		if (empty($_POST["category_id"])) {
			$categoryErr = "Please choose a category";
		} else {
			$category = test_input($_POST["category_id"]);
		}
		
		if (empty($_POST["description"])) {
			$descriptionErr = 1;
		} else {
            //$description = test_input($_POST["description"]);
            $_SESSION['description'] = test_input($_POST["description"]);
		}
		

		//Makes sure all error variables are empty before proceeding
		if (empty($titleErr) && empty($categoryErr) && empty($descriptionErr)){

            $slug = str_replace(" ", "_", $_POST["title"]);
	
            //Add $_POST info to posts DB
            $statement = $pdo->prepare(
            "INSERT INTO posts (title, slug, description, created_by, image, published)
            VALUES (:title, :slug, :description, :created_by, :image_id, :published);"
            );
        
            $statement->execute([
            ":title"     => $_POST["title"],
            ":slug"     => $slug,
            ":description"     => $_POST["description"],
            ":created_by"     => $_SESSION["user_id"],
            ":image_id"     => $_POST["image_id"],
            ":published"     => $_POST["published"],
            ]);	
            
            $statement = $pdo->prepare("SELECT MAX(id) AS id FROM posts");	
            $statement->execute();
            $post_id = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $statement = $pdo->prepare(
            "INSERT INTO post_category (post_id, prod_category_id)
            VALUES (:post_id, :category_id);"
            );
        
            $statement->execute([
            ":post_id"     => $post_id[0]["id"],
            ":category_id"     => $_POST["category_id"],
            ]);	
            header("Location: main_page_2.php");		
        } 
		}		
	}


?>