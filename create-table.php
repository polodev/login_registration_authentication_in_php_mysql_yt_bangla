<?php

$con = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
$statement = $con->prepare(' 
  create table users (
    id int(11) auto_increment primary key,
    name varchar(30) not null,
    email varchar(30) not null,
    password varchar(150) not null
  )
 ');
$statement->execute();

