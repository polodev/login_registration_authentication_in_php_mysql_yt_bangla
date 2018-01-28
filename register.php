<?php 
session_start();
if (isset($_SESSION['user_id'])) { 
  header('location: /');
}


$message = '';

if (
  isset($_POST['name']) &&
  isset($_POST['email']) &&
  isset($_POST['password'])
)
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash( $_POST['password'], PASSWORD_BCRYPT) ;
  $con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
  $statement = $con->prepare('insert into users (name, email, password) values(:name, :email, :password)');
  $status = $statement->execute([
    ':name' => $name,
    ':email' => $email,
    ':password' => $password,
  ]);
  if ($status) {
    $message = 'You have registered successfully';
  } else {
    $message = 'something went wrong';
  }
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
 <div class="container mt-5">
   <div class="card">
     <div class="card-header">
      <h2>Register Here</h2>
     </div>
     <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
          <p>Already have an account? <a href="login.php">Login Here</a></p>
        </div>
        
        <div class="form-group">
          <button class="btn btn-outline-info" type="submit">Register Now</button>
        </div>
        
      </form>
     </div>
   </div>
 </div> 
</body>
</html>