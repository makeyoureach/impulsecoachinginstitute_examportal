<?php

header('Access-Control-Allow-Origin: *');
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Accept-Language, X-Authorization");
header('Access-Control-Max-Age: 86400');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // The request is using the POST method
    header("HTTP/1.1 200 OK");
    return;

}
    $con=mysqli_connect('infinitymedia.c21yk4ftkhqf.us-east-2.rds.amazonaws.com','administrator','root2022','infinitymedia');
    // $con=mysqli_connect('localhost','root','','infinitymedia');

    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }

?>