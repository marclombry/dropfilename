<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["up"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["up"]["tmp_name"]);
    if($check !== false) {
        echo "<p class='success'>Le fichier est bien une image : - " . $check["mime"] . ".</p>";
        $uploadOk = 1;
    } else {
        echo "<p class='error'>Le fichier n' est pas une image !.</p>";
        $uploadOk = 0;
    }
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "<p class='error'>Désolé, Le fichier existe déja.</p>";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["up"]["size"] > 500000) {
		echo "<p class='error'>Attention l' image est trop lourd !.</p>";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "<p class='error'>Seule les fichiers JPG, JPEG, PNG & GIF sont autorisées.</p>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<p class='error'>Echec de l'upload.</p>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["up"]["tmp_name"], $target_file)) {
			echo "<p class='success'>le fichier ". basename( $_FILES["up"]["name"]). " est bien uploadés.</p>";
		} else {
			echo "<p class='error'>Désoler cela na pas fonctionné.</p>";
		}
	}
	echo $_FILES['up']['name'];


?>