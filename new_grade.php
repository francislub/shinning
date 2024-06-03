<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['from']) === 0){
		$errors['from'] = "* Grade from is required.";
	}
	
	if(preg_match("/\S+/", $_POST['to']) === 0){
		$errors['to'] = "* Grade to is required.";
	}
	
	if(preg_match("/\S+/", $_POST['grade']) === 0){
		$errors['grade'] = "* Grade is required.";
	}
	
	if(preg_match("/\S+/", $_POST['comment']) === 0){
		$errors['comment'] = "* Comment is required.";
	}
	
	if(count($errors) === 0){


	$from=$_POST['from'];
	$to=$_POST['to'];
	$grade=$_POST['grade'];
	$comment=$_POST['comment'];
	$user = $_SESSION['ID'];
	
	if($_POST['grade_id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into grade (from,to,grade,comment) 
		VALUES ( '$from','$to','$grade','$comment' )") && $sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $grade in the grades list','$user',NOW() )") ){
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Grade Successfully Added.</h4></center></div>";
	echo "<script>
	setTimeout(function(){	window.location.href='rms.php?page=grade';  }, 1500);</script>";
	} else {
		echo "<script>
		alert('New Grade failed to record!" .$sql."');
		window.location.href='rms.php?page=grade';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['grade_id'];
		$sql = "UPDATE grade SET from='$from',to='$to', grade='$grade',comment='$comment' WHERE grade_id='$id'";
		$sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the grades list','$user',NOW() )");
		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Current School Year Successfully Updated.</h4></center></div>";
			echo "<script>
			setTimeout(function(){	window.location.href='rms.php?page=grade';  }, 1500);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 1500);</script>";
}

}

	mysqli_close($conn);

 ?>