<html>
<body>
<?php 
include  "connect.php";
 $email=$_POST['email'];
 $comment=$_POST['remark'];
 $rate=$_POST['rate'];
 $sym=$_POST['feedback'];
  $sql="INSERT INTO feedback(name,comment,rate,sym) VALUES('$email','$comment','$rate','$sym')";
  if($conn->query($sql))
{
echo '<script>alert("Record Inserted")</script>';
header('location:index.php');
exit;
}
else
{
    echo '<script> alert("Enter all the  field")</script>';
}
?>

</body>
</html>
