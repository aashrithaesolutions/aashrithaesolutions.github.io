<html>
<body>

<?php 
include  "connect.php";
 $email=$_POST['email'];
 $comment=$_POST['remark'];
 $rate=$_POST['rate'];
  $sql="INSERT INTO star(email,comment,rate) VALUES('$email','$comment','$rate')";
  if($conn->query($sql))
{
    echo '<script>alert("Record Inserted")</script>';
    header("location:index.php");
}
else
{
    echo '<script> alert("Enter all the  field")</script>';
}
?>
</form>
</body>
</html>


