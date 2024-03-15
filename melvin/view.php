<?php include('session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Recipe Details</title>
    <style>
        .btn-primary {
      background-color: #53453c;
      border-color: #737373;
    
      color: white;
      
    }
    .btn-primary:hover {
      background-color: #79675d;
      border-color: #595959;
      color: white;
    }

    #pogi{
        width: 100%;
        position: relative;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .form-control{
        border: 4px solid #53453c ;
    outline: none;
    background-color: rgba(255, 255, 255, 0.541);
    }

    #title{
        width:100%;
        position: relative;
        align-items: center;
        justify-content: center;
        display: flex;
    }
    #title h3{
        font-size: 40px;
    }
    .container{
        background-color: rgba(255, 232, 205, 0.829);
        border: 5px solid #53453c;
    }
    img{
            height: 500px;
            width: 500px;
            position: relative;
 
            border: 5px solid #53453c;
            border-radius: 58px;}
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Recipe Details</h1>
            <div>
                <a href="admintable.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="food-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM foods WHERE food_id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                     <?php
                    $imagePath = $row["image_path"];
                    if ($imagePath) {
                        echo '<div id="pogi" class="form-outline my-4"><img src="' . $imagePath . '" alt="Food Image" class="img-fluid"></div>';
                    }
                    echo '<div id="title" class="form-outline my-3"><h3>' . $row["title"] . '</h3></div> ';
                    echo '<div id="title" class="form-outline my-3"><h4>' . $row["type"] . '</h4></div>';
                    echo '<h3>Description:</h3><textarea class="form-control" rows="6" readonly>' . $row["description"] . '</textarea>';
                    echo '<h3>Ingredients:</h3><textarea class="form-control" rows="6" readonly>' . $row["ingredients"] . '</textarea>';
                    echo '<h3>Steps:</h3><textarea class="form-control" rows="6" readonly>' . $row["steps"] . '</textarea>';
                    echo '<h3>View count:</h3><p>' . $row["view_count"] . '</p>';
               ?>
                    <?php
                }
            } else {
                echo "<h3>No Recipe Found</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
