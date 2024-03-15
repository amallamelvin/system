<?php include('session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
            background-color: rgba(255, 232, 205, 0.829);
        }
        .card-img-top {
            height: 300px; 
            object-fit: cover; 
        }

        .btn-filter{
            background-color:#695c53;
            color: White;
        }
        .btn-filter:hover{
            background-color:#695c53;
            color: White;
        }
        .card{
            width: 550px;
            border: 5px solid #53453c;
        }
        .card-body{
            position: relative;
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            background-color: rgba(255, 232, 205, 0.829);
        }

        .col-md-6 a{
            text-decoration: none;
            color: black;
        }

    </style>
    <title>Kybin Recipe</title>
</head>
<body>
    <?php include('navbaruser.php'); ?>
    <div class="container my-4">
        <h1 class="text-center mb-4">Recommended Recipe</h1>

        <form method="get" class="mb-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Select Food Type:</label>
                    <select class="form-select" id="type" name="type">
                    <option value="">All</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Brunch">Brunch</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Dessert">Dessert</option>

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="search" class="form-label">Search by Title:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Enter title...">
                        <button type="submit" class="btn btn-filter">Filter</button>
                    </div>
                </div>
            </div>
        </form>

        <?php
include('connect.php');

$whereClause = '';

if (isset($_GET['type']) && $_GET['type'] !== '') {
    $bookType = mysqli_real_escape_string($conn, $_GET['type']);
    $whereClause .= " WHERE type = '$bookType'";
}

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $whereClause .= ($whereClause !== '') ? " AND " : " WHERE ";
    $whereClause .= "title LIKE '%$searchTerm%'";
}

$topFoodsSql = "SELECT * FROM foods" . $whereClause . " ORDER BY view_count DESC LIMIT 6";
$topFoodsResult = mysqli_query($conn, $topFoodsSql);

if (mysqli_num_rows($topFoodsResult) > 0) {
    ?>
    <div class="row">
        <?php
        while ($topBook = mysqli_fetch_assoc($topFoodsResult)) {
            ?>
            <div class="col-md-6">
                <a href="viewrecommenduser.php?id=<?php echo $topBook['food_id']; ?>">
                    <div class="card mb-4">
                        <img src="<?php echo $topBook['image_path']; ?>" alt="<?php echo $topBook['title']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $topBook['title']; ?></h5>
                            <p class="card-text"><?php echo $topBook['type']; ?></p>
                            
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    echo "<p class='text-center'>No recommended recipe available.</p>";
}

mysqli_close($conn);
?>

    </div>
</body>
</html>
