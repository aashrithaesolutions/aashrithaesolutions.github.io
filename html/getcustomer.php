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

$sql = "SELECT customername, product, supplier FROM purchase WHERE customername = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($customername, $product, $supplier);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $customername . "</td>";
echo "<th>CompanyName</th>";
echo "<td>" . $product. "</td>";
echo "<th>ContactName</th>";
echo "<td>" . $supplier . "</td>";


echo "</tr>";
echo "</table>";
?>
