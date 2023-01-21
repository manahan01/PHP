<?php
//host
$host ='localhost';
$dbname = 'auth-sys';
$user ='root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
/*if($conn == True) {
    echo "Working fine"; 
} else {
    echo "Connection failed!";
}*/
?>