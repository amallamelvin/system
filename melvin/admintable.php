<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Food Recipe Table</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
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

    .btn-table {
      background-color: #53453c;
      border-color: #737373;
      color: white;
    }

    .btn-table:hover {
      background-color: #79675d;
      border-color: #595959;
      color: white;
    }
    </style>
</head>
<body>
    <?php include('navbaradmin.php'); ?>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Food Recipe List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Recipe</a>
            </div>
        </header>
        <?php
        
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>Ingredients</th>
                <th>Steps</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include('connect.php');
        $sqlSelect = "SELECT * FROM foods";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['food_id']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['type']; ?></td>
                <td><?php echo $data['ingredients']; ?></td>
                <td><?php echo $data['steps']; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $data['food_id']; ?>" class="btn btn-table">Read More</a>
                    <a href="edit.php?id=<?php echo $data['food_id']; ?>" class="btn btn-table">Edit</a>
                    <a href="delete.php?id=<?php echo $data['food_id']; ?>" class="btn btn-table">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>