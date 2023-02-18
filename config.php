<?php
$host="localhost";

$dbname = "likes-sys";

$username = "root";

$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;",$username,$password);

if(!$conn){
   // echo "failed connection";
}else{
   // echo "connected";
}


?>