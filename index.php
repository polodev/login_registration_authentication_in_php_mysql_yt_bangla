<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: login.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2>Home page <a href="logout.php" class="btn">Logout</a></h2>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nobis voluptate modi laborum. Possimus, impedit vero eaque. Obcaecati repellendus quam magnam necessitatibus quia et inventore labore, mollitia assumenda at? Magnam!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nobis voluptate modi laborum. Possimus, impedit vero eaque. Obcaecati repellendus quam magnam necessitatibus quia et inventore labore, mollitia assumenda at? Magnam!</p>
      </div>
    </div>
  </div>
</body>
</html>