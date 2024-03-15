<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: rgb(245, 245, 245);
    }
    .login-container {
      height: 350px;
      max-width: 600px; 
      margin: auto;
      margin-top: 200px;
      background-color: rgba(255, 232, 205, 0.829);
      padding: 20px;
      color: black;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .btn-purple {
      background-color: #53453c;
      border-color: #737373;
      color: white;
      
    }
    .btn-purple:hover {
      background-color: #79675d;
      border-color: #595959;
      color: white;
    }
    #negro{
      display: flex;
      position: relative;
      justify-content: center;
      top: 15px;
    }
    .form-control{
      background-color: transparent;
      border: #53453c solid 2px;
    }
    .form-control:focus{
      background-color: transparent;
    }
 
  </style>
</head>
<body>

  <div class="container login-container">
    <form style="display: flex; flex-direction: column;" action="auth.php" method="post">
      <h2 class="text-center mb-4">Admin Login</h2>
      
      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
    

      <button type="submit" name="submit" class="btn btn-purple">Login</button>
      <div class="card-footer">
     
          </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
