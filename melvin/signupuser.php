<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Sign Up Form</title>
</head>
<style>

    body{
      background-color: rgb(245, 245, 245);
    }
  
  .card{
    position:relative;
    top:100px;
    background-color: rgba(255, 232, 205, 0.829);
      color: black;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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
    
    .mb-3 input{
        background:transparent;

    }
    .form-control{
      background-color: transparent;
      border: #53453c solid 2px;
    }
    .form-control:focus{
      background-color: transparent;
    }

</style>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3>Sign Up</h3>
          </div>
          <div class="card-body">
            <form action="signinuser.php" method="post" class="form-login">
            <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
            </div>
              <div class="mb-3">
            <label for="username" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Userame" required>
            </div>
            <div class="mb-3">
            <label for="username" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
            </div>
              <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
            </form>
          </div>
          <div class="card-footer">
            <p class="text-center">Already have an account? <a href="index.php" style="text-decoration: none;">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
