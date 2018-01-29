In this video, I have shown how can we make login and registration in our website using php and mysql.   

## registration    

Make a registration from and extract value from registration form using `$_POST` super global. and insert into database. Once we insert data in to database we will show a success message.    

~~~php
if (isset($_POST['name'])  &&  isset($_POST['email']) && isset($_POST['password']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash( $_POST['password'], PASSWORD_BCRYPT );
  $con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
  $statement = $con->prepare("insert into users(name, email, password) values(:name, :email, :password)");
  $statement->execute([
    ":name" => $name,
    ":email" => $email,
    ":password" => $password,
  ]);
  $message = 'You have successfully register as a user';
}
~~~    

We are using `password_hash(password, algorithm_name)` function to hash our password.    

## Login 
Make a login form. extract email and password from form using `$_POST` super global. Fetch user data from database using user email. If user not found for that email we will show user no record found in database. If user is found on database, verify database password with form password. If password is verified we will allow user to login.     

~~~php
$message = '';
if (isset($_POST['email']) && isset($_POST['password']) ) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
  $statement = $con->prepare("select * from users where email=:email");
  $statement->execute([
    ":email" => $email,
  ]);
  $user = $statement->fetch(PDO::FETCH_OBJ); 
  if (!$user) {
    $message = 'Email not found in database';
  } else {
    if (password_verify($password, $user->password)) {
      $_SESSION['user_id'] = $user->id;
      header('location: /');
    }else {
      $message = 'Login failed for wrong password';
    }
  }
~~~


## saving user_id in session    

when user is successfully logged in, we will save user id to session. whenever we use `$_SESSION` super global we have to use `session_start()` function on top.        

~~~php
session_start();
$_SESSION['user_id'] = $user->id;
~~~

## restrict not authenticate user to access page
~~~php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}
~~~

## restrict authenticate user to access login page and registration page      

~~~php
session_start();
if (isset($_SESSION['user_id'])) {
    header('location: /');
}
~~~

## hash and verify password     
  
to hash password we will use `password_hash` function. first parameter will be password and 2nd parameter is algorithm name. we use `PASSWORD_BCRYPT` algorithm.     

~~~php
password_hash( $_POST['password'], PASSWORD_BCRYPT );
~~~

to varify password we are using `password_verify` function. first parameter is passward, 2nd parameter is hash password which we will retrieve from database    

~~~php
password_verify($password, $user->password->which_we_will_get_from_database);
~~~

           
         
My name is shibu deb polo        
Thanks         
Please subscribe to my channel https://www.youtube.com/c/polodev10        
Happy coding!      
















