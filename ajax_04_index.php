<html>
<head>
	<title>Gym Exercises Completed This Week</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<style>
	.red{
		background-color: red;
	}
	.green{
		background-color: green;
	}
	</style>
</head>
<body>
<?php 
$server='localhost';
$user = '';
$pass = '';
$db = '';
$con=mysqli_connect($server,$user,$pass,$db) or die ('Cannot connect to database');
$query="select * from exercises";
$result=mysqli_query($con,$query) or die ('Cannot read table "exercises"');
$num_rows=$result -> num_rows;
$success=false;
if($num_rows>0){
	while($row=mysqli_fetch_array($result)){
		$exercise_id=$row['exercise_id'];
		$exercise=$row['exercise'];
		$done=$row['done'];
		$color='red';								// default color is red ie item has not been done
		if($done==1){
			$color='green';           // Set as green if item has been done
		}
		$success=true;
		echo '<div>' . $exercise . '---' . $done . '  <button id="btn'. $exercise_id .'" onclick="fnAjax('. $exercise_id .')" class="'. $color .'">Done</button></div>';
	}
}
?>
<script>
function fnAjax(exercise_id){
	var data={"exercise_id":exercise_id,"done":0};
	$.ajax({
		method:"POST",
		url:"ajax_04.php",
		data : data,
	}).done(function(successData){
		console.log(successData);
		var color = '';
		if (successData==0) {
			color = 'red';
			$('exercise_id').removeClass('green').addClass('red');
		}
		if (successData == 1){
			color = 'green';
			$('exercise_id').removeClass('red').addClass('green');
		}
	});
}
</script>
</body>
</html>