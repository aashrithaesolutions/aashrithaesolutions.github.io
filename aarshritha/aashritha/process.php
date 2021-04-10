<?php
include "connect.php";
$query = mysqli_query($conn,"SELECT AVG(rate) as AVGRATE from star");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRATE'];
$query = mysqli_query($conn,"SELECT count(rate) as Total from star");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($conn,"SELECT count(comment) as Totalreview from  star");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($conn,"SELECT comment,rate,email from star");
$rating = mysqli_query($conn,"SELECT count(*) as Total,rate from star");
?>