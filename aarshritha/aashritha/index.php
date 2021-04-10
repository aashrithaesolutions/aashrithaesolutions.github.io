
<?php
    include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
</head>
<style>
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
<body>
<form  action ="insert.php" method="POST">
<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
    <input type="radio" id="star1" name="rate" value="0" />
  </div>
<br>
<input type="hidden" name="demo_id" id="demo_id" value="1">
<div class="col-md-4">
<input type="text" class="form-control" name="email" id="email" placeholder="Enter Name"><br>
<textarea class="form-control" rows="5" placeholder="Write your review here..." name="remark" id="remark" required></textarea><br>
<p><button  class="btn btn-default btn-sm btn-info" id="srr_rating">Submit</button></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/index.js"></script>

</body>
</form>

</html>

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
<?php include "process.php";
?>
<html>
<body>
<div class="row container">
<div class="col-md-4 ">
	<h3><b>Rating & Reviews</b></h3>
	<div class="row">
	
		<div class="col-md-6">
			<h3 align="center"><b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i></h3>
			<p><?=$Total;?> ratings and <?=$Total_review;?> reviews</p>
		</div>
		<div class="col-md-6">
			<?php
			while($db_rating= mysqli_fetch_array($rating)){
			?>
				<h4 align="center"><?=$db_rating['rate'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> Total <?=$db_rating['Total'];?></h4>
				
				
			<?php	
			}
				
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">	
		<?php
    
			while($db_review= mysqli_fetch_array($review)){
		?>
				<h4><?=$db_review['rate'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> by <span style="font-size:14px;"><?=$db_review['email'];?></span></h4>
				<p><?=$db_review['comment'];?></p>
				<hr>
		<?php	
			}
				
		?>
		</div>
	</div>
</div>
</div>
</body>
</html>
