<?php
$response='';
if(strlen($_POST['exercise_id'])>0){
	$exercise_id = $_POST['exercise_id'];
	$done=$_POST['done'];
	$response=$exercise_id;
	if($done==1){
		$response=0;
	}
	elseif($done==0){
		$response=1;
	}
}
echo $response;
?>