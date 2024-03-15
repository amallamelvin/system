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
        .book-details {
            background-color: #f5f5f5;
        }

        img{
            height: 700px;
            width: 700px;
            position: relative;
 
            border: 5px solid #53453c;
            border-radius: 58px;
        }
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
    </style>
</head>
<body>
    <div class="container my-4">
        <form>
            <header class="d-flex justify-content-between my-4">
                <h1>Recipe Details</h1>
                <div>
                    <a href="recommenduser.php" class="btn btn-primary">Back to User</a>
                </div>
            </header>
            <?php
            include("connect.php");
            $id = $_GET['id'];

            if (isset($id) && is_numeric($id)) {
              
                $updateViewCountQuery = "UPDATE foods SET view_count = view_count + 1 WHERE food_id = $id";
                $resultUpdateViewCount = mysqli_query($conn, $updateViewCountQuery);

                if (!$resultUpdateViewCount) {
                    die("Query failed: " . mysqli_error($conn));
                }

                $sql = "SELECT * FROM foods WHERE food_id = $id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $row = mysqli_fetch_array($result);

                    if ($row) {
                        $imagePath = $row["image_path"];
                        if ($imagePath) {
                            echo '<div id="pogi" class="form-outline my-4"><img src="' . $imagePath . '" alt="Food Image" class="img-fluid"></div>';
                        }
                        echo '<div id="title" class="form-outline my-3"><h3>' . $row["title"] . '</h3></div> ';
                        echo '<div id="title" class="form-outline my-3"><h4>' . $row["type"] . '</h4></div>';
                        echo '<h3 class=" my-4">Description:</h3><textarea class="form-control " rows="6" readonly>' . $row["description"] . '</textarea>';
                        echo '<h3>Ingredients:</h3><textarea class="form-control" id="outline" rows="6" readonly>' . $row["ingredients"] . '</textarea>';
                        echo '<h3>Steps:</h3><textarea class="form-control" id="outline" rows="6" readonly>' . $row["steps"] . '</textarea>';
                        echo '<h3>View count:</h3><p>' . $row["view_count"] . '</p>';
                        
                    } else {
                        echo "<h3>No Recipe found for ID: $id</h3>";
                    }
                } else {
                    echo "Error executing query: " . mysqli_error($conn);
                }
            } else {
                echo "<h3>Invalid or missing Recipe ID</h3>";
            }

            mysqli_close($conn);
            ?>
        </form>
    </div>
</body>
</html>
