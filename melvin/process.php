<?php
include('connect.php');

function generateUniqueFileName($originalFileName) {
    $timestamp = time();
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $uniqueFileName = $timestamp . '_' . uniqid() . '.' . $extension;
    return $uniqueFileName;
}

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]);
    $steps = mysqli_real_escape_string($conn, $_POST["steps"]);
    $targetDir = "uploads/";
    $originalFileName = basename($_FILES["image"]["name"]);
    $uniqueFileName = generateUniqueFileName($originalFileName);
    $targetFile = $targetDir . $uniqueFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;

            $sqlInsert = "INSERT INTO foods(title, type, description, ingredients, steps, image_path) 
                          VALUES ('$title', '$type', '$description', '$ingredients', '$steps', '$imagePath')";
            
            if(mysqli_query($conn, $sqlInsert)){
                session_start();
                $_SESSION["create"] = "Recipe Added Successfully!";
                header("Location:admintable.php");
            } else {
                echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (!function_exists('generateUniqueFileName')) {
    function generateUniqueFileName($originalFileName) {
        $timestamp = time();
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $uniqueFileName = $timestamp . '_' . uniqid() . '.' . $extension;
        return $uniqueFileName;
    }
}

if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]);
    $steps = mysqli_real_escape_string($conn, $_POST["steps"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    if ($_FILES["new_image"]["name"]) {
        $targetDir = "uploads/";
        $originalFileName = basename($_FILES["new_image"]["name"]);
        $uniqueFileName = generateUniqueFileName($originalFileName);
        $targetFile = $targetDir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["new_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["new_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
                $sqlUpdate = "UPDATE foods SET title = '$title', type = '$type', description = '$description', ingredients = '$ingredients', steps = '$steps', image_path = '$imagePath' WHERE food_id='$id'";
                
                if (mysqli_query($conn, $sqlUpdate)) {
                    session_start();
                    $_SESSION["update"] = "Recipe Updated Successfully!";
                    header("Location:admintable.php");
                } else {
                    echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $sqlUpdate = "UPDATE foods SET title = '$title', type = '$type', description = '$description', ingredients = '$ingredients', steps = '$steps', image_path = '$imagePath' WHERE food_id='$id'";
        
        if (mysqli_query($conn, $sqlUpdate)) {
            session_start();
            $_SESSION["update"] = "Recipe Updated Successfully!";
            header("Location:admintable.php");
        } else {
            echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
        }
    }
}
?>
