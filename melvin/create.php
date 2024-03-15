<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Recipe</title>
</head>
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

    .delete-btn {
        margin-top: 10px;
    }
</style>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Recipe</h1>
            <div>
                <a href="admintable.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="form-element my-4">
                <label for="title">Food Title:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Food Title">
            </div>
            <div class="form-element my-4">
                <label for="type">Select Food Type:</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Food Type:</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Brunch">Brunch</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </div>
            <div class="form-outline my-4">
                <label for="description">Food Description:</label>
                <textarea name="description" class="form-control" id="description" rows="6" placeholder="Description"></textarea>
            </div>

            <div class="form-outline my-4">
                <label for="ingredients">Ingredients:</label>
                <textarea name="ingredients" class="form-control" id="ingredients" rows="6" placeholder="Input the Ingredients" readonly></textarea>
                <input type="text" class="form-control mt-2" id="ingredientInput" placeholder="Enter an Ingredient">
                <button type="button" class="btn btn-primary mt-2" id="addIngredient">Add Ingredient</button>
                <button type="button" class="btn btn-danger delete-btn" id="deleteIngredient">Delete Ingredient</button>
            </div>
            <div class="form-outline my-4">
                <label for="steps">Steps:</label>
                <textarea name="steps" class="form-control" id="steps" rows="6" placeholder="Input the Step" readonly></textarea>
                <input type="text" class="form-control mt-2" id="stepInput" placeholder="Enter an Step">
                <button type="button" class="btn btn-primary mt-2" id="addStep">Add Step</button>
                <button type="button" class="btn btn-danger delete-btn" id="deleteStep">Delete Step</button>
            </div>

         

            <div class="form-element my-4">
                <label for="image">Upload Food Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Food" class="btn btn-primary">
            </div>
        </form>
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("addIngredient").addEventListener("click", function() {
                var ingredient = document.getElementById("ingredientInput").value;
                var textarea = document.getElementById("ingredients");
                var ingredients = textarea.value.split("\n");
                textarea.value += "• " + ingredient + "\n";
                document.getElementById("ingredientInput").value = "";
            });

            document.getElementById("deleteIngredient").addEventListener("click", function() {
                var textarea = document.getElementById("ingredients");
                var lines = textarea.value.split("\n");
                if (lines.length > 0) {
                    lines.pop();
                    textarea.value = lines.join("\n");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("addStep").addEventListener("click", function() {
                var ingredient = document.getElementById("stepInput").value;
                var textarea = document.getElementById("steps");
                var ingredients = textarea.value.split("\n");
                var nextNumber = ingredients.length + 0;
                textarea.value += nextNumber + ". " + ingredient + "\n";
                document.getElementById("stepInput").value = "";
            });

            document.getElementById("deleteStep").addEventListener("click", function() {
                var textarea = document.getElementById("steps");
                var lines = textarea.value.split("\n");
                if (lines.length > 0) {
                    lines.pop();
                    textarea.value = lines.join("\n");
                }
            });
        });
    </script>
</body>
</html>
