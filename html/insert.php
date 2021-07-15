<?php

$servername="localhost";
$username="root";
$password="";
$databasename="eg";
$conn=new mysqli($servername,$username,$password,$databasename);
if($conn->connect_error)
{
    echo "connection failed";   
}
header("content-Type:application/json;charset=UTF-8");
$obj=json_decode($_GET["x"],false);
$stmt=$conn->prepare("SELECT  customername FROM purchase LIMIT ?");
$stmt->bind_param("s",$obj->limit);
$stmt->execute();
$result=$stmt->get_result();
$outp=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);


?>