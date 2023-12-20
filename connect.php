<?php 
$server ="localhost";
$user = "root";
$pass ="";
$data = "database";

$conn = mysqli_connect($server,$user,$pass,$data);
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}
// create database
// $sql = "CREATE DATABASE database";
// $result= mysqli_query($conn,$sql);
// if($result){
//     echo "database created";
// } 

// create table
// $sql = "CREATE TABLE stu(`name` VARCHAR(20), email varchar(20) UNIQUE KEY, phone VARCHAR(12), password varchar(20))";

// $result = mysqli_query($conn,$sql);
// if($result){
//     echo "Table created";
// }
