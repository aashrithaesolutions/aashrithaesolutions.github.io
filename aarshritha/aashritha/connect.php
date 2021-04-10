<?php
$servername="localhost";
$username="root";
$password="";
$databasename="website";
$conn=new mysqli($servername,$username,$password,$databasename);
if($conn->connect_error)
{
    echo "connection failed";
}
?>